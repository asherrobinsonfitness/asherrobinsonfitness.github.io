<?php
// Clear any opcode cache
if (function_exists('opcache_reset')) {
    opcache_reset();
}

// Cal.com API Configuration

// After creating your Cal.com account and obtaining your API key,
// copy this file to cal_config.php and replace the placeholder value
// with your actual API key. Keep your API key secure and never
// commit it to version control.

// Your Cal.com API Key
$CAL_API_KEY = 'cal_live_5c7c95cabbc576105e8b12d35c537a92';

// Cal.com API Base URL
$CAL_BASE_URL = 'https://api.cal.com';

// Your event type ID (you'll need to get this from your Cal.com dashboard)
// Go to your Cal.com dashboard -> Event Types and copy the ID of your mentorship call event
$CAL_EVENT_TYPE_ID = '708903'; // Your 30-minute mentorship call event type ID

// Default timezone
$CAL_DEFAULT_TIMEZONE = 'America/New_York';
?>