<?php
// Import necessary classes
require_once 'helpers/DBConnection.php';
require_once 'helpers/CustomProduct.php';
require_once 'process/ShoppingCart.php';
require_once 'process/GeneralConstants.php';

// Start session
session_start();

try {
    // Get product ID and action from request


       $productIdCheck = isset($_GET['vProductId']) ? intval($_GET['vProductId']) : 0;

   // Retrieve shopping cart and currency
if (!isset($_SESSION['cart'])) {
    $cart = new ShoppingCart();  // Create a new ShoppingCart object
    $_SESSION['cart'] = serialize($cart);  // Serialize and store the cart in session
} else {
    // Retrieve and unserialize the cart object from session
    $cart = unserialize($_SESSION['cart']);
    
    // Ensure it's an instance of ShoppingCart
    if (!$cart instanceof ShoppingCart) {
        $cart = new ShoppingCart();  // Fallback to a new ShoppingCart if not correct
    }
}

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $productId = isset($_GET['vProductId']) ? $_GET['vProductId'] : '';
    $ddiscount = isset($_GET['vDiscount']) ? intval(trim($_GET['vDiscount'])) : 0;



    $price = 0;
    $discount = 0;
    $disprice = 0;
    $flatDiscount = 0;
    $actualPrice = 0;
    $eproductId = 0;
    $checkcart = true;

    // Establish PDO database connection
    $dbcon = new DBConnection();
    $con = $dbcon->getCon();  // Assuming your DBConnection class returns a PDO connection

    // Fetch product details from the database
    $query = "SELECT * FROM ProductOtherDetails WHERE product_id = :product_id";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ddiscount = $row['discount'];
        $flatDiscount = $row['flatdiscountedrate'];
        $price = $row['rateInRupee'];
    }

    // Close the statement
    $stmt = null;

    // Check if the product is already in the cart
    if ($cart != null && count($cart->getAllCartItems()) > 0) {
        foreach ($cart->getAllCartItems() as $item) {
             if ($item instanceof ShoppingCartItem) {

            $eproductId = $item->getProduct()->getProduct_id();
            if ($productId == $eproductId) {
                $checkcart = false;
                break;
            }
                    }
        }
    }




    $actualPrice = $price;

    // Handle the action (add, update, remove)
    if ($action === GeneralConstants::ADD_TO_CART) {
        // Apply discount or flat discount
        if ($ddiscount > 0) {
            $discount = $ddiscount;
            $disprice = $price * $discount / 100;
            $price = $price - $disprice;
        } elseif ($flatDiscount > 0) {
            $price = $price - $flatDiscount;
        }

        // Get product details from request
        $productName = $_GET['vProductName'];
        $rateRuppes = $price;
        $rateDollar = $_GET['vRateDollar'];
        $productColor = isset($_GET['color']) ? $_GET['color'] : 'NA';
        $productSize = isset($_GET['size']) ? $_GET['size'] : 'NA';

        // Create a CustomProduct object and set its properties
        $product = new CustomProduct();
        $product->setProduct_id(intval($productId));
        $product->setProductName($productName);
        $product->setRateInRupee($price);
        $product->setProductColor($productColor);
        $product->setProductSize($productSize);
        $product->setRateInDollar($actualPrice);
        $product->setImg_loc($_GET['vImgLoc']);

        // Add product to cart if it's not already present
        if ($checkcart) {
            if ($cart == null) {
                $cart = new ShoppingCart();
                $_SESSION['cart'] = $cart;
            }
            $cart->addToCart(1, $product);
        }
    } elseif ($action === GeneralConstants::UPDATE_TO_CART) {
        // Update product quantity in the cart
        $product = new CustomProduct();
        $product->setProduct_id(intval($productId));
        $qty = intval($_GET['qty']);

        if ($cart != null) {
            $cart->setQuantity($qty, $product);
        }
    } elseif ($action === GeneralConstants::REMOVE_FROM_CART) {
        // Remove product from the cart
        $product = new CustomProduct();
        $product->setProduct_id(intval($productId));

        if ($cart != null) {
            $cart->removeFromCart($product);
        }
    }

    // Redirect to the cart page
    header('Location: cart.php');
} catch (PDOException $e) {
    // Handle exceptions
    error_log("Database error: " . $e->getMessage());
    // Optional: Redirect to an error page or show an error message
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    // Optional: Redirect to an error page or show an error message
}
?>
