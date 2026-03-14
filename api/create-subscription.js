const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

// The customer-facing promo code for the $50 first month offer
const FIRST_MONTH_PROMO_CODE = 'firstmonth50';
// The Stripe promotion code API ID for the $50 first month offer
const FIRST_MONTH_PROMO_ID = 'promo_1TAskzKD9V1PzEruJOEDLUBu';

export default async function handler(req, res) {
    const { customerId, paymentMethodId, email, name, phone, promotionCode } = req.body;

    await stripe.paymentMethods.attach(paymentMethodId, {
        customer: customerId,
    });

    const customerUpdate = {
        invoice_settings: { default_payment_method: paymentMethodId },
    };

    if (email) customerUpdate.email = email;
    if (name) customerUpdate.name = name;
    if (phone) customerUpdate.phone = phone;

    await stripe.customers.update(customerId, customerUpdate);

    // Resolve the promotion code
    let resolvedPromoId = FIRST_MONTH_PROMO_ID;
    if (promotionCode && promotionCode.toLowerCase() !== FIRST_MONTH_PROMO_CODE.toLowerCase()) {
        try {
            const promoCodes = await stripe.promotionCodes.list({
                code: promotionCode,
                active: true,
                limit: 1,
            });
            if (promoCodes.data.length > 0) {
                resolvedPromoId = promoCodes.data[0].id;
            }
        } catch (err) { /* fall back to default */ }
    }

    const subscription = await stripe.subscriptions.create({
        customer: customerId,
        items: [{ price: 'price_1T9nICKD9V1PzEruqvloHk4v' }],
        default_payment_method: paymentMethodId,
        promotion_code: resolvedPromoId,
        automatic_tax: { enabled: true },
        collection_method: 'charge_automatically',
    });

    res.status(200).json({ subscriptionId: subscription.id, status: subscription.status });
}
