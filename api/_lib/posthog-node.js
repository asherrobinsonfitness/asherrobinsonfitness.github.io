const { PostHog } = require('posthog-node');

// Files/folders prefixed with "_" under /api are not deployed as routes by
// Vercel — this is a shared module imported by api/stripe-webhook.js, not a
// route itself.

const POSTHOG_KEY = 'phc_utdoPENXNndee2XS4QgEAEUAU5JHyMCFzLciVREuJXGQ';
const POSTHOG_HOST = 'https://us.i.posthog.com';

let client;

// flushAt: 1 / flushInterval: 0 send each capture immediately instead of
// batching — a serverless function can freeze before a batched flush ever
// gets a chance to run.
function getPostHogClient() {
    if (!client) {
        client = new PostHog(POSTHOG_KEY, {
            host: POSTHOG_HOST,
            flushAt: 1,
            flushInterval: 0,
        });
    }
    return client;
}

module.exports = { getPostHogClient };
