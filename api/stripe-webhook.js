const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);
const { sendCapiEvent } = require('./_lib/meta-capi-core');

// Stripe's signature check needs the exact raw request bytes, so the
// platform's automatic JSON body parsing has to be turned off for this route.
export const config = {
    api: { bodyParser: false },
};

function readRawBody(req) {
    return new Promise((resolve, reject) => {
        const chunks = [];
        req.on('data', (chunk) => chunks.push(chunk));
        req.on('end', () => resolve(Buffer.concat(chunks)));
        req.on('error', reject);
    });
}

export default async function handler(req, res) {
    if (req.method !== 'POST') return res.status(405).end();

    let event;
    try {
        const rawBody = await readRawBody(req);
        event = stripe.webhooks.constructEvent(rawBody, req.headers['stripe-signature'], process.env.STRIPE_WEBHOOK_SECRET);
    } catch (err) {
        console.error('[stripe-webhook] Signature verification failed', err.message);
        return res.status(400).json({ error: 'Invalid signature' });
    }

    if (event.type === 'payment_intent.succeeded') {
        const paymentIntent = event.data.object;
        const meta = paymentIntent.metadata || {};

        // Only PaymentIntents created through the funnel in create-payment-intent.js
        // carry fb_event_id — this skips test intents and anything else unrelated.
        if (meta.fb_event_id) {
            try {
                await sendCapiEvent({
                    event_name: 'Purchase',
                    event_id: meta.fb_event_id,
                    event_source_url: 'https://asherrobinsonfitness.com/welcome',
                    user_data: {
                        email: meta.fb_email || undefined,
                        firstName: meta.fb_first_name || undefined,
                        lastName: meta.fb_last_name || undefined,
                        fbp: meta.fb_fbp || undefined,
                        fbc: meta.fb_fbc || undefined,
                    },
                    custom_data: {
                        value: paymentIntent.amount / 100,
                        currency: paymentIntent.currency.toUpperCase(),
                        order_id: paymentIntent.id,
                    },
                    // No browser request here, so no client_ip_address/client_user_agent —
                    // the fbp/fbc + hashed contact info above are still a strong match signal.
                });
            } catch (err) {
                console.error('[stripe-webhook] CAPI send failed', err.message, err.details || '');
                // Don't fail the webhook response over a CAPI delivery hiccup — the
                // payment itself already succeeded, and Stripe would otherwise keep
                // retrying an event we can't meaningfully do anything different with.
            }
        }
    }

    res.status(200).json({ received: true });
}
