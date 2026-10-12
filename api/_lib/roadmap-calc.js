// Pure calculation module for the "10% Body Fat Roadmap" PDF. No I/O — every
// value the PDF template needs, computed once from the lead's raw form
// inputs and returned as both unrounded numbers (for further math) and
// display-ready rounded/formatted values (for the template).
//
// Rounding rule throughout: standard "round half away from zero" at final
// display time only, independently per metric — never chained off an
// already-rounded number (verified against the hand-checked sample in
// /Users/asherrobinson/.claude/plans/nifty-inventing-ritchie.md; Math.round
// alone would give the wrong answer on exact .5 boundaries like 52.5, since
// JS's Math.round already rounds half-up for positive numbers, which is what
// we want — called out explicitly here because Python/other languages
// default to round-half-to-even and would drift from the sample).
function roundHalfUp(n) {
    return Math.round(n);
}

// Body fat % bounds per bracket. The two edge brackets are open-ended;
// 10% floor / 45% ceiling confirmed with Asher.
const BF_BOUNDS = {
    '14-below': [10, 14],
    '15-19': [15, 19],
    '20-24': [20, 24],
    '25-29': [25, 29],
    '30-39': [30, 39],
    '40+': [40, 45],
};

function computeRoadmap({ height_ft, height_in, weight_lbs, bodyfat_range }) {
    const heightFt = Number(height_ft);
    const heightIn = Number(height_in);
    const weight = Number(weight_lbs);
    const bounds = BF_BOUNDS[bodyfat_range];

    if (!Number.isFinite(heightFt) || !Number.isFinite(heightIn) || !Number.isFinite(weight)) {
        throw new Error(`Invalid height/weight input: height_ft=${height_ft} height_in=${height_in} weight_lbs=${weight_lbs}`);
    }
    if (!bounds) {
        throw new Error(`Unknown bodyfat_range: ${bodyfat_range}`);
    }
    const [bfLow, bfHigh] = bounds;

    // Step 1 — fat mass range (lbs)
    const fatMassLow = weight * (bfLow / 100);
    const fatMassHigh = weight * (bfHigh / 100);

    // Step 2 — fat-free mass range (lbs)
    const ffmLow = weight - fatMassHigh;
    const ffmHigh = weight - fatMassLow;

    // Step 3 — FFMI (normalized, Kouri et al.)
    const heightM = (heightFt * 12 + heightIn) * 0.0254;
    const ffmi = (ffmLbs) => (ffmLbs * 0.453592) / (heightM * heightM) + 6.1 * (1.8 - heightM);
    const ffmiLow = ffmi(ffmLow);
    const ffmiHigh = ffmi(ffmHigh);

    // Step 4 — goal weight at 10% body fat (from unrounded ffm)
    const goalWeightLow = ffmLow / 0.9;
    const goalWeightHigh = ffmHigh / 0.9;

    // Step 5 — gap / fat lost
    const gapLbs = weight - goalWeightHigh;
    const fatAtGoalLow = goalWeightLow * 0.10;
    const fatAtGoalHigh = goalWeightHigh * 0.10;
    // Fat lost = Step 1's fat mass range minus the fat-at-goal range, cross-
    // subtracting the extremes (smallest lost = biggest fat mass est. minus
    // biggest fat-at-goal est., and vice versa) — reverse-engineered from
    // the template's own sample text, see plan doc.
    const fatLostLow = fatMassLow - fatAtGoalHigh;
    const fatLostHigh = fatMassHigh - fatAtGoalLow;

    // Step 6 — timeline at three paces (lb/week)
    const paces = [0.5, 1, 2].map((pace) => ({
        pace,
        weeks: gapLbs / pace,
        months: gapLbs / pace / 4.345,
        dailyDeficitKcal: (pace * 3500) / 7,
    }));

    // Step 7 — fat-oxidation ceiling (template shows only the "informally
    // revised" low figure, rounded to the nearest 50 — verified against the
    // sample: 1247.4 → "1,250", not the nearest-int 1,247)
    const fatMassMid = (fatMassLow + fatMassHigh) / 2;
    const ceilingLow = fatMassMid * 22;
    const ceilingHigh = fatMassMid * 31.5; // computed for completeness; unused by this template revision

    // Step 8 — protein target
    const proteinLow = weight * 0.8;
    const proteinHigh = weight * 1.0;

    const roundNearest = (n, step) => Math.round(n / step) * step;

    return {
        // Raw/unrounded, for further math or debugging.
        raw: {
            fatMassLow, fatMassHigh, ffmLow, ffmHigh, ffmiLow, ffmiHigh,
            goalWeightLow, goalWeightHigh, gapLbs, fatAtGoalLow, fatAtGoalHigh,
            fatLostLow, fatLostHigh, paces, fatMassMid, ceilingLow, ceilingHigh,
            proteinLow, proteinHigh, heightM,
        },
        // Display-ready, independently rounded per the rule above.
        display: {
            fatMassLow: roundHalfUp(fatMassLow),
            fatMassHigh: roundHalfUp(fatMassHigh),
            ffmLow: roundHalfUp(ffmLow),
            ffmHigh: roundHalfUp(ffmHigh),
            ffmiLow: Math.round(ffmiLow * 10) / 10,
            ffmiHigh: Math.round(ffmiHigh * 10) / 10,
            goalWeightLow: roundHalfUp(goalWeightLow),
            goalWeightHigh: roundHalfUp(goalWeightHigh),
            gapLbs: roundHalfUp(gapLbs),
            fatAtGoalLow: roundHalfUp(fatAtGoalLow),
            fatAtGoalHigh: roundHalfUp(fatAtGoalHigh),
            fatLostLow: roundHalfUp(fatLostLow),
            fatLostHigh: roundHalfUp(fatLostHigh),
            paces: paces.map((p) => ({
                pace: p.pace,
                months: roundHalfUp(p.months),
                dailyDeficitKcal: roundHalfUp(p.dailyDeficitKcal),
            })),
            ceilingLow: roundNearest(ceilingLow, 50),
            ceilingHigh: roundNearest(ceilingHigh, 50),
            proteinLow: roundHalfUp(proteinLow),
            proteinHigh: roundHalfUp(proteinHigh),
        },
    };
}

module.exports = { computeRoadmap, BF_BOUNDS };
