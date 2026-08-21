// Streams a lead's stored roadmap PDF from Supabase Storage, so the link
// that ends up in the delivery email reads as our own domain
// (asherrobinsonfitness.com/roadmap/view/<id>, rewritten to this route by
// vercel.json) instead of a raw supabase.co Storage URL. The bucket is
// private — this route is the only thing with the service role key needed
// to read it.

const SUPABASE_URL = process.env.SUPABASE_URL;
const SUPABASE_SERVICE_ROLE_KEY = process.env.SUPABASE_SERVICE_ROLE_KEY;
const STORAGE_BUCKET = 'roadmap-pdfs';

export default async function handler(req, res) {
    if (req.method !== 'GET') return res.status(405).end();

    const id = String(req.query.id || '').trim();
    // Lead ids are Supabase-generated UUIDs — reject anything else outright
    // rather than forwarding an arbitrary path segment to Storage.
    if (!/^[0-9a-fA-F-]{10,60}$/.test(id)) {
        return res.status(400).send('Invalid link.');
    }

    try {
        const resp = await fetch(
            `${SUPABASE_URL}/storage/v1/object/${STORAGE_BUCKET}/${id}.pdf`,
            { headers: { Authorization: `Bearer ${SUPABASE_SERVICE_ROLE_KEY}` } }
        );

        if (resp.status === 404) {
            return res.status(404).send('This roadmap link is no longer available.');
        }
        if (!resp.ok) {
            throw new Error(`Supabase Storage ${resp.status}`);
        }

        const buffer = Buffer.from(await resp.arrayBuffer());
        res.setHeader('Content-Type', 'application/pdf');
        res.setHeader('Content-Disposition', 'inline; filename="10-Percent-Body-Fat-Roadmap.pdf"');
        res.setHeader('Cache-Control', 'private, max-age=86400');
        return res.status(200).send(buffer);
    } catch (err) {
        console.error('[roadmap-pdf] failed to stream', id, err.message);
        return res.status(500).send('Something went wrong loading your roadmap. Reply to any email from us and we\'ll resend it.');
    }
}
