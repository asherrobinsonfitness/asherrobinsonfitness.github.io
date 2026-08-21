const fs = require('fs');
const path = require('path');
const { computeRoadmap } = require('./_lib/roadmap-calc');
const { fillTemplate } = require('./_lib/roadmap-template');
const { getPostHogClient } = require('./_lib/posthog-node');

// Triggered by a Supabase Database Webhook on INSERT into roadmap_leads.
// Pipeline: fill the PDF template with the lead's numbers -> render it via
// PDFShift -> upload to Supabase Storage -> upsert + tag the lead in Kit so
// the Kit Automation (built in the Kit dashboard, not here) sends the
// delivery email and continues into the newsletter sequence.
//
// Failure policy (confirmed with Asher — see the plan doc): every stage is
// independently logged and reported to PostHog on failure, with no
// automatic retry. A stage that succeeds is never rolled back if a later
// stage fails — e.g. if the PDF renders and uploads fine but the Kit call
// fails, the PDF stays in Storage (its URL is deterministic from the lead's
// row id) and only the Kit step needs a manual re-run. This is a paid-ad
// lead magnet — a silent failure is a lost customer acquisition cost, so
// every failure path logs the lead's email and exactly which stage broke.

const SUPABASE_URL = process.env.SUPABASE_URL;
const SUPABASE_SERVICE_ROLE_KEY = process.env.SUPABASE_SERVICE_ROLE_KEY;
const PDFSHIFT_API_KEY = process.env.PDFSHIFT_API_KEY;
const KIT_API_KEY = process.env.KIT_API_KEY;
const KIT_ROADMAP_TAG_ID = process.env.KIT_ROADMAP_TAG_ID;
const ROADMAP_WEBHOOK_SECRET = process.env.ROADMAP_WEBHOOK_SECRET;

const STORAGE_BUCKET = 'roadmap-pdfs';
const PUBLIC_HOST = 'https://asherrobinsonfitness.com';

const TEMPLATE_PATH = path.join(__dirname, '..', 'roadmap', 'pdf-template.html');
let cachedTemplate = null;
function loadTemplate() {
    // Cached across warm invocations of the same serverless instance —
    // the template file never changes at runtime.
    if (!cachedTemplate) {
        cachedTemplate = fs.readFileSync(TEMPLATE_PATH, 'utf8');
    }
    return cachedTemplate;
}

async function capture(event, email, properties) {
    try {
        await getPostHogClient().captureImmediate({
            distinctId: email || 'unknown',
            event,
            properties: properties || {},
        });
    } catch (err) {
        console.error('[send-roadmap] PostHog capture failed', event, err.message);
    }
}

function logFailure(stage, email, err) {
    console.error(`[send-roadmap] ${stage} failed for ${email || '(unknown email)'}:`, err.message);
}

async function failStage(stage, email, err) {
    logFailure(stage, email, err);
    await capture('roadmap_pdf_send_failed', email, { stage });
}

export default async function handler(req, res) {
    if (req.method !== 'POST') return res.status(405).end();

    if (!ROADMAP_WEBHOOK_SECRET || req.headers['x-webhook-secret'] !== ROADMAP_WEBHOOK_SECRET) {
        console.error('[send-roadmap] rejected request with missing/invalid webhook secret');
        return res.status(401).json({ error: 'Unauthorized' });
    }

    // Supabase Database Webhook payload shape: { type, table, record, schema, old_record }
    const lead = (req.body && req.body.record) || {};
    const email = lead.email;

    if (!email || !lead.id) {
        console.error('[send-roadmap] payload missing lead id/email:', JSON.stringify(req.body || {}).slice(0, 500));
        return res.status(400).json({ error: 'Missing lead id/email' });
    }

    // Stage 1+2 — calculate this lead's numbers and fill the PDF template.
    let filledHtml;
    try {
        const calc = computeRoadmap(lead);
        filledHtml = fillTemplate(loadTemplate(), lead, calc);
    } catch (err) {
        await failStage('templating', email, err);
        return res.status(200).json({ ok: false, stage: 'templating' });
    }

    // Stage 3 — render to PDF via PDFShift.
    let pdfBuffer;
    try {
        const resp = await fetch('https://api.pdfshift.io/v3/convert/pdf', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Authorization: 'Basic ' + Buffer.from('api:' + PDFSHIFT_API_KEY).toString('base64'),
            },
            body: JSON.stringify({
                source: filledHtml,
                use_print: true,
            }),
        });
        if (!resp.ok) {
            const text = await resp.text().catch(() => '');
            throw new Error(`PDFShift ${resp.status}: ${text.slice(0, 300)}`);
        }
        pdfBuffer = Buffer.from(await resp.arrayBuffer());
    } catch (err) {
        await failStage('pdf_render', email, err);
        return res.status(200).json({ ok: false, stage: 'pdf_render' });
    }

    // Stage 4 — upload to Supabase Storage (private bucket; served back out
    // through /api/roadmap-pdf so the visible link is our own domain).
    const storagePath = `${lead.id}.pdf`;
    try {
        const resp = await fetch(
            `${SUPABASE_URL}/storage/v1/object/${STORAGE_BUCKET}/${storagePath}`,
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/pdf',
                    Authorization: `Bearer ${SUPABASE_SERVICE_ROLE_KEY}`,
                    'x-upsert': 'true',
                },
                body: pdfBuffer,
            }
        );
        if (!resp.ok) {
            const text = await resp.text().catch(() => '');
            throw new Error(`Supabase Storage ${resp.status}: ${text.slice(0, 300)}`);
        }
    } catch (err) {
        await failStage('storage_upload', email, err);
        return res.status(200).json({ ok: false, stage: 'storage_upload' });
    }

    const pdfUrl = `${PUBLIC_HOST}/roadmap/view/${lead.id}`;
    await capture('roadmap_pdf_generated', email, { pdf_url: pdfUrl });

    // Stage 5 — upsert the Kit subscriber with the PDF link custom field.
    // NOTE: verify against a real Kit account that `fields` values actually
    // update on an *existing* subscriber via this upsert endpoint — Kit's
    // docs only explicitly confirm first_name updates on upsert. If a
    // returning/already-subscribed lead's field doesn't update in practice,
    // add an explicit follow-up call here to force it.
    try {
        const resp = await fetch('https://api.kit.com/v4/subscribers', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Kit-Api-Key': KIT_API_KEY,
            },
            body: JSON.stringify({
                email_address: email,
                first_name: lead.first_name || undefined,
                fields: { roadmap_pdf_url: pdfUrl },
            }),
        });
        if (!resp.ok) {
            const text = await resp.text().catch(() => '');
            throw new Error(`Kit subscribers ${resp.status}: ${text.slice(0, 300)}`);
        }
    } catch (err) {
        await failStage('kit_subscribe', email, err);
        return res.status(200).json({ ok: false, stage: 'kit_subscribe' });
    }

    // Stage 6 — tag the subscriber so the Kit Automation (built in the Kit
    // dashboard) picks them up and sends the delivery email.
    try {
        const resp = await fetch(`https://api.kit.com/v4/tags/${KIT_ROADMAP_TAG_ID}/subscribers`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Kit-Api-Key': KIT_API_KEY,
            },
            body: JSON.stringify({ email_address: email }),
        });
        if (!resp.ok) {
            const text = await resp.text().catch(() => '');
            throw new Error(`Kit tag ${resp.status}: ${text.slice(0, 300)}`);
        }
    } catch (err) {
        await failStage('kit_tag', email, err);
        return res.status(200).json({ ok: false, stage: 'kit_tag' });
    }

    await capture('roadmap_kit_subscribed', email, {});

    return res.status(200).json({ ok: true });
}
