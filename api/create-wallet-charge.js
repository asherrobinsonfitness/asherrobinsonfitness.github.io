res.setHeader('Access-Control-Allow-Origin', 'https://asherrobinsonfitness.com');
res.setHeader('Access-Control-Allow-Methods', 'POST, GET, OPTIONS');
res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
if (req.method === 'OPTIONS') return res.status(200).end();
 
const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

// The Stripe promotion code API ID for the $50 first month offer (applied to everyone)
const FIRST_MONTH_PROMO_ID = 'promo_1TAskzKD9V1PzEruJOEDLUBu';

export default async function handler(req, res) {
    const { email, name, phone, promotionCode } = req.body;

    // Create the customer up front so we can attach the subscription after payment
    const customerData = {};
    if (email) customerData.email = email;
    if (name) customerData.name = name;
    if (phone) customerData.phone = phone;
    const customer = await stripe.customers.create(customerData);

    // Resolve promo code
    let resolvedPromoId = FIRST_MONTH_PROMO_ID;
    if (promotionCode) {
        try {
            const promoCodes = await stripe.promotionCodes.list({ code: promotionCode, active: true, limit: 1 });
            if (promoCodes.data.length > 0) resolvedPromoId = promoCodes.data[0].id;
        } catch (err) { /* fall back to default */ }
    }

    // Create a PaymentIntent for the $50 first-month charge.
    // After it succeeds (via webhook or return_url), create the subscription.
    // We embed customerId and promoId in metadata so the webhook/return handler
    // can finish subscription creation.
    const paymentIntent = await stripe.paymentIntents.create({
        amount: 5000, // $50.00
        currency: 'usd',
        customer: customer.id,
        setup_future_usage: 'off_session', // saves the payment method to the customer
        automatic_payment_methods: { enabled: true },
        metadata: {
            customerId: customer.id,
            promotionCodeId: resolvedPromoId,
            priceId: 'price_1T9nICKD9V1PzEruqvloHk4v',
            flow: 'wallet_first_month',
        },
    });

    res.status(200).json({
        clientSecret: paymentIntent.client_secret,
        customerId: customer.id,
    });
}
