<?php
// Include database connection
require_once 'helpers/DBConnection.php';

// Set response header to plain text and character encoding to UTF-8
header('Content-Type: text/plain; charset=UTF-8');

// Default message if the number is not registered
$message = "Number not Registered with Us kindly register";

// Get the phone number from the request
$regNumber = isset($_GET['vParentCategoryId']) ? $_GET['vParentCategoryId'] : '';

try {
    // Establish database connection
    $dbcon = new DBConnection();
    $con = $dbcon->getCon();

    // Check if the number is already registered
    $sql = "SELECT firstName, contactNo1 FROM CustomerBillingDetails WHERE contactNo1 = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$regNumber]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Number is registered, proceed with OTP generation
        $Name = $result['firstName'];
        $otp = rand(10000, 99999);
        $textmessage = "Dear $Name, $otp is the OTP For Request. Don't share this with anyone. Thank you Regards Team NumberWale.com - Numberwale";

        // SMS gateway information
        $authkey = "0c90f4bd-a7dc-4b33-972d-9283a6664bee";
        $senderId = "NUMWLE";

        // Encode the message
        $encoded_message = urlencode($textmessage);

        // Prepare the SMS gateway URL
        $mainUrl = "https://teleduce.corefactors.in/sendsms/?";
        $params = http_build_query([
            'key' => $authkey,
            'route' => '0',
            'text' => $encoded_message,
            'to' => $regNumber,
            'from' => $senderId
        ]);

        // Final URL with parameters
        $smsUrl = $mainUrl . $params;

        // Send the SMS
        $response = file_get_contents($smsUrl);

        // If the SMS is sent successfully
        if ($response !== false) {
            $message = "OTP sent successfully";

            // Insert the OTP request into the database
            $sqlInsert = "INSERT INTO otpRequest (id, phone, otp, created_at, status) VALUES (0, ?, ?, NOW(), 'Y')";
            $stmtInsert = $con->prepare($sqlInsert);
            $stmtInsert->execute([$regNumber, $otp]);
        } else {
            $message = "Failed to send OTP";
        }
    } else {
        // If the number is not found, display the registration link
        $message = "Number not Registered with Us kindly register. <b><a href=\"https://www.numberwale.com/newaccount.html\">Click here to register</a></b>";
    }
} catch (Exception $e) {
    // Handle exceptions
    error_log("Error: " . $e->getMessage());
    $message = "An error occurred while processing your request.";
} finally {
    // Close the database connection
    if (isset($con)) {
        $con = null;
    }
}

// Send the message as a response
echo $message;
?>
