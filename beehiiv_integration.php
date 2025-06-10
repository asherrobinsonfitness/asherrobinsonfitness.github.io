<?php
// Beehiiv Integration Handler
class BeehiivIntegration {
    private $apiKey;
    private $publicationId;
    private $baseUrl = 'https://api.beehiiv.com/v2';
    
    public function __construct($apiKey, $publicationId) {
        $this->apiKey = $apiKey;
        $this->publicationId = $publicationId;
    }
    
    public function addSubscriber($contactData, $questionnaireData = []) {
        $url = $this->baseUrl . '/publications/' . $this->publicationId . '/subscriptions';
        
        // Prepare custom fields from contact and questionnaire data
        $customFields = [
            ['name' => 'First name', 'value' => $contactData['firstName']],
            ['name' => 'Last name', 'value' => $contactData['lastName']],
            ['name' => 'Phone', 'value' => $contactData['phone']]
        ];
        
        // Add questionnaire data if available
        if (!empty($questionnaireData)) {
            if (isset($questionnaireData['currentWeight']) && $questionnaireData['currentWeight'] !== '') {
                $customFields[] = ['name' => 'Current weight', 'value' => (float)$questionnaireData['currentWeight']];
            }
            if (isset($questionnaireData['targetWeight']) && $questionnaireData['targetWeight'] !== '') {
                $customFields[] = ['name' => 'Target weight', 'value' => (float)$questionnaireData['targetWeight']];
            }
            if (isset($questionnaireData['goalRate']) && $questionnaireData['goalRate'] !== '') {
                $customFields[] = ['name' => 'Target goal rate', 'value' => (float)$questionnaireData['goalRate']];
            }
        }
        
        $data = [
            'email' => $contactData['email'],
            'reactivate_existing' => true,
            'send_welcome_email' => false,
            'utm_source' => 'website',
            'utm_medium' => 'lead_form',
            'utm_campaign' => '6_week_weight_loss',
            'custom_fields' => $customFields
        ];
        
        return $this->makeRequest('POST', $url, $data);
    }
    
    public function updateSubscriber($email, $questionnaireData) {
        // First, get the subscriber ID
        $subscriber = $this->getSubscriberByEmail($email);
        if (!$subscriber) {
            return ['success' => false, 'error' => 'Subscriber not found'];
        }
        
        // Update custom fields with questionnaire data
        $customFields = [];
        if (isset($questionnaireData['currentWeight']) && $questionnaireData['currentWeight'] !== '') {
            $customFields[] = ['name' => 'Current weight', 'value' => (float)$questionnaireData['currentWeight']];
        }
        if (isset($questionnaireData['targetWeight']) && $questionnaireData['targetWeight'] !== '') {
            $customFields[] = ['name' => 'Target weight', 'value' => (float)$questionnaireData['targetWeight']];
        }
        if (isset($questionnaireData['goalRate']) && $questionnaireData['goalRate'] !== '') {
            $customFields[] = ['name' => 'Target goal rate', 'value' => (float)$questionnaireData['goalRate']];
        }
        
        $url = $this->baseUrl . '/publications/' . $this->publicationId . '/subscriptions/' . $subscriber['id'];
        $data = ['custom_fields' => $customFields];
        
        return $this->makeRequest('PATCH', $url, $data);
    }
    
    private function getSubscriberByEmail($email) {
        $url = $this->baseUrl . '/publications/' . $this->publicationId . '/subscriptions?email=' . urlencode($email);
        $response = $this->makeRequest('GET', $url);
        
        if ($response['success'] && !empty($response['data']['data'])) {
            return $response['data']['data'][0];
        }
        
        return null;
    }
    
    private function makeRequest($method, $url, $data = null) {
        $ch = curl_init();
        
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->apiKey,
                'Content-Type: application/json'
            ]
        ]);
        
        if ($data && in_array($method, ['POST', 'PATCH', 'PUT'])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            return ['success' => false, 'error' => $error];
        }
        
        $decodedResponse = json_decode($response, true);
        
        return [
            'success' => $httpCode >= 200 && $httpCode < 300,
            'http_code' => $httpCode,
            'data' => $decodedResponse,
            'raw_response' => $response
        ];
    }
}

// Configuration - Your actual Beehiiv credentials
$BEEHIIV_API_KEY = 'VzSBwyykFcic8s0M2P5UGB3X0xdd18dpzCOhEg4K9mDme5O75wtmYh8399HWrGjJ';
$BEEHIIV_PUBLICATION_ID = 'pub_ec5b1530-a37c-40ac-b0fa-ce9d117322ca';

// Handle form submission from index.php (contact form only)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['currentWeight'])) {
    $beehiiv = new BeehiivIntegration($BEEHIIV_API_KEY, $BEEHIIV_PUBLICATION_ID);
    
    // Get contact data from index.php form
    $contactData = [
        'firstName' => $_POST['firstName'] ?? '',
        'lastName' => $_POST['lastName'] ?? '',
        'email' => $_POST['email'] ?? '',
        'phone' => $_POST['phone'] ?? ''
    ];
    
    // Validate required fields
    if (empty($contactData['firstName']) || empty($contactData['lastName']) || 
        empty($contactData['email']) || empty($contactData['phone'])) {
        header('Location: index.php?error=missing_fields');
        exit;
    }
    
    // Add subscriber to Beehiiv (contact info only)
    $result = $beehiiv->addSubscriber($contactData);
    
    if ($result['success']) {
        // Success - redirect directly to offer page, skipping questionnaire
        header('Location: offer.php?success=1&email=' . urlencode($contactData['email']) . 
               '&firstName=' . urlencode($contactData['firstName']) . 
               '&lastName=' . urlencode($contactData['lastName']) . 
               '&phone=' . urlencode($contactData['phone']));
        exit;
    } else {
        // Error handling
        error_log('Beehiiv API Error: ' . json_encode($result));
        header('Location: index.php?error=api_error');
        exit;
    }
}

// Handle questionnaire completion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['currentWeight'])) {
    $beehiiv = new BeehiivIntegration($BEEHIIV_API_KEY, $BEEHIIV_PUBLICATION_ID);
    
    // Get email from POST data (hidden field)
    $email = $_POST['email'] ?? '';
    
    if (empty($email)) {
        header('Location: index.php?error=missing_email');
        exit;
    }
    
    // Get questionnaire data
    $questionnaireData = [
        'currentWeight' => $_POST['currentWeight'] ?? '',
        'targetWeight' => $_POST['targetWeight'] ?? '',
        'goalRate' => $_POST['goalRate'] ?? ''
    ];
    
    // Update subscriber with questionnaire data
    $result = $beehiiv->updateSubscriber($email, $questionnaireData);
    
    if ($result['success']) {
        // Success - redirect to offer page
        header('Location: offer.php?success=1&email=' . urlencode($email) . 
               '&firstName=' . urlencode($_POST['firstName'] ?? '') . 
               '&lastName=' . urlencode($_POST['lastName'] ?? '') . 
               '&phone=' . urlencode($_POST['phone'] ?? ''));
        exit;
    } else {
        // Error handling
        error_log('Beehiiv Update Error: ' . json_encode($result));
        header('Location: offer.php?error=1');
        exit;
    }
}

// Test function (can be called directly)
function testBeehiivConnection() {
    global $BEEHIIV_API_KEY, $BEEHIIV_PUBLICATION_ID;
    
    $beehiiv = new BeehiivIntegration($BEEHIIV_API_KEY, $BEEHIIV_PUBLICATION_ID);
    
    // Test with sample data
    $testContactData = [
        'firstName' => 'Test',
        'lastName' => 'User',
        'email' => 'test@example.com',
        'phone' => '+1 (555) 123-4567'
    ];
    
    $testQuestionnaireData = [
        'currentWeight' => '180',
        'targetWeight' => '160',
        'goalRate' => '1.0'
    ];
    
    echo "<h2>Testing Beehiiv Integration</h2>";
    
    // Test adding subscriber
    echo "<h3>1. Adding Subscriber...</h3>";
    $result = $beehiiv->addSubscriber($testContactData, $testQuestionnaireData);
    echo "<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre>";
    
    if ($result['success']) {
        echo "<p style='color: green;'>✅ Subscriber added successfully!</p>";
        
        // Test updating subscriber
        echo "<h3>2. Updating Subscriber...</h3>";
        $updateResult = $beehiiv->updateSubscriber($testContactData['email'], [
            'currentWeight' => '175',
            'targetWeight' => '155',
            'goalRate' => '1.2'
        ]);
        echo "<pre>" . json_encode($updateResult, JSON_PRETTY_PRINT) . "</pre>";
        
        if ($updateResult['success']) {
            echo "<p style='color: green;'>✅ Subscriber updated successfully!</p>";
        } else {
            echo "<p style='color: red;'>❌ Failed to update subscriber</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ Failed to add subscriber</p>";
    }
}

// If accessed directly with ?test=1, run test
if (isset($_GET['test']) && $_GET['test'] == '1') {
    testBeehiivConnection();
    exit;
}
?> 
