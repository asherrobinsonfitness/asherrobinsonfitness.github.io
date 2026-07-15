const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

const PRICE_ID = 'price_1T9nICKD9V1PzEruqvloHk4v';
const PROMO_ID = 'promo_1TAskzKD9V1PzEruJOEDLUBu';

export default async function handler(req, res) {
    res.setHeader('Access-Control-Allow-Origin', 'https://asherrobinsonfitness.com');
    res.setHeader('Access-Control-Allow-Methods', 'POST, GET, OPTIONS');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    if (req.method === 'OPTIONS') return res.status(200).end();

    try {
        const { email, name, firstName, lastName, eventId, fbp, fbc } = req.body || {};

        const customer = await stripe.customers.create({
            email: email || undefined,
            name:  name  || undefined,
        });

        const subscription = await stripe.subscriptions.create({
            customer: customer.id,
            items: [{ price: PRICE_ID }],
            payment_behavior: 'default_incomplete',
            payment_settings: { save_default_payment_method: 'on_subscription' },
            discounts: [{ promotion_code: PROMO_ID }],
            expand: ['latest_invoice.payment_intent'],
        });

        const paymentIntent = subscription.latest_invoice?.payment_intent;
        if (!paymentIntent?.client_secret) {
            return res.status(500).json({ error: 'Payment intent not available on subscription invoice.' });
        }

        // Tag the payment intent with everything the Stripe webhook needs to send a
        // matching Meta CAPI Purchase event once the charge actually succeeds — this
        // is what lets the webhook fire authoritatively without depending on the
        // browser ever reaching /welcome.
        if (eventId) {
            await stripe.paymentIntents.update(paymentIntent.id, {
                metadata: {
                    fb_event_id: eventId,
                    fb_email: email || '',
                    fb_first_name: firstName || '',
                    fb_last_name: lastName || '',
                    fb_fbp: fbp || '',
                    fb_fbc: fbc || '',
                },
            });
        }

        res.status(200).json({
            clientSecret:   paymentIntent.client_secret,
            customerId:     customer.id,
            subscriptionId: subscription.id,
        });
    } catch (err) {
        console.error('[create-payment-intent]', err.message);
        res.status(500).json({ error: err.message });
    }
}
