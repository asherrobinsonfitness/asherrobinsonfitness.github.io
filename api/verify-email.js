const dns = require('dns').promises;

const EMAIL_RE = /^[^\s@]+@([^\s@]+\.[^\s@]{2,})$/;

export default async function handler(req, res) {
    res.setHeader('Access-Control-Allow-Origin', 'https://asherrobinsonfitness.com');
    res.setHeader('Access-Control-Allow-Methods', 'GET, OPTIONS');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    if (req.method === 'OPTIONS') return res.status(200).end();

    const email = String(req.query.email || '').trim();
    const match = EMAIL_RE.exec(email);
    if (!match) return res.status(200).json({ valid: false, reason: 'format' });

    const domain = match[1].toLowerCase();
    try {
        const records = await dns.resolveMx(domain);
        return res.status(200).json({ valid: records.length > 0 });
    } catch (err) {
        try {
            await dns.resolve4(domain);
            return res.status(200).json({ valid: true });
        } catch (err2) {
            return res.status(200).json({ valid: false, reason: 'no-mail-server' });
        }
    }
}
