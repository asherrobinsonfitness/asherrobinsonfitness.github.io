const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

export default async function handler(req, res) {
    const customer = await stripe.customers.create();

    const setupIntent = await stripe.setupIntents.create({
        customer: customer.id,
        usage: 'off_session',
        metadata: {
            price_id: 'price_1T9nICKD9V1PzEruqvloHk4v',
        },
    });

    res.status(200).json({
        clientSecret: setupIntent.client_secret,
        customerId: customer.id,
    });
}
