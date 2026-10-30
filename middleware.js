import { next } from '@vercel/functions';

// roadmap/ question-order split test (PostHog flag "roadmap-question-order").
// Asks PostHog for the visitor's order before the page is sent, so the form
// shows the right first question with no wait. The page reads the answer from
// the roadmap_order cookie and hands it to posthog-js (bootstrap), which
// records the exposure. The visitor's own PostHog ID is reused when they have
// one, so the server and the page agree on who they are.
export const config = { matcher: ['/roadmap', '/roadmap/'] };

const TOKEN = 'phc_utdoPENXNndee2XS4QgEAEUAU5JHyMCFzLciVREuJXGQ';
const FLAG = 'roadmap-question-order';
const NINETY_DAYS = 60 * 60 * 24 * 90;

function readCookie(header, name) {
    const m = (header || '').match(new RegExp('(?:^|; )' + name + '=([^;]*)'));
    return m ? decodeURIComponent(m[1]) : undefined;
}

export default async function middleware(request) {
    const cookies = request.headers.get('cookie');
    // Picked on an earlier visit: same visitor, same order, nothing to ask.
    if (readCookie(cookies, 'roadmap_order')) return next();

    let id;
    try { id = JSON.parse(readCookie(cookies, 'ph_' + TOKEN + '_posthog')).distinct_id; } catch (e) {}
    id = id || crypto.randomUUID();

    // No answer within 1s (or the experiment isn't running): no cookie, so the
    // page shows the current order and the visitor stays out of the test.
    try {
        const res = await fetch('https://us.i.posthog.com/flags/?v=2', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ api_key: TOKEN, distinct_id: id, flag_keys_to_evaluate: [FLAG] }),
            signal: AbortSignal.timeout(1000),
        });
        const flag = (await res.json()).flags?.[FLAG];
        if (!flag?.variant) return next();
        const headers = new Headers();
        headers.append('Set-Cookie', `roadmap_order=${flag.variant}; Path=/; Max-Age=${NINETY_DAYS}; SameSite=Lax; Secure`);
        headers.append('Set-Cookie', `roadmap_ph_id=${encodeURIComponent(id)}; Path=/; Max-Age=${NINETY_DAYS}; SameSite=Lax; Secure`);
        return next({ headers });
    } catch (e) {
        return next();
    }
}
