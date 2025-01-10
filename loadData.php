<?php
// Import necessary files and classes
require_once 'helpers/DBConnection.php';
require_once 'process/GeneralFunction.php';
require_once 'process/ShoppingCart.php';
require_once 'helpers/CustomProduct.php';

// Retrieve parameters
$vanityCheck = isset($_GET['limit']) ? $_GET['limit'] : null;

// Check if vanityCheck is numeric
if ($vanityCheck !== null && preg_match('/^[0-9]+$/', $vanityCheck)) {
    session_start();
    $_SESSION['currency'] = 'INR';
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    $currency = isset($_SESSION['currency']) ? $_SESSION['currency'] : 'INR';
    
    // Initialize application context (assuming context is managed elsewhere)
   // $context = require 'path/to/context.php'; // Or however the application context is initialized
    
    $products = [];
    $pricefilter = isset($_GET['pricefilter']) ? $_GET['pricefilter'] : '';
    $orderby = '';
    
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 100;
    $limitData = $limit;

    // Establish database connection
    $dbcon = new DBConnection();
    $con = $dbcon->getCon();
    $stmt = $con->createStatement();
    $vendorLimit = 0;
    $searchLimit = "";
    $OFFSET = "";
    $iterationCount = 0;

       $generfunc = new GeneralFunction($con);

    
    $res = $stmt->executeQuery("SELECT * FROM vendorpirority ORDER BY pirority");

    while ($res->next() && $iterationCount < 50) {
        for ($i = 1; $i <= $limitData; $i++) {
            if ($i == 1) {
                $vendorLimit = $res->getInt("limitNumber");
                $searchLimit = strval($vendorLimit);
                $OFFSET = strval(0);
            } elseif ($i == 2) {
                $vendorLimit = $res->getInt("limitNumber");
                $searchLimit = strval($vendorLimit + $i);
                $OFFSET = strval($vendorLimit);
            } else {
                $vendorLimit = $res->getInt("limitNumber");
                $searchLimit = strval($vendorLimit + $i);
                $OFFSET = strval($vendorLimit + ($i - 1));
            }
            
            if (empty($pricefilter)) {
                $products = $generfunc->getloadVendorProductList($res->getString("vendorId"), $searchLimit, $OFFSET);
            } else {
                if (strcasecmp($pricefilter, "low") == 0) {
                    $orderby = "ASC";
                } else {
                    $orderby = "DESC";
                }
                $products = $generfunc->getVendorProductPricelimitfilterList($orderby, $res->getString("vendorId"), $searchLimit, $OFFSET);
            }

            $iterationCount++;

            if ($iterationCount >= 50) {
                break; // Exit the loop if 50 iterations have been reached
            }
        }

        if (count($products) > 0) {
            ?>
            <input type="hidden" name="pricefilterselected" id="pricefilterselected" value="<?php echo htmlspecialchars($pricefilter, ENT_QUOTES, 'ISO-8859-1'); ?>">
            <input type="hidden" name="limit" id="limit" value="<?php echo htmlspecialchars($limitData + 1, ENT_QUOTES, 'ISO-8859-1'); ?>">
            <?php
            $c = 0;
            foreach ($products as $product) {
                if ($c == 11) {
                    break;
                }
                $c++;
                $price = 0.0;
                $discount = 0.0;
              //  $disprice = 0.0;
               // $rs = 0.0;

                //if ($product->getDiscount() > 0) {
                 //   $discount = $product->getDiscount();
                   // $price = $product->getRateInRupee();
                  //  $disprice = $price * $discount / 100;
                  //  $price = $price - $disprice;

    // Output HTML for each product
    $price = $product->getRateInRupee();
    $discount = $product->getDiscount();
    if ($discount > 0) {
        $discountAmount = ($price * $discount) / 100;
        $price = $price - $discountAmount;
    }





                    ?>
                    <div class="col-lg-4 col-md-12">
                        <figcaption class="boxprice boxpriceinner">
                            <div class="price">
                                <div class="text-left pricenum01">
                                    <del><b>&#8377; <?php echo htmlspecialchars($product->getRateInRupee(), ENT_QUOTES, 'ISO-8859-1'); ?></b></del>
                                </div>
                                <div class="text-right pricenum02">
                                    <b>&#8377; <?php echo htmlspecialchars($price, ENT_QUOTES, 'ISO-8859-1'); ?></b>
                                </div>
                            </div>
                            <div class="number"><br>
                                <h2><?php echo htmlspecialchars($product->getProductName(), ENT_QUOTES, 'ISO-8859-1'); ?></h2>
                                <p class="pull-left">Sum total: <?php echo htmlspecialchars($product->getLiters(), ENT_QUOTES, 'ISO-8859-1'); ?> = <b><?php echo htmlspecialchars($product->getTrap(), ENT_QUOTES, 'ISO-8859-1'); ?></b></p>
                                <p class="pull-left viewdet">
                                    <a href="productDetails?id=<?php echo htmlspecialchars($product->getProduct_id(), ENT_QUOTES, 'ISO-8859-1'); ?>" class="pull-left" style="font-size:11px; width:100%">view details</a>
                                </p>
                                <div class="pull-left wi100">
                                    <a href="vanityNumberEnquiry?vanity=<?php echo htmlspecialchars($product->getNumber(), ENT_QUOTES, 'ISO-8859-1'); ?>&type=Vanity Number" class="pull-left">
                                        <div class="booknow">Enquire Now</div>
                                    </a>
                                    <a href="CartActivity?vProductId=<?php echo htmlspecialchars($product->getProduct_id(), ENT_QUOTES, 'ISO-8859-1'); ?>&vProductName=<?php echo htmlspecialchars($product->getNumber(), ENT_QUOTES, 'ISO-8859-1'); ?>&vImgLoc=<?php echo htmlspecialchars($product->getImg_loc(), ENT_QUOTES, 'ISO-8859-1'); ?>&action=<?php echo htmlspecialchars(GeneralConstants::ADD_TO_CART, ENT_QUOTES, 'ISO-8859-1'); ?>">
                                        <div class="booknow">ADD TO CART</div>
                                    </a>
                                </div>
                            </div>
                        </figcaption>
                    </div>
                    <?php
                }
            }
        }
        } 
    } else {
        error_log("Error in Load More Data: " . date('Y-m-d H:i:s') . " >>> " . htmlspecialchars($vanityCheck, ENT_QUOTES, 'ISO-8859-1'));
        $remoteAddr = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

        if (strpos($vanityCheck, 'select') !== false || strpos($vanityCheck, 'union') !== false || strpos($vanityCheck, "'A=") !== false || strpos($vanityCheck, '*') !== false || strpos($vanityCheck, 'AND') !== false || strpos($vanityCheck, "<'") !== false || strpos($vanityCheck, "')") !== false || strpos($vanityCheck, 'CONCAT') !== false || strpos($vanityCheck, 'and') !== false || strpos($vanityCheck, '1=') !== false) {
            try {
                $emailCmd = "sudo iptables -A INPUT -s " . escapeshellarg($remoteAddr) . " -j DROP";
                $process = proc_open($emailCmd, [
                    ['pipe', 'r'],
                    ['pipe', 'w'],
                    ['pipe', 'w']
                ], $pipes);

                if (is_resource($process)) {
                    fclose($pipes[0]);
                    $output = stream_get_contents($pipes[1]);
                    fclose($pipes[1]);
                    proc_close($process);

                    error_log("process output: " . $output);
                }
            } catch (Exception $ex) {
                error_log($ex->getMessage());
            }
        }

        error_log("Hack Attempt: " . $remoteAddr);
        header("Location: index");
        exit();
    }

?>
