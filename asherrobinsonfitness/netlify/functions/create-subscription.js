const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

exports.handler = async (event) => {
    const { customerId, paymentMethodId } = JSON.parse(event.body);

    // Attach payment method to customer
    await stripe.paymentMethods.attach(paymentMethodId, {
        customer: customerId,
    });

    // Set as default payment method
    await stripe.customers.update(customerId, {
        invoice_settings: { default_payment_method: paymentMethodId },
    });

    // Create the subscription
    const subscription = await stripe.subscriptions.create({
        customer: customerId,
        items: [{ price: 'price_1T9nICKD9V1PzEruqvloHk4v' }],
        default_payment_method: paymentMethodId,
    });

    return {
        statusCode: 200,
        headers: { 'Access-Control-Allow-Origin': '*' },
        body: JSON.stringify({ subscriptionId: subscription.id, status: subscription.status }),
    };
};
