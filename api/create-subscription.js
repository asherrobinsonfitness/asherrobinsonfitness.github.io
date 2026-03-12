const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

export default async function handler(req, res) {
    const { customerId, paymentMethodId, email, name, phone } = req.body;

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

    const subscription = await stripe.subscriptions.create({
        customer: customerId,
        items: [{ price: 'price_1T9nICKD9V1PzEruqvloHk4v' }],
        default_payment_method: paymentMethodId,
    });

    res.status(200).json({ subscriptionId: subscription.id, status: subscription.status });
}
