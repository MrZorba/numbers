<?php
// Include database connection
require_once 'helpers/DBConnection.php';

// Generate a random OTP
$otp = rand(10000, 99999);

// Get Name and type from the request
$Name = isset($_GET['vParentCategoryName']) ? $_GET['vParentCategoryName'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : null;

// Prepare the message
if ($type === null) {
    $textmessage = "Dear $Name, $otp is the OTP For Request. Don't share this with anyone. Thank you Regards Team NumberWale.com - Numberwale";
} else {
    $textmessage = "Dear $Name, $otp is the OTP For Request. Don't share this with anyone. Thank you Regards Team NumberWale.com - Numberwale";
}

// Get the phone number from the request
$phone = isset($_GET['vParentCategoryId']) ? $_GET['vParentCategoryId'] : '';

// SMS gateway information
$authkey = "0c90f4bd-a7dc-4b33-972d-9283a6664bee";
$senderId = "NUMWLE";
$method = "T";  // SMS sending method

// Encode the message
$encoded_message = urlencode($textmessage);

// Prepare the SMS gateway URL
$mainUrl = "https://teleduce.corefactors.in/sendsms/?";
$params = http_build_query([
    'key' => $authkey,
    'route' => '0',
    'text' => $encoded_message,
    'to' => $phone,
    'from' => $senderId
]);

// Final URL with parameters
$smsUrl = $mainUrl . $params;

try {
    // Send the OTP SMS
    $response = file_get_contents($smsUrl);

    // Check if the SMS was successfully sent
    if ($response !== false) {
        echo "OTP sent successfully";

        // Establish a PDO connection
        $dbcon = new DBConnection();
        $con = $dbcon->getCon();

        // Insert the OTP request into the database
        $sql = "INSERT INTO otpRequest (id, phone, otp, created_at, status) VALUES (0, ?, ?, NOW(), 'Y')";
        $stmt = $con->prepare($sql);
        $stmt->execute([$phone, $otp]);
    } else {
        echo "Failed to send OTP";
    }
} catch (Exception $e) {
    // Handle exceptions
    error_log("Error: " . $e->getMessage());
    echo "An error occurred while processing your request.";
} finally {
    // Close the database connection
    if (isset($con)) {
        $con = null;
    }
}
?>
