<?php

require_once 'helpers/DBConnection.php';

// Create an instance of your DBConnection class
$dbConnection = new DBConnection();
$pdo = $dbConnection->getCon();

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'] ?? null;
    $vRateRuppes = $_POST['vRateRuppes'] ?? null;

    if ($productId && $vRateRuppes) {
        $stmt = $pdo->prepare("SELECT product_id, productName FROM ProductDetails WHERE product_id = ?");
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $cart = &$_SESSION['cart'];
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    'productName' => $product['productName'],
                    'price' => $vRateRuppes,
                    'quantity' => 1,
                ];
            }

            echo json_encode(['items' => array_values($cart)]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid product data']);
    }
}

$pdo = null;
?>
