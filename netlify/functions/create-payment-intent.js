const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

exports.handler = async () => {
    // Create a customer first
    const customer = await stripe.customers.create();

    // Create a SetupIntent to collect payment details
    const setupIntent = await stripe.setupIntents.create({
        customer: customer.id,
        automatic_payment_methods: { enabled: true },
        metadata: {
            price_id: 'price_1T9nICKD9V1PzEruqvloHk4v',
        },
    });

    return {
        statusCode: 200,
        headers: { 'Access-Control-Allow-Origin': '*' },
        body: JSON.stringify({
            clientSecret: setupIntent.client_secret,
            customerId: customer.id,
        }),
    };
};
