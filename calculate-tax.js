const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

// Base price in cents ($50.00 first month)
const BASE_AMOUNT = 5000;

export default async function handler(req, res) {
    res.setHeader('Access-Control-Allow-Origin', 'https://asherrobinsonfitness.com');
    res.setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    if (req.method === 'OPTIONS') return res.status(200).end();

    try {
        const { address } = req.body;
        if (!address || !address.country) {
            return res.status(400).json({ error: 'address.country is required.' });
        }

        // Use the Stripe Tax Calculations API to preview tax without mutating any
        // subscription or invoice. This is the correct approach for showing live
        // tax estimates to the customer before they confirm payment.
        const taxCalc = await stripe.tax.calculations.create({
            currency: 'usd',
            line_items: [{
                amount:       BASE_AMOUNT,
                reference:    'online_coaching_first_month',
                tax_behavior: 'exclusive', // tax added on top of the base price
            }],
            customer_details: {
                address: {
                    line1:       address.line1       || '',
                    city:        address.city        || '',
                    state:       address.state       || '',
                    postal_code: address.postal_code || '',
                    country:     address.country,
                },
                address_source: 'billing',
            },
        });

        const tax = taxCalc.tax_amount_exclusive; // in cents

        res.status(200).json({
            tax,                           // cents, e.g. 425 = $4.25
            total: BASE_AMOUNT + tax,      // cents, e.g. 5425 = $54.25
        });
    } catch (err) {
        console.error('[calculate-tax]', err.message);
        res.status(500).json({ error: err.message });
    }
}
