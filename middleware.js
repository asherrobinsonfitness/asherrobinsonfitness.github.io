// Vercel Edge Middleware — runs on every request to "/" before any static
// file is served. It assigns/reads a PostHog distinct_id cookie, asks
// PostHog which `landing-page-variant` bucket that visitor is in, and
// rewrites the request to index-onepage.html for the "test" variant.
// index.html stays the default for "control" and for every failure mode
// (missing env var, network error, timeout) so a PostHog outage can never
// take the site down.
//
// This file has no "type": "module" dependency — Vercel always builds a
// top-level middleware.js as an ES module, on the Edge runtime, regardless
// of framework or package.json settings.

import { PostHog } from 'posthog-node';

export const config = {
    matcher: ['/'],
};

const POSTHOG_PROJECT_API_KEY = process.env.POSTHOG_PROJECT_API_KEY;
const POSTHOG_HOST = process.env.POSTHOG_HOST || 'https://us.i.posthog.com';

const FLAG_KEY = 'landing-page-variant';
const COOKIE_NAME = 'ph_distinct_id';
const ONE_YEAR_SECONDS = 60 * 60 * 24 * 365;
// Bounds how long we'll wait on PostHog before falling back to control —
// a hung request would otherwise stall every page load during an outage.
const FLAG_TIMEOUT_MS = 1500;

function readCookie(request, name) {
    const header = request.headers.get('cookie');
    if (!header) return null;
    for (const part of header.split(';')) {
        const idx = part.indexOf('=');
        if (idx === -1) continue;
        if (part.slice(0, idx).trim() === name) {
            return decodeURIComponent(part.slice(idx + 1).trim());
        }
    }
    return null;
}

function withTimeout(promise, ms) {
    return Promise.race([
        promise,
        new Promise((_, reject) => setTimeout(() => reject(new Error('PostHog flag evaluation timed out')), ms)),
    ]);
}

export default async function middleware(request, context) {
    const url = new URL(request.url);

    let distinctId = readCookie(request, COOKIE_NAME);
    const isNewDistinctId = !distinctId;
    if (isNewDistinctId) {
        distinctId = crypto.randomUUID();
    }

    let variant = 'control';

    if (POSTHOG_PROJECT_API_KEY) {
        try {
            const posthog = new PostHog(POSTHOG_PROJECT_API_KEY, {
                host: POSTHOG_HOST,
                // Same reasoning as api/_lib/posthog-node.js: this runs in a
                // short-lived function invocation, so events must be sent
                // immediately rather than queued for a batched flush that
                // may never get a chance to run.
                flushAt: 1,
                flushInterval: 0,
            });

            try {
                const flagValue = await withTimeout(posthog.getFeatureFlag(FLAG_KEY, distinctId), FLAG_TIMEOUT_MS);
                if (flagValue === 'test') {
                    variant = 'test';
                }
            } finally {
                // Flush the queued $feature_flag_called analytics event
                // (used for PostHog experiment exposure tracking) without
                // blocking the response on it.
                context?.waitUntil?.(posthog.shutdown());
            }
        } catch (err) {
            console.error('[middleware] PostHog flag evaluation failed, defaulting to control:', err.message);
        }
    } else {
        console.error('[middleware] POSTHOG_PROJECT_API_KEY is not set, defaulting to control');
    }

    const headers = new Headers();

    if (variant === 'test') {
        headers.set('x-middleware-rewrite', new URL('/index-onepage.html', url.origin).toString());
    } else {
        headers.set('x-middleware-next', '1');
    }

    if (isNewDistinctId) {
        const secure = url.protocol === 'https:' ? '; Secure' : '';
        headers.append(
            'Set-Cookie',
            `${COOKIE_NAME}=${distinctId}; Path=/; Max-Age=${ONE_YEAR_SECONDS}; SameSite=Lax${secure}`
        );
    }

    // The response depends on a cookie-driven decision, so it must never be
    // cached — by the browser or by Vercel's edge network.
    headers.set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    headers.set('CDN-Cache-Control', 'no-store');
    headers.set('Vercel-CDN-Cache-Control', 'no-store');

    return new Response(null, { headers });
}
