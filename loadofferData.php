<?php
// Import necessary files and classes
require_once 'process/GeneralFunction.php';
require_once 'helpers/CustomProduct.php';
require_once 'helpers/Category.php';
require_once 'helpers/DBConnection.php'; 

// Start session
session_start();

  $_SESSION['currency'] = 'INR';
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    $currency = isset($_SESSION['currency']) ? $_SESSION['currency'] : 'INR';


// Create an instance of your DBConnection class
$dbConnection = new DBConnection();

// Get the PDO object from the DBConnection instance
$pdo = $dbConnection->getCon();



$generfunc = new GeneralFunction($pdo);

$products = [];




// Retrieve parameters
$pricefilter = isset($_GET['pricefilter']) ? $_GET['pricefilter'] : '';
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 12;
$orderby = '';

if (empty($pricefilter) || $pricefilter === 'null') {
    $products = $generfunc->getProductList($limit);
} else {
    if (strcasecmp($pricefilter, 'low') === 0) {
        $orderby = 'ASC';
    } else {
        $orderby = 'DESC';
    }
    $products = $generfunc->getProductPricefilterList($orderby, $limit);
}



// Check if existing products are available
if (isset($_SESSION['fetchedProducts']) && is_array($_SESSION['fetchedProducts'])) {
  $products = array_merge($_SESSION['fetchedProducts'], $products);
}

// Store fetched products in session
$_SESSION['fetchedProducts'] = $products;

$limitData = $limit + 12;







?>
<input type="hidden" name="pricefilterselected" id="pricefilterselected" value="<?= $pricefilter; ?>">
<input type="hidden" name="limit" id="limit" value="<?= $limitData; ?>">
   
<?php
$c1 = 0;

$rowCounter = 0;
foreach ($products as $product) {
   if ($c1 == 10) 
    {
        break;
    }


$c1++;
    $price = 0.0;
    $discount = 0.0;
    $disprice = 0.0;

    if ($product->getDiscount() > 0) {
        $discount = $product->getDiscount();
        $price = $product->getRateInRupee();
        $disprice = $price * $discount / 100;
        $price -= $disprice;


     if (($c1 - 1) % 3 == 0) {
                echo '<div class="row2">'; // Open new row div
            }



        ?>
       <form method="post" id="form<?= $c1 ?>" action="CartActivity.php">
                        

   <div class="col-md-4 col-sm-12 text-center">
                                <div class="post">

        <figcaption class="boxprice">

              <div class="price">
                                        <?php if ($discount > 0) { ?>
                                            <div class="text-left pricenum01">
                                                <del><b>&#8377; <?= $product->getRateInRupee() ?></b></del>
                                            </div>
                                            <div class="text-right pricenum02">
                                                <b>&#8377; <?= $price ?></b>
                                            </div>
                                            <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart"></use></svg>
                </button>
                                        <?php } else { ?>
                                            <div class="text-right pricenum02">
                                                <b>&#8377; <?= $product->getRateInRupee() ?></b>
                                            </div>
                                            <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart"></use></svg>
                </button>
                                        <?php } ?>
                                    </div>


            <div class="number"><br>
                <h2><?= $product->getProductName(); ?></h2>
                <p class="pull-left">Sum total: <?= $product->getLiters(); ?> = <b><?= $product->getTrap(); ?></b></p>
                <p class="pull-left viewdet">
                    <a href="productDetails.php?id=<?= $product->getProductId(); ?>" class="pull-left" style="font-size:11px; width:100%">View details</a>
                </p>
                <div class="pull-left wi100">
                    <a href="vanityNumberEnquiry.php?vanity=<?= $product->getNumber(); ?>&type=Vanity Number" class="pull-left">
                        <div class="booknow"><strong>Buy Now</strong></div>
                    </a>
                    <a href="CartActivity.php?vProductId=<?= $product->getProductId(); ?>&vProductName=<?= $product->getNumber(); ?>&vImgLoc=<?= $product->getImgLoc(); ?>&action=ADD_TO_CART">
                        <div class="booknow"><strong>ADD TO CART</strong></div>
                    </a>
                </div>
            </div>
        </figcaption>
        </div>
    </div>

               <!-- Hidden inputs to pass product data -->
                        <input type="hidden" name="vProductId" id="vProductId" value="<?= $product->getProductId() ?>">
                        <input type="hidden" name="vProductName" id="vProductName" value="<?= $product->getNumber() ?>">
                        <input type="hidden" name="vRateRuppes" id="vRateRuppes" value="<?= $product->getRateInRupee() ?>">
                        <input type="hidden" name="vRateDollar" id="vRateDollar" value="<?= $product->getRateInDollar() ?>">
                        <input type="hidden" name="vImgLoc" id="vImgLoc" value="<?= $product->getImgLoc() ?>">
                        <input type="hidden" name="vDiscount" id="vDiscount" value="<?= $product->getDiscount() ?>">
                        <input type="hidden" name="action" id="action" value="<?= GeneralConstants::ADD_TO_CART ?>">

             </form>
        <?php
    }
}
?>

            <div class="loadmorebu margin-top-40 overflowhidden" id="loadMoreButton">
             <a onclick="VlidateRequestloadMoreAjax();" > <div class="booknow booknow-width">Load More Numbers</div></a>
                        </div>