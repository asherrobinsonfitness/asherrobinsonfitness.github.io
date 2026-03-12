const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

export default async function handler(req, res) {
    const customer = await stripe.customers.create();
    
    const paymentIntent = await stripe.paymentIntents.create({
        amount: 5000, // $50
        currency: 'usd',
        customer: customer.id,
        setup_future_usage: 'off_session',
        automatic_payment_methods: { enabled: true },
    });

    res.status(200).json({
        clientSecret: paymentIntent.client_secret,
        customerId: customer.id,
    });
}
