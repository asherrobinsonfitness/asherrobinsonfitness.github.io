const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

export default async function handler(req, res) {
    res.setHeader('Access-Control-Allow-Origin', 'https://asherrobinsonfitness.com');
    res.setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    if (req.method === 'OPTIONS') return res.status(200).end();

    try {
        const { subscriptionId, address } = req.body;
        if (!subscriptionId || !address || !address.country || !address.postal_code) {
            return res.status(400).json({ error: 'Missing subscriptionId or address.' });
        }

        // Retrieve subscription to get the customer ID
        const subscription = await stripe.subscriptions.retrieve(subscriptionId, {
            expand: ['latest_invoice'],
        });

        // Update the customer's address so Stripe Tax can calculate correctly
        await stripe.customers.update(subscription.customer, { address });

        // Retrieve the open invoice after the address update — Stripe Tax recalculates
        const invoice = await stripe.invoices.retrieve(subscription.latest_invoice.id);

        res.status(200).json({
            tax:   invoice.tax   || 0,            // tax in cents
            total: invoice.amount_due || 5000,     // total in cents (base $50 + tax)
        });
    } catch (err) {
        console.error('[calculate-tax]', err.message);
        res.status(500).json({ error: err.message });
    }
}
