<?php 


// Import necessary files and classes
require_once 'process/GeneralFunction.php';
require_once 'helpers/CustomProduct.php';
require_once 'helpers/Category.php';
require_once 'helpers/DBConnection.php'; 
require_once 'process/GeneralConstants.php';

  $_SESSION['currency'] = 'INR';
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    $currency = isset($_SESSION['currency']) ? $_SESSION['currency'] : 'INR';


// Create an instance of your DBConnection class
$dbConnection = new DBConnection();

// Get the PDO object from the DBConnection instance
$pdo = $dbConnection->getCon();



// Get parameters
$cate_id = isset($_GET['cateId']) ? $_GET['cateId'] : 0; // Default to 0 if not provided
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10; // Default limit to 10


$generalFunction = new GeneralFunction($pdo);


// Get price filter from the request
$priceFilter = isset($_POST['pricefilter']) ? $_POST['pricefilter'] : '';
$orderBy = '';


$parentCategory = $generalFunction->getParentCategoryList();
$subCategorys = $generalFunction->getSubCategoryList();
$products = [];


// Fetch products based on price filter
if (empty($priceFilter)) {
    $products = $generalFunction->getProductList();
} else {
    $orderBy = strtolower($priceFilter) == 'low' ? 'asc' : 'desc';
    $products = $generalFunction->getProductPricefilterList($orderBy);
}


// Generate HTML structure
$c1 = 0; // Track item position across pages
$html = '';

$rowCounter = 0;
foreach ($products as $product) {
   if ($c1 == 49) 
    {
      break;
    }

$c1++;
    // Output HTML for each product
    $price = $product->getRateInRupee();
    $discount = $product->getDiscount();
    if ($discount > 0) {
        $discountAmount = ($price * $discount) / 100;
        $price = $price - $discountAmount;
    }

     if (($c1 - 1) % 3 == 0) {
                echo '<div class="row2">'; // Open new row div
            }


    $rateInRupee = $product->getRateInRupee();
    $getLiters = $product->getLiters();
    $getTrap = $product->getTrap();
  $productId = $product->getProductId();
   $imgLoc = $product->getImgLoc();
 $number = $product->getNumber();
 $rateInDollar = $product->getRateInDollar();
  $discount = $product->getDiscount();

  $productname = $product->getProductName();


    $html .= '
    <form method="post" id="form' . $c1 . '" action="CartActivity.php">
        <div class="col-md-4 col-sm-12 text-center">
            <div class="post">
                <figcaption class="boxprice">

              <div class="price">';
                      if ($discount > 0) { 
                      	$html .= '
                                            <div class="text-left pricenum01">
                                                <del><b>&#8377; '.$rateInRupee.'</b></del>
                                            </div>
                                            <div class="text-right pricenum02">
                                                <b>&#8377; '.$price.'</b>
                                            </div>
                                            <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart"></use></svg>
                </button>
                                        ';  } else { 

                                        	$html .= '
                                            <div class="text-right pricenum02">
                                                <b>&#8377; '.$rateInRupee.'</b>
                                            </div>
                                            <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart"></use></svg>
                </button>
                                        '; 
                                         }
                                         $html .= '
                                    </div>


            <div class="number"><br>
                <h2>'.$productname.'</h2>
                <p class="pull-left">Sum total: '.$getLiters.' = <b>'.$getTrap.'</b></p>
    
                <div class="pull-left wi100"><hr>
                    <a href="productDetails.php?id='.$productId.'&type=Vanity Number" class="pull-left" style="font-size:11px; color: #ef6c00 !important;">
                      <strong>View Details</strong>
                    </a>
                    <a href="CartActivity.php?vProductId='.$productId.'&vProductName='.$number.'&vImgLoc=<?= '.$imgLoc.'&action=ADD_TO_CART">
                        <div class="booknow"><strong>ADD TO CART</strong></div>
                    </a>
                </div>
            </div>
        </figcaption>
            </div>
        </div>
                        <input type="hidden" name="vProductId" id="vProductId" value="'.$productId.'">
                        <input type="hidden" name="vProductName" id="vProductName" value="'.$number.'">
                        <input type="hidden" name="vRateRuppes" id="vRateRuppes" value="'.$rateInRupee.'">
                        <input type="hidden" name="vRateDollar" id="vRateDollar" value="'.$rateInDollar.'">
                        <input type="hidden" name="vImgLoc" id="vImgLoc" value="'.$imgLoc.'">
                        <input type="hidden" name="vDiscount" id="vDiscount" value="'.$discount.'">
                        <input type="hidden" name="action" id="action" value="'.GeneralConstants::ADD_TO_CART.'">
    </form>
    ';

    if ($c1 % 3 == 0) {
        $html .= '</div>'; // Close row div
    }
}

if ($c1 % 3 != 0) {
    $html .= '</div>'; // Close last row if not complete
}

// Return the HTML content
echo $html;
?>