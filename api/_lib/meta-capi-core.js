const crypto = require('crypto');

// Files/folders prefixed with "_" under /api are not deployed as routes by
// Vercel — this is a shared module imported by the actual endpoint handlers
// (api/meta-capi.js and api/stripe-webhook.js), not a route itself.

const PIXEL_ID = process.env.META_PIXEL_ID;
const ACCESS_TOKEN = process.env.META_ACCESS_TOKEN;
const GRAPH_VERSION = process.env.META_GRAPH_API_VERSION || 'v21.0';

// Allow-list of event names this module will relay. Keeps callers from
// injecting arbitrary event types into the pixel.
const ALLOWED_EVENTS = new Set([
    'PageView',
    'Lead',
    'Purchase',
    'ViewContent',
    'InitiateCheckout',
    'CompleteRegistration',
]);

function sha256(value) {
    return crypto.createHash('sha256').update(String(value).trim().toLowerCase()).digest('hex');
}

function httpError(status, message, details) {
    const err = new Error(message);
    err.status = status;
    if (details) err.details = details;
    return err;
}

function buildHashedUserData(ud, clientIp, clientUserAgent) {
    const hashedUserData = {};
    if (clientIp) hashedUserData.client_ip_address = clientIp;
    if (clientUserAgent) hashedUserData.client_user_agent = clientUserAgent;
    if (ud.email) hashedUserData.em = [sha256(ud.email)];
    if (ud.phone) hashedUserData.ph = [sha256(String(ud.phone).replace(/[^\d]/g, ''))];
    if (ud.firstName) hashedUserData.fn = [sha256(ud.firstName)];
    if (ud.lastName) hashedUserData.ln = [sha256(ud.lastName)];
    if (ud.city) hashedUserData.ct = [sha256(ud.city)];
    if (ud.state) hashedUserData.st = [sha256(ud.state)];
    if (ud.zip) hashedUserData.zp = [sha256(ud.zip)];
    if (ud.country) hashedUserData.country = [sha256(ud.country)];
    // fbp/fbc are click-id cookies, not PII — sent as-is, not hashed, per Meta's spec.
    if (ud.fbp) hashedUserData.fbp = String(ud.fbp).slice(0, 200);
    if (ud.fbc) hashedUserData.fbc = String(ud.fbc).slice(0, 200);
    return hashedUserData;
}

function buildSafeCustomData(customData) {
    if (!customData || typeof customData !== 'object') return undefined;
    const safe = {};
    if (customData.currency) safe.currency = String(customData.currency).slice(0, 10);
    if (customData.value !== undefined) {
        const value = Number(customData.value);
        if (Number.isFinite(value) && value >= 0 && value <= 10000) safe.value = value;
    }
    if (customData.order_id) safe.order_id = String(customData.order_id).slice(0, 100);
    if (customData.content_name) safe.content_name = String(customData.content_name).slice(0, 200);
    return Object.keys(safe).length ? safe : undefined;
}

// Sends one event to Meta's Conversions API. Throws an Error with a `.status`
// (and optionally `.details`) on any failure, so callers can decide how to
// surface it (HTTP response vs. just logging in a webhook handler).
async function sendCapiEvent({ event_name, event_id, event_source_url, user_data, custom_data, clientIp, clientUserAgent }) {
    if (!PIXEL_ID || !ACCESS_TOKEN) {
        throw httpError(500, 'Server not configured: missing META_PIXEL_ID or META_ACCESS_TOKEN');
    }
    if (!ALLOWED_EVENTS.has(event_name)) {
        throw httpError(400, 'Unsupported event_name');
    }
    if (!event_id) {
        throw httpError(400, 'event_id is required for dedup');
    }

    const safeCustomData = buildSafeCustomData(custom_data);
    const payload = {
        data: [{
            event_name,
            event_id,
            event_time: Math.floor(Date.now() / 1000),
            action_source: 'website',
            event_source_url: typeof event_source_url === 'string' ? event_source_url.slice(0, 500) : undefined,
            user_data: buildHashedUserData(user_data || {}, clientIp, clientUserAgent),
            ...(safeCustomData ? { custom_data: safeCustomData } : {}),
        }],
    };

    const url = `https://graph.facebook.com/${GRAPH_VERSION}/${PIXEL_ID}/events?access_token=${encodeURIComponent(ACCESS_TOKEN)}`;
    const metaRes = await fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload),
    });
    const metaJson = await metaRes.json();

    if (!metaRes.ok) {
        throw httpError(502, 'Meta CAPI error', metaJson);
    }

    return metaJson;
}

module.exports = { sendCapiEvent, ALLOWED_EVENTS };
