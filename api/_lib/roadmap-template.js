// Fills roadmap/pdf-template.html with one lead's personalized numbers.
// Every substitution targets an exact, known literal from the shipped
// template (the John Doe / 5'10" / 210 lbs / 25–29% sample) and asserts how
// many times it expects to find that literal before replacing — if the
// template is ever edited and a placeholder moves/changes, this throws
// instead of silently shipping an unpersonalized PDF. See the placeholder
// map in the plan doc for the full audit this was built from.

const BF_LABELS = {
    '14-below': '14% or below',
    '15-19': '15–19%',
    '20-24': '20–24%',
    '25-29': '25–29%',
    '30-39': '30–39%',
    '40+': '40%+',
};

function countOccurrences(html, needle) {
    let count = 0;
    let idx = 0;
    while ((idx = html.indexOf(needle, idx)) !== -1) {
        count++;
        idx += needle.length;
    }
    return count;
}

// Replaces every occurrence of an exact literal, asserting the count found
// matches what we expect from the audited template — fails loudly on drift
// rather than silently replacing the wrong thing (or nothing).
function replaceExact(html, search, replace, expectedCount) {
    const actual = countOccurrences(html, search);
    if (actual !== expectedCount) {
        throw new Error(
            `roadmap-template: expected ${expectedCount} occurrence(s) of ${JSON.stringify(search)}, found ${actual}. Template may have changed.`
        );
    }
    return actual === 0 ? html : html.split(search).join(replace);
}

function fmtInt(n) {
    return Math.round(n).toLocaleString('en-US');
}

function fmtRange(low, high) {
    return `${fmtInt(low)}&ndash;${fmtInt(high)}`;
}

// Body-fat grid (6 illustration options): move `selected` + the ▼ arrow
// from the shipped 25–29% option onto whichever option matches this lead's
// bracket. Matches on the label text so the (very large, base64-image-
// containing) markup in between never has to be touched or even read into
// a match group.
function selectBodyfatBracket(html, bodyfatRange) {
    const targetLabel = BF_LABELS[bodyfatRange];
    if (!targetLabel) {
        throw new Error(`roadmap-template: unknown bodyfat_range "${bodyfatRange}"`);
    }
    let matchCount = 0;
    const out = html.replace(
        /<div class="bf-grid-item( selected)?">(\s*)<div class="bf-grid-arrow">([^<]*)<\/div>([\s\S]*?<div class="bf-grid-label">)([^<]+)(<\/div>)/g,
        (full, _selectedFlag, ws, _arrowContent, middle, label, closeLabel) => {
            matchCount++;
            const isTarget = label === targetLabel;
            const itemClass = isTarget ? ' selected' : '';
            const arrow = isTarget ? '&#9660;' : '';
            return `<div class="bf-grid-item${itemClass}">${ws}<div class="bf-grid-arrow">${arrow}</div>${middle}${label}${closeLabel}`;
        }
    );
    if (matchCount !== 6) {
        throw new Error(`roadmap-template: expected 6 bf-grid-item blocks, matched ${matchCount}`);
    }
    return out;
}

// Page-2 weight range-track scale endpoints + dot/span position. Reverse-
// engineered from the template's sample (goal 166–175, weight 210 →
// axis 150/220, dot at 86%) — see plan doc. Purely cosmetic, so clamped
// defensively rather than asserted exactly.
function computeWeightScale(weightLbs, goalLow, goalHigh) {
    let scaleMin = Math.floor(goalLow / 10) * 10 - 10;
    let scaleMax = Math.ceil(weightLbs / 10) * 10 + 10;
    if (scaleMax - scaleMin < 20) scaleMax = scaleMin + 20; // defensive floor on span width
    const span = scaleMax - scaleMin;
    const clampPct = (v) => Math.max(0, Math.min(100, v));
    return {
        scaleMin,
        scaleMax,
        spanLeftPct: clampPct(((goalLow - scaleMin) / span) * 100),
        spanWidthPct: clampPct(((goalHigh - goalLow) / span) * 100),
        dotLeftPct: clampPct(((weightLbs - scaleMin) / span) * 100),
    };
}

// FFMI scale-bar position (page 1 & 2). Scale spans FFMI 16–30, verified
// exactly against the sample (21.6–22.8 → left:40.0%; width:8.571%,
// arrow at 44.286%).
function computeFfmiScale(ffmiLow, ffmiHigh) {
    const min = 16, max = 30, span = max - min;
    const mid = (ffmiLow + ffmiHigh) / 2;
    return {
        boxLeftPct: ((ffmiLow - min) / span) * 100,
        boxWidthPct: ((ffmiHigh - ffmiLow) / span) * 100,
        arrowLeftPct: ((mid - min) / span) * 100,
    };
}

function fillTemplate(html, lead, calc) {
    const d = calc.display;
    const weight = Number(lead.weight_lbs);
    let out = html;

    out = selectBodyfatBracket(out, lead.bodyfat_range);

    // Page 1 — name / email / height / weight
    out = replaceExact(out, 'John Doe', `${lead.first_name} ${lead.last_name}`.trim(), 1);
    out = replaceExact(out, 'john.doe@email.com', lead.email, 1);
    out = replaceExact(out, '5&#39;10&quot;', `${lead.height_ft}&#39;${lead.height_in}&quot;`, 1);
    out = replaceExact(out, '210 lbs', `${fmtInt(weight)} lbs`, 2); // page-1 value + page-2 "You today" legend

    // Fat mass (page 1 hero + page 2 sentence)
    out = replaceExact(out, '53&ndash;61 lbs', `${fmtRange(d.fatMassLow, d.fatMassHigh)} lbs`, 2);

    // FFMI (page 1 heading + page 2 sub) and its scale-bar position (both pages).
    // ffmiLow/High are single-decimal values (e.g. 21.5), not whole numbers —
    // built directly rather than via fmtRange/fmtInt, which would round them
    // to integers.
    out = replaceExact(out, '21.6&ndash;22.8', `${d.ffmiLow}&ndash;${d.ffmiHigh}`, 2);

    const ffmiScale = computeFfmiScale(d.ffmiLow, d.ffmiHigh);
    out = replaceExact(
        out,
        'left:40.0%; width:8.571%',
        `left:${ffmiScale.boxLeftPct.toFixed(3)}%; width:${ffmiScale.boxWidthPct.toFixed(3)}%`,
        2
    );
    out = replaceExact(
        out,
        'left:44.286%',
        `left:${ffmiScale.arrowLeftPct.toFixed(3)}%`,
        2
    );

    // Fat-free mass (page 1 + page 2)
    out = replaceExact(out, '149&ndash;158 lbs', `${fmtRange(d.ffmLow, d.ffmHigh)} lbs`, 2);

    // Goal weight (page 2 hero + legend)
    out = replaceExact(out, '166&ndash;175 lbs', `${fmtRange(d.goalWeightLow, d.goalWeightHigh)} lbs`, 2);

    // Page-2 weight range-track
    const scale = computeWeightScale(weight, d.goalWeightLow, d.goalWeightHigh);
    out = replaceExact(out, 'left:23%; width:15%', `left:${scale.spanLeftPct.toFixed(2)}%; width:${scale.spanWidthPct.toFixed(2)}%`, 1);
    out = replaceExact(out, 'left:86%', `left:${scale.dotLeftPct.toFixed(2)}%`, 1);
    out = replaceExact(out, '<span>150 lbs</span>', `<span>${fmtInt(scale.scaleMin)} lbs</span>`, 1);
    out = replaceExact(out, '<span>220 lbs</span>', `<span>${fmtInt(scale.scaleMax)} lbs</span>`, 1);

    // Page 2 — fat mass drops to / fat lost sentence
    out = replaceExact(out, '17&ndash;18 lbs', `${fmtRange(d.fatAtGoalLow, d.fatAtGoalHigh)} lbs`, 1);
    out = replaceExact(out, '35&ndash;44 lbs', `${fmtRange(d.fatLostLow, d.fatLostHigh)} lbs`, 1);

    // Page 3 — timeline
    const standardPace = d.paces.find((p) => p.pace === 1);
    const slowerPace = d.paces.find((p) => p.pace === 0.5);
    const fasterPace = d.paces.find((p) => p.pace === 2);
    out = replaceExact(out, '~8 months', `~${fmtInt(standardPace.months)} months`, 1);
    out = replaceExact(out, 'at least <b>35 lbs</b>', `at least <b>${fmtInt(d.gapLbs)} lbs</b>`, 1);
    out = replaceExact(out, '~16 mo', `~${fmtInt(slowerPace.months)} mo`, 1);
    out = replaceExact(out, '~8 mo<', `~${fmtInt(standardPace.months)} mo<`, 1);
    out = replaceExact(out, '~4 mo', `~${fmtInt(fasterPace.months)} mo`, 1);
    // Pace kcal/day figures (250/500/1,000) and timeline marker left:% positions
    // are fixed constants of the three paces themselves (see plan doc — the
    // ratio is gap-independent), so the template's shipped text is already
    // correct for every lead and is intentionally left untouched.

    // Fat-oxidation ceiling
    out = replaceExact(out, '1,250 kcal/day', `${fmtInt(d.ceilingLow)} kcal/day`, 1);

    // Page 4 — protein target
    out = replaceExact(out, '168&ndash;210g', `${fmtRange(d.proteinLow, d.proteinHigh)}g`, 1);

    return out;
}

module.exports = { fillTemplate };
