<?php
session_start();

// Read the JSON body from the request
$input = file_get_contents('php://input');
$cartData = json_decode($input, true);

// Validate the data
if (is_array($cartData)) {
    $_SESSION['cart'] = $cartData; // Save cart data in the PHP session
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid cart data']);
}
?>
