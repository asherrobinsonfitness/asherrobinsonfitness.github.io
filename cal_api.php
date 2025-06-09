<?php
// cal_api.php - Handler for Cal.com API interactions

// Load configuration from cal_config.php
if (file_exists('cal_config.php')) {
    require_once 'cal_config.php';
    $API_KEY = $CAL_API_KEY;
    $BASE_URL = $CAL_BASE_URL;
} else {
    die('Cal.com API configuration file not found. Please create cal_config.php from the example file.');
}

// Set default timezone
date_default_timezone_set('UTC');

// Error handling function
function apiError($message, $statusCode = 400) {
    header('Content-Type: application/json');
    http_response_code($statusCode);
    echo json_encode(['error' => $message]);
    exit;
}

// Request handler
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'availability':
        getAvailability();
        break;
    case 'event_types':
        getEventTypes();
        break;
    case 'create_booking':
        createBooking();
        break;
    case 'cancel_booking':
        cancelBooking();
        break;
    case 'get_booking':
        getBooking();
        break;
    default:
        apiError('Invalid action specified', 404);
}

// Get available time slots for a specific date
function getAvailability() {
    global $API_KEY, $BASE_URL;
    
    // Required parameters
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $eventTypeId = isset($_GET['event_type_id']) ? $_GET['event_type_id'] : null;
    
    if (!$eventTypeId) {
        apiError('Missing event type ID');
    }
    
    // API endpoint for availability (more compatible than slots)
    $endpoint = "$BASE_URL/availability";
    
    // Set up query parameters for availability endpoint
    $params = [
        'eventTypeId' => $eventTypeId,
        'dateFrom' => $date . 'T00:00:00.000Z',
        'dateTo' => $date . 'T23:59:59.999Z'
    ];
    
    // Make the API request
    $response = makeApiRequest($endpoint, 'GET', $params);
    
    // Return the response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Get list of event types
function getEventTypes() {
    global $API_KEY, $BASE_URL;
    
    // API endpoint for event types
    $endpoint = "$BASE_URL/event-types";
    
    // Make the API request
    $response = makeApiRequest($endpoint, 'GET');
    
    // Return the response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Create a new booking
function createBooking() {
    global $API_KEY, $BASE_URL;
    
    // Check if this is a POST request
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        apiError('This endpoint requires a POST request', 405);
    }
    
    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!$data) {
        apiError('Invalid JSON data');
    }
    
    // Required parameters
    $eventTypeId = isset($data['eventTypeId']) ? $data['eventTypeId'] : null;
    $start = isset($data['start']) ? $data['start'] : null;
    
    // Check if attendee object exists (new format)
    if (isset($data['attendee'])) {
        $attendee = $data['attendee'];
        $name = isset($attendee['name']) ? $attendee['name'] : null;
        $email = isset($attendee['email']) ? $attendee['email'] : null;
        $timeZone = isset($attendee['timeZone']) ? $attendee['timeZone'] : 'UTC';
        $phone = isset($attendee['phoneNumber']) ? $attendee['phoneNumber'] : null;
    } else {
        // Fallback to old format
        $name = isset($data['name']) ? $data['name'] : null;
        $email = isset($data['email']) ? $data['email'] : null;
        $timeZone = isset($data['timeZone']) ? $data['timeZone'] : 'UTC';
        $phone = isset($data['phone']) ? $data['phone'] : null;
    }
    
    // Validate required fields
    if (!$eventTypeId || !$start || !$name || !$email) {
        apiError('Missing required booking information');
    }
    
    // API endpoint for creating bookings (v2)
    $endpoint = "$BASE_URL/v2/bookings";
    
    // Ensure start time is in proper ISO format
    if (!preg_match('/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(\.\d{3})?Z$/', $start)) {
        // If not in proper format, try to convert
        $startDateTime = new DateTime($start);
        $start = $startDateTime->format('Y-m-d\TH:i:s\Z');
    }
    
    // Create the payload that Cal.com v2 requires
    $payload = [
        'eventTypeId' => (int)$eventTypeId,
        'start' => $start,
        'attendee' => [
            'name' => $name,
            'email' => $email,
            'timeZone' => $timeZone
        ]
    ];
    
    // Add phone number to attendee object if provided
    if ($phone && !empty($phone)) {
        $payload['attendee']['phoneNumber'] = $phone;
    }
    
    // Log the request for debugging
    error_log("Cal.com API v2 Booking Request:");
    error_log("Endpoint: $endpoint");
    error_log("Payload: " . json_encode($payload, JSON_PRETTY_PRINT));
    
    // Make the API request with v2 headers
    $response = makeApiRequestV2($endpoint, 'POST', $payload);
    
    // Return the response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Cancel an existing booking
function cancelBooking() {
    global $API_KEY, $BASE_URL;
    
    // Check if this is a POST request
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        apiError('This endpoint requires a POST request', 405);
    }
    
    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!$data) {
        apiError('Invalid JSON data');
    }
    
    // Required parameters
    $bookingId = isset($data['bookingId']) ? $data['bookingId'] : null;
    
    if (!$bookingId) {
        apiError('Missing booking ID');
    }
    
    // API endpoint for canceling a booking
    $endpoint = "$BASE_URL/bookings/$bookingId/cancel";
    
    // Optional reason parameter
    $payload = [];
    if (isset($data['reason'])) {
        $payload['reason'] = $data['reason'];
    }
    
    // Make the API request
    $response = makeApiRequest($endpoint, 'POST', $payload);
    
    // Return the response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Get details for a specific booking
function getBooking() {
    global $API_KEY, $BASE_URL;
    
    // Required parameter
    $bookingId = isset($_GET['booking_id']) ? $_GET['booking_id'] : null;
    
    if (!$bookingId) {
        apiError('Missing booking ID');
    }
    
    // API endpoint for getting a booking
    $endpoint = "$BASE_URL/bookings/$bookingId";
    
    // Make the API request
    $response = makeApiRequest($endpoint, 'GET');
    
    // Return the response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Helper function to make API requests (v1)
function makeApiRequest($endpoint, $method = 'GET', $data = []) {
    global $API_KEY;
    
    // Initialize cURL
    $curl = curl_init();
    
    // Add API key to URL for Cal.com
    $separator = strpos($endpoint, '?') !== false ? '&' : '?';
    $url = $endpoint . $separator . 'apiKey=' . $API_KEY;
    
    // Set up cURL options
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json'
        ]
    ];
    
    // Handle different HTTP methods
    if ($method === 'GET' && !empty($data)) {
        $url .= '&' . http_build_query($data);
        $options[CURLOPT_URL] = $url;
    } else if ($method === 'POST') {
        $options[CURLOPT_POST] = true;
        $options[CURLOPT_POSTFIELDS] = json_encode($data);
    } else if ($method !== 'GET') {
        $options[CURLOPT_CUSTOMREQUEST] = $method;
        if (!empty($data)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
        }
    }
    
    // Set cURL options
    curl_setopt_array($curl, $options);
    
    // Execute the request
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
    // Check for errors
    if (curl_errno($curl)) {
        $error = curl_error($curl);
        curl_close($curl);
        apiError("cURL Error: $error", 500);
    }
    
    curl_close($curl);
    
    // Parse JSON response
    $responseData = json_decode($response, true);
    
    // Handle API errors
    if ($httpCode >= 400) {
        $errorMessage = isset($responseData['message']) ? $responseData['message'] : 'Unknown API error';
        apiError("Cal.com API Error: $errorMessage", $httpCode);
    }
    
    return $responseData;
}

// Helper function to make API requests (v2)
function makeApiRequestV2($endpoint, $method = 'GET', $data = []) {
    global $API_KEY;
    
    // Initialize cURL
    $curl = curl_init();
    
    // For v2, use the endpoint directly without query parameters
    $url = $endpoint;
    
    // Set up cURL options with v2 headers and Bearer authentication
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $API_KEY,
            'cal-api-version: 2024-08-13'
        ]
    ];
    
    // Handle different HTTP methods
    if ($method === 'GET' && !empty($data)) {
        $options[CURLOPT_URL] .= '&' . http_build_query($data);
    } else if ($method === 'POST') {
        $options[CURLOPT_POST] = true;
        $options[CURLOPT_POSTFIELDS] = json_encode($data);
    } else if ($method !== 'GET') {
        $options[CURLOPT_CUSTOMREQUEST] = $method;
        if (!empty($data)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
        }
    }
    
    // Set cURL options
    curl_setopt_array($curl, $options);
    
    // Execute the request
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
    // Check for errors
    if (curl_errno($curl)) {
        $error = curl_error($curl);
        curl_close($curl);
        apiError("cURL Error: $error", 500);
    }
    
    curl_close($curl);
    
    // Parse JSON response
    $responseData = json_decode($response, true);
    
    // Handle API errors
    if ($httpCode >= 400) {
        // Log the full response for debugging
        error_log("Cal.com API v2 Error - HTTP Code: $httpCode");
        error_log("Cal.com API v2 Response: " . $response);
        error_log("Cal.com API v2 URL: " . $url);
        
        $errorMessage = 'Unknown API error';
        if (isset($responseData['message'])) {
            $errorMessage = $responseData['message'];
        } elseif (isset($responseData['error'])) {
            $errorMessage = is_array($responseData['error']) ? json_encode($responseData['error']) : $responseData['error'];
        } elseif (isset($responseData['details'])) {
            $errorMessage = is_array($responseData['details']) ? json_encode($responseData['details']) : $responseData['details'];
        } elseif (is_array($responseData)) {
            $errorMessage = "Response array: " . json_encode($responseData);
        } elseif (is_string($responseData)) {
            $errorMessage = $responseData;
        } elseif ($response) {
            $errorMessage = "Raw response: " . substr($response, 0, 500);
        }
        
        apiError("Cal.com API Error: $errorMessage (HTTP $httpCode)", $httpCode);
    }
    
    return $responseData;
}
?> 