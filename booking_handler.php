<?php
// booking_handler.php - Simple booking handler for the mentorship calendar

// Set content type to JSON
header('Content-Type: application/json');

// Enable CORS if needed
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Function to log errors
function logError($message) {
    error_log(date('Y-m-d H:i:s') . " - Booking Error: " . $message . "\n", 3, 'booking_errors.log');
}

// Function to save booking to JSON file
function saveBooking($bookingData) {
    $bookingsFile = 'bookings.json';
    
    // Load existing bookings
    $bookings = [];
    if (file_exists($bookingsFile)) {
        $existingData = file_get_contents($bookingsFile);
        if ($existingData) {
            $bookings = json_decode($existingData, true) ?: [];
        }
    }
    
    // Add new booking
    $bookingData['id'] = uniqid('booking_', true);
    $bookingData['created_at'] = date('Y-m-d H:i:s');
    $bookingData['status'] = 'confirmed';
    
    $bookings[] = $bookingData;
    
    // Save back to file
    $result = file_put_contents($bookingsFile, json_encode($bookings, JSON_PRETTY_PRINT));
    
    if ($result === false) {
        logError("Failed to save booking to file");
        return false;
    }
    
    return $bookingData;
}

// Function to get all bookings
function getBookings() {
    $bookingsFile = 'bookings.json';
    
    if (!file_exists($bookingsFile)) {
        return [];
    }
    
    $data = file_get_contents($bookingsFile);
    return $data ? json_decode($data, true) : [];
}

// Function to check if a time slot is available
function isSlotAvailable($date, $time) {
    $bookings = getBookings();
    
    foreach ($bookings as $booking) {
        if ($booking['date'] === $date && $booking['time'] === $time && $booking['status'] === 'confirmed') {
            return false;
        }
    }
    
    return true;
}

// Handle different actions
$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'create_booking':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            exit;
        }
        
        // Get POST data
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        
        if (!$data) {
            // Try to get from $_POST if JSON parsing failed
            $data = $_POST;
        }
        
        // Validate required fields
        $requiredFields = ['date', 'time', 'timezone'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                http_response_code(400);
                echo json_encode(['error' => "Missing required field: $field"]);
                exit;
            }
        }
        
        // Check if slot is available
        if (!isSlotAvailable($data['date'], $data['time'])) {
            http_response_code(409);
            echo json_encode(['error' => 'Time slot is no longer available']);
            exit;
        }
        
        // Save booking
        $booking = saveBooking($data);
        
        if ($booking) {
            echo json_encode([
                'success' => true,
                'booking' => $booking,
                'message' => 'Booking created successfully'
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to save booking']);
        }
        break;
        
    case 'check_availability':
        $date = $_GET['date'] ?? '';
        $time = $_GET['time'] ?? '';
        
        if (!$date || !$time) {
            http_response_code(400);
            echo json_encode(['error' => 'Date and time are required']);
            exit;
        }
        
        $available = isSlotAvailable($date, $time);
        echo json_encode(['available' => $available]);
        break;
        
    case 'get_bookings':
        // This could be protected with authentication in a real app
        $bookings = getBookings();
        echo json_encode(['bookings' => $bookings]);
        break;
        
    case 'get_booked_slots':
        $date = $_GET['date'] ?? '';
        $bookings = getBookings();
        $bookedSlots = [];
        
        foreach ($bookings as $booking) {
            if ($booking['status'] === 'confirmed') {
                if (!$date || $booking['date'] === $date) {
                    $bookedSlots[] = [
                        'date' => $booking['date'],
                        'time' => $booking['time']
                    ];
                }
            }
        }
        
        echo json_encode(['booked_slots' => $bookedSlots]);
        break;
        
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Invalid action']);
        break;
}
?> 