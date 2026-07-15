const { sendCapiEvent } = require('./_lib/meta-capi-core');

// Set these in Vercel project env vars (Settings > Environment Variables).
// META_PIXEL_ID is not secret (it's already visible in the client-side pixel
// snippet) but is kept here so it only has to be updated in one place.
// META_ACCESS_TOKEN is secret: Events Manager > Data Sources > your pixel >
// Settings > Conversions API > Generate Access Token.

export default async function handler(req, res) {
    res.setHeader('Access-Control-Allow-Origin', 'https://asherrobinsonfitness.com');
    res.setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    if (req.method === 'OPTIONS') return res.status(200).end();
    if (req.method !== 'POST') return res.status(405).json({ error: 'Method not allowed' });

    try {
        const { event_name, event_id, event_source_url, user_data, custom_data } = req.body || {};

        // Never trust client-supplied IP/UA — always take them from the request itself.
        const forwardedFor = req.headers['x-forwarded-for'];
        const clientIp = (Array.isArray(forwardedFor) ? forwardedFor[0] : forwardedFor || '').split(',')[0].trim()
            || req.socket?.remoteAddress
            || '';
        const clientUserAgent = req.headers['user-agent'] || '';

        const result = await sendCapiEvent({
            event_name, event_id, event_source_url, user_data, custom_data,
            clientIp, clientUserAgent,
        });

        res.status(200).json({ success: true, events_received: result.events_received });
    } catch (err) {
        console.error('[meta-capi]', err.message, err.details || '');
        res.status(err.status || 500).json({ error: err.message, details: err.details });
    }
}
