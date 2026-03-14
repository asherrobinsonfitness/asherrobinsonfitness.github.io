const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

export const config = { api: { bodyParser: false } };

async function getRawBody(req) {
    return new Promise((resolve, reject) => {
        const chunks = [];
        req.on('data', chunk => chunks.push(chunk));
        req.on('end', () => resolve(Buffer.concat(chunks)));
        req.on('error', reject);
    });
}

export default async function handler(req, res) {
    if (req.method !== 'POST') return res.status(405).end();

    const rawBody = await getRawBody(req);
    const sig = req.headers['stripe-signature'];

    let event;
    try {
        event = stripe.webhooks.constructEvent(rawBody, sig, process.env.STRIPE_WEBHOOK_SECRET);
    } catch (err) {
        return res.status(400).send(`Webhook Error: ${err.message}`);
    }

    if (event.type === 'payment_intent.succeeded') {
        const paymentIntent = event.data.object;
        const { flow, customerId, promotionCodeId, priceId } = paymentIntent.metadata || {};

        if (flow === 'wallet_first_month' && customerId && priceId) {
            // The wallet charged $50 successfully. Now attach the saved payment method
            // and create the recurring subscription.
            const paymentMethodId = paymentIntent.payment_method;

            await stripe.customers.update(customerId, {
                invoice_settings: { default_payment_method: paymentMethodId },
            });

            await stripe.subscriptions.create({
                customer: customerId,
                items: [{ price: priceId }],
                default_payment_method: paymentMethodId,
                // Skip the first invoice — the $50 was already charged via the PaymentIntent above.
                // The promo covers the first month; billing starts fresh on the next cycle.
                trial_end: Math.floor(Date.now() / 1000) + 30 * 24 * 60 * 60, // 30 days from now
                automatic_tax: { enabled: true },
                collection_method: 'charge_automatically',
            });
        }
    }

    res.status(200).json({ received: true });
}
