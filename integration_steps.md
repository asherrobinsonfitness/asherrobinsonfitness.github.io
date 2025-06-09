# Cal.com API Integration Guide

## Step 1: Create a Cal.com Account and Set Up
1. Sign up for a Cal.com account at https://cal.com/signup
2. Configure your availability, event types, and other settings in the Cal.com dashboard
3. In your Cal.com dashboard, go to "Developer Settings" and create an API key
4. Note your API key and keep it secure (we'll use this in our implementation)
5. Create at least one event type for your booking system (e.g., "Mentorship Call")
6. Note the event type ID, which you'll need for your configuration

## Step 2: Create PHP Backend for Cal.com API
1. Create `cal_config.php` from the example file:
   - Copy `cal_config.example.php` to `cal_config.php`
   - Replace the placeholder API key with your actual Cal.com API key

2. Make sure `cal_api.php` is in place:
   - This file handles all communication with the Cal.com API
   - It provides endpoints for getting available time slots, event types, and creating bookings

## Step 3: Configure the JavaScript Integration
1. Edit `cal_scheduler.js`:
   - Update the `CAL_CONFIG` object at the top of the file:
   ```javascript
   const CAL_CONFIG = {
       eventTypeId: 'your_event_type_id', // Replace with your actual event type ID
       defaultTimeZone: 'America/New_York', // Set your preferred default timezone
   };
   ```

## Step 4: Test the Integration
1. Load your calendar.php page
2. The calendar should now fetch available slots from Cal.com API based on your availability settings
3. When a user selects a time slot and submits the form, it should create a booking in your Cal.com account
4. The user should be redirected to the confirmation page with their booking details

## Step 5: Customization (Optional)
1. You can modify the CSS in calendar.php to match your branding
2. You can adjust the time slot display format in the JavaScript code
3. You can add additional fields to the booking form as needed

## Troubleshooting
1. Check your browser console for any JavaScript errors
2. Verify that your API key is correct in cal_config.php
3. Make sure your event type ID is correct in cal_scheduler.js
4. Check that the cal_api.php file is accessible from your web server
5. Verify that your Cal.com account has available time slots for the selected dates

## Security Considerations
1. Keep your API key secure and never expose it in client-side code
2. Consider implementing rate limiting to prevent abuse
3. Validate all user input before sending it to the Cal.com API
4. Consider implementing CSRF protection for form submissions
5. Always use HTTPS to protect sensitive data in transit

## Advanced Features (Future Enhancement)
1. Implement webhook support for real-time updates when bookings are modified or canceled
2. Add SMS or email notifications using Cal.com's notification APIs
3. Implement team calendar support if you have multiple mentors
4. Add payment integration if you're charging for sessions
5. Implement analytics to track booking patterns and conversion rates 