<?php

require_once 'process/QueryConstants.php';
require_once 'helpers/Category.php';
require_once 'helpers/CustomProduct.php';

class GeneralFunction {

    private $pdo;

    public function __construct($pdo) {
       $this->pdo = $pdo;
    }

    public function getParentCategoryList() {
        $stmt = $this->pdo->prepare(QueryConstants::PARENT_CATEGORY_ALL_DATE_QUERY);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
    }

    public function getParentCategoryListByParentId($parentId) {
        $stmt = $this->pdo->prepare("SELECT cate_id, cate_name, cate_img_loc FROM categories WHERE cate_id = :parentId AND status = 'Y'");
        $stmt->bindParam(':parentId', $parentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
    }

    public function getParentCategoryId($id) {
        $stmt = $this->pdo->prepare(QueryConstants::CATEGORY_PARAENT_ID_QUERY);
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }

    public function getEmployeeDetailsList($loginId, $password) {
        $stmt = $this->pdo->prepare("SELECT loginId, firstname, lastname, profile FROM employee WHERE loginId = :loginId AND password = :password AND status = 'Y'");
        $stmt->bindParam(':loginId', $loginId, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'EmployeeDetails');
    }

    public function getVendorDetailsList($loginId, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM vendorDetails WHERE contactno1 = :loginId AND password = :password AND status = 'Y'");
        $stmt->bindParam(':loginId', $loginId, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'VendorDetails');
    }

    public function getSubCategoryList() {
        $stmt = $this->pdo->prepare(QueryConstants::SUB_CATEGORY_ALL_DATE_QUERY);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
    }

    public function getSubCategoriesList($parentId) {
        $stmt = $this->pdo->prepare("SELECT cate_id, cate_name, cate_img_loc FROM categories WHERE status = 'Y' AND cate_parent_id = :parentId ORDER BY cate_name ASC");
        $stmt->bindParam(':parentId', $parentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
    }

    public function getSubCategoriesFromChildList($childId) {
        $stmt = $this->pdo->prepare("SELECT cate_parent_id, cate_id, cate_name FROM categories WHERE cate_parent_id = (SELECT cate_parent_id FROM categories WHERE cate_id = :childId AND status = 'Y')");
        $stmt->bindParam(':childId', $childId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
    }

    public function getBlogList() {
        $stmt = $this->pdo->prepare("SELECT * FROM Blog");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Blog');
    }

    public function getProductList() {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' ORDER BY RAND()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getOfferProductList() {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' AND pod.discount > 0 ORDER BY RAND() LIMIT 500");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getLoadProductList($limit) {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' ORDER BY RAND() LIMIT :limit");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getLoadOfferProductList($limit) {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' AND pod.discount > 0 ORDER BY RAND() LIMIT :limit");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductPriceFilterList($price) {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' ORDER BY pod.rateInRupee :price");
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getOfferProductPriceFilterList($price) {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' AND pod.discount > 0 ORDER BY pod.rateInRupee :price LIMIT 500");
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductPriceLimitFilterList($price, $limit) {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' ORDER BY pod.rateInRupee :price LIMIT :limit");
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getOfferProductPriceLimitFilterList($price, $limit) {
        $stmt = $this->pdo->prepare("SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' AND pod.discount > 0 ORDER BY pod.rateInRupee :price LIMIT :limit");
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }




    public function getProductListSearch($product) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => '%' . $product . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListStartWithSearch($product) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListNotStartWithSearch($product) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number NOT LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListNotContainWithSearch($product) {
        // Remove HTML tags from the product string
        $cleanProduct = strip_tags($product);

        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number NOT LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $cleanProduct . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListsNotStartWithSearch($product) {
        // Clean product input
        $cleanProduct = preg_replace('/<[^>]*>/', '', $product);
        $cleanProduct = str_replace('&nbsp;', '', $cleanProduct);

        // Regular expression to find alphanumeric product code
        $pattern = '/[A-Za-z0-9]+/';
        preg_match($pattern, $cleanProduct, $matches);
        $productCode = isset($matches[0]) ? $matches[0] : null;

        if ($productCode !== null) {
            // Build a parameterized query
            $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                      FROM ProductDetails pd
                      JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                      WHERE pd.number NOT REGEXP :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                      ORDER BY pd.product_id DESC";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':product' => $productCode]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
        }
        return [];
    }

    public function getProductListSearchSumTotalPrice($product, $price, $search) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :search AND pd.trap = :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pod.rateInRupee " . $price;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':search' => '%' . $search . '%', ':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListSearchSumTotalTwoPrice($product, $price, $search) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :search AND pd.liters = :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pod.rateInRupee " . $price;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':search' => '%' . $search . '%', ':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListSearchSumTotal($product, $search) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :product AND pd.trap = :search AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => '%' . $product . '%', ':search' => $search]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListStartWithSearchSumTotal($product, $search) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :product AND pd.trap = :search AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product . '%', ':search' => $search]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListEndWithSearchSumTotal($product, $search) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :product AND pd.trap = :search AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => '%' . $product, ':search' => $search]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListStartWithSearchSumTotalTwo($product, $search) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :product AND pd.liters = :search AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product . '%', ':search' => $search]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListEndWithSearchSumTotalTwo($product, $search) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength
                  FROM ProductDetails pd
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id
                  WHERE pd.number LIKE :product AND pd.liters = :search AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'
                  ORDER BY pd.product_id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => '%' . $product, ':search' => $search]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }





    public function getProductListEndWithSearch($product, $search = null) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, 
                         pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y'";

        if ($search !== null) {
            $query .= " AND pd.trap = :search ";
        }

        $query .= "ORDER BY pd.product_id DESC";
        
        $stmt = $this->pdo->prepare($query);
        $params = [':product' => '%' . $product . '%'];

        if ($search !== null) {
            $params[':search'] = $search;
        }

        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }


public function getProductListAdvancedSearch($product, $price, $mustContain = '', $notContain = '', $total = '', $sum = '') {
    // Start the base query
    $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, 
                     pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength 
              FROM ProductDetails pd 
              JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
              WHERE pd.number LIKE :product 
              AND pd.number_status = 'Available' 
              AND pd.vegProduct <> 'Non RTP' 
              AND pd.status = 'Y' ";

    // Add mustContain condition if provided
    if (!empty($mustContain)) {
        $mustContainArray = explode(',', $mustContain); // Split by comma if multiple values
        foreach ($mustContainArray as $digit) {
            $query .= " AND pd.number LIKE :mustContain" . trim($digit);  // Dynamically add each condition
        }
    }

    // Add notContain condition if provided
    if (!empty($notContain)) {
        $notContainArray = explode(',', $notContain); // Split by comma if multiple values
        foreach ($notContainArray as $digit) {
            $query .= " AND pd.number NOT LIKE :notContain" . trim($digit);  // Dynamically add each condition
        }
    }

    // Add total condition if provided
    if (!empty($total)) {
        $query .= " AND LENGTH(pd.number) = :total"; // Filter based on the total length of the number
    }

    // Add sum condition if provided
    if (!empty($sum)) {
        $query .= " AND (SELECT SUM(CAST(SUBSTRING(pd.number, 1, 1) AS UNSIGNED)) 
                        + SUM(CAST(SUBSTRING(pd.number, 2, 1) AS UNSIGNED)) 
                        + SUM(CAST(SUBSTRING(pd.number, 3, 1) AS UNSIGNED)) 
                        + SUM(CAST(SUBSTRING(pd.number, 4, 1) AS UNSIGNED))
                        ) = :sum";
    }

    // Add the order by clause for price
    $query .= " ORDER BY pod.rateInRupee " . $price;

    // Prepare and execute the query
    $stmt = $this->pdo->prepare($query);

    // Bind parameters dynamically based on the conditions provided
    $params = [':product' => $product . '%'];

    // Bind mustContain values if provided
    if (!empty($mustContain)) {
        $mustContainArray = explode(',', $mustContain);
        foreach ($mustContainArray as $index => $digit) {
            $params[":mustContain" . trim($digit)] = "%" . $digit . "%";
        }
    }

    // Bind notContain values if provided
    if (!empty($notContain)) {
        $notContainArray = explode(',', $notContain);
        foreach ($notContainArray as $index => $digit) {
            $params[":notContain" . trim($digit)] = "%" . $digit . "%";
        }
    }

    // Bind total if provided
    if (!empty($total)) {
        $params[':total'] = (int) $total;
    }

    // Bind sum if provided
    if (!empty($sum)) {
        $params[':sum'] = (int) $sum;
    }

    // Execute the query with bound parameters
    $stmt->execute($params);
    
    // Return the fetched results as CustomProduct objects
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
}












    public function getProductListStartWithSearchPrice($product, $price) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, 
                         pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListNotWithSearchPrice($product, $price) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, 
                         pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number NOT LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListEndWithSearchPrice($product, $price) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, 
                         pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap, pd.sizelength 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => '%' . $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListSearchPriceFilter($priceLow, $priceHigh, $price = null) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, 
                         pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pod.rateInRupee BETWEEN :priceLow AND :priceHigh 
                  AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y'";

        if ($price !== null) {
            $query .= " ORDER BY pod.rateInRupee " . $price;
        } else {
            $query .= " ORDER BY pd.product_id DESC";
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':priceLow' => $priceLow, ':priceHigh' => $priceHigh]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListSearchPrice($product, $price) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, 
                         pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => '%' . $product . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListsSearchPrice($product, $price) {
        $cleanedProduct = strip_tags($product);
        $cleanedProduct = str_replace('&nbsp;', '', $cleanedProduct);

        // Construct regex pattern
        $pattern = '/[248\s]/';
        $regex = "%{$pattern}%";

        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, 
                         pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number LIKE :product AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $regex]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getCategoryName($cateId) {
        $query = "SELECT c.cate_name FROM categories c WHERE c.cate_id IN (" . $cateId . ")";
        return $this->pdo->query($query)->fetchColumn();
    }

    public function getProductCategoryListSearchSumTotal($product, $cateId) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, 
                         pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") AND pd.trap = :product 
                  AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' 
                  ORDER BY pd.product_id DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductCategoryListSearchSumTotalTwo($product, $cateId) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, 
                         pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") AND pd.liters = :product 
                  AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' 
                  ORDER BY pd.product_id DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductCategoryListSearchSumTotalPrice($product, $price, $cateId) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, 
                         pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") AND pd.trap = :product 
                  AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductCategoryListSearchSumTotalTwoPrice($product, $price, $cateId) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, pod.rateInDollar, 
                         pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") AND pd.trap = :product 
                  AND pd.number_status = 'Available' AND pd.vegProduct <> 'Non RTP' AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }





    public function getProductListSearchSumTotalsss($product) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.trap = :product 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pd.product_id DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListSearchSumTotalTwo($product) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.liters = :product 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pd.product_id DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListSearchSumTotalPrice2($product, $price) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.trap = :product 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductListSearchSumTotalTwoPrice2($product, $price) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productCode, pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.liters = :product 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => $product]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductBrandSearch($product) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pid.img_loc, pod.discount, pd.productCode 
                  FROM ProductDetails pd 
                  JOIN ProductImageDetails pid ON pd.product_id = pid.product_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pid.img_seq_no = '1' 
                  AND pd.productBrand LIKE :product 
                  ORDER BY pd.product_id DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product' => '%' . $product . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductImageList($prodId) {
        $query = "SELECT img_loc 
                  FROM ProductImageDetails 
                  WHERE product_id = :prodId 
                  ORDER BY img_seq_no";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':prodId' => $prodId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Assuming images are not mapped to CustomProduct
    }

    public function getProductCategoryList($cateId) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productBrand, pd.productCode, 
                         pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pd.product_id DESC";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductCategoryListLoadMore($cateId, $limit) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productBrand, pd.productCode, 
                         pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pd.product_id DESC 
                  LIMIT " . $limit;

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductfilterCategoryList($cateId, $price) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productBrand, pd.productCode, 
                         pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price;

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductfilterCategoryListLoadMore($cateId, $price, $limit) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pod.discount, pd.productBrand, pd.productCode, 
                         pd.liters, pd.trap 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.cate_id IN (" . $cateId . ") 
                  AND pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  ORDER BY pod.rateInRupee " . $price . " 
                  LIMIT " . $limit;

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductfiltersCategoryList($cateId, $price, $brand) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pid.img_loc, pod.discount, pd.productBrand 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductImageDetails pid ON pd.product_id = pid.product_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pid.img_seq_no = '1' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.productBrand = :brand 
                  AND pd.cate_id IN (" . $cateId . ") 
                  ORDER BY pod.rateInRupee " . $price;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':brand' => $brand]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getProductCategoryList2() {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pod.rateInRupee, 
                         pod.rateInDollar, pid.img_loc, pod.discount, pd.productCode 
                  FROM ProductDetails pd 
                  JOIN categories c ON c.cate_id = pd.cate_id 
                  JOIN ProductImageDetails pid ON pd.product_id = pid.product_id 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pid.img_seq_no = '1' 
                  AND discount > 0";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getloadVendorProductList($vendorId, $limit, $offset) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, 
                         pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, 
                         pd.liters, pd.trap, pd.vegProduct, pod.flatdiscountedrate 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  AND pd.vendor_id = :vendorId 
                  ORDER BY RAND() 
                  LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':vendorId', $vendorId);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getVendorProductPricelimitfilterList($price, $vendorId, $limit, $offset) {
        $query = "SELECT pd.product_id, pd.productName, pd.number, pd.type, pd.natureOfProduct, 
                         pod.rateInRupee, pod.rateInDollar, pod.discount, pd.productCode, 
                         pd.liters, pd.trap, pd.vegProduct, pod.flatdiscountedrate 
                  FROM ProductDetails pd 
                  JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id 
                  WHERE pd.number_status = 'Available' 
                  AND pd.vegProduct <> 'Non RTP' 
                  AND pd.status = 'Y' 
                  AND pd.vendor_id = :vendorId 
                  ORDER BY pod.rateInRupee " . $price . " 
                  LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':vendorId', $vendorId);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CustomProduct');
    }

    public function getCustomerDetails($loginId, $password) {
        try {
            $query = QueryConstants::CUSTOMER_LOGIN_QUERY;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$loginId, $password]);
            $customerLoginDetail = $stmt->fetchObject('CustomerLoginDetail');

            if ($customerLoginDetail) {
                $billingQuery = QueryConstants::CUSTOMER_BILLING_ADDRESS_SINGLE_DATE_QUERY;
                $shippingQuery = QueryConstants::CUSTOMER_SHIPPING_ADDRESS_SINGLE_DATE_QUERY;

                $billingStmt = $this->pdo->prepare($billingQuery);
                $billingStmt->execute([$customerLoginDetail->getCustId()]);
                $billingAddressDetails = $billingStmt->fetchObject('CustomerAddressDetails');

                $shippingStmt = $this->pdo->prepare($shippingQuery);
                $shippingStmt->execute([$customerLoginDetail->getCustId()]);
                $shippingAddressDetails = $shippingStmt->fetchObject('CustomerAddressDetails');

                return [
                    'custLoginDetails' => $customerLoginDetail,
                    'custBillingDetails' => $billingAddressDetails,
                    'custShippingDetails' => $shippingAddressDetails
                ];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }

    public function getCustomerDetailsMobile($loginId, $password) {
        try {
            $query = QueryConstants::CUSTOMER_LOGIN_QUERY_MObile;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$loginId, $password]);
            $customerLoginDetail = $stmt->fetchObject('CustomerLoginDetail');

            if ($customerLoginDetail) {
                $billingQuery = QueryConstants::CUSTOMER_BILLING_ADDRESS_SINGLE_DATE_QUERY;
                $shippingQuery = QueryConstants::CUSTOMER_SHIPPING_ADDRESS_SINGLE_DATE_QUERY;

                $billingStmt = $this->pdo->prepare($billingQuery);
                $billingStmt->execute([$customerLoginDetail->getCustId()]);
                $billingAddressDetails = $billingStmt->fetchObject('CustomerAddressDetails');

                $shippingStmt = $this->pdo->prepare($shippingQuery);
                $shippingStmt->execute([$customerLoginDetail->getCustId()]);
                $shippingAddressDetails = $shippingStmt->fetchObject('CustomerAddressDetails');

                return [
                    'custLoginDetails' => $customerLoginDetail,
                    'custBillingDetails' => $billingAddressDetails,
                    'custShippingDetails' => $shippingAddressDetails
                ];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }

    public function getCustomerDetailsMobileOTP($loginId) {
        try {
            $query = QueryConstants::CUSTOMER_LOGIN_QUERY_MObile_OTP;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$loginId]);
            $customerLoginDetail = $stmt->fetchObject('CustomerLoginDetail');

            if ($customerLoginDetail) {
                $billingQuery = QueryConstants::CUSTOMER_BILLING_ADDRESS_SINGLE_DATE_QUERY;
                $shippingQuery = QueryConstants::CUSTOMER_SHIPPING_ADDRESS_SINGLE_DATE_QUERY;

                $billingStmt = $this->pdo->prepare($billingQuery);
                $billingStmt->execute([$customerLoginDetail->getCustId()]);
                $billingAddressDetails = $billingStmt->fetchObject('CustomerAddressDetails');

                $shippingStmt = $this->pdo->prepare($shippingQuery);
                $shippingStmt->execute([$customerLoginDetail->getCustId()]);
                $shippingAddressDetails = $shippingStmt->fetchObject('CustomerAddressDetails');

                return [
                    'custLoginDetails' => $customerLoginDetail,
                    'custBillingDetails' => $billingAddressDetails,
                    'custShippingDetails' => $shippingAddressDetails
                ];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }





    public function getCountryList() {
        $query = "SELECT LookupCode, LookupMeaning 
                  FROM Master_Lookup_Value 
                  WHERE LookupName = 'country_list'";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'MasterLookUp');
    }

    public function getStateList() {
        $query = "SELECT LookupCode, LookupMeaning 
                  FROM Master_Lookup_Value 
                  WHERE LookupName = 'state_list'";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'MasterLookUp');
    }

    public function getStateListFromCountry($value) {
        $query = "SELECT LookupCode, LookupMeaning 
                  FROM Master_Lookup_Value 
                  WHERE LookupName = 'state_list' 
                  AND value1 = :value";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':value' => $value]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'MasterLookUp');
    }

    public function getPincodeListFromCountry($value) {
        $query = "SELECT LookupCode, LookupMeaning 
                  FROM Master_Lookup_Value 
                  WHERE value2 LIKE :value";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':value' => '%' . $value . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'MasterLookUp');
    }

    public function getMasterLookUp() {
        $query = "SELECT LookupCode, LookupMeaning 
                  FROM Master_Lookup_Value";
        $stmt = $this->pdo->query($query);

        $map = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $map[$row['LookupCode']] = $row['LookupMeaning'];
        }
        return $map;
    }

    public function updateDiscount($lookupCode) {
        $query = "UPDATE ProductOtherDetails 
                  SET discount = :lookupCode";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':lookupCode' => $lookupCode]);
    }

    public function deleteState($lookupCode) {
        $query = "DELETE FROM Master_Lookup_Value 
                  WHERE LookupCode = :lookupCode 
                  OR value1 = :lookupCode";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':lookupCode' => $lookupCode]);
    }

    public function deleteDistrict($lookupCode) {
        $query = "DELETE FROM Master_Lookup_Value 
                  WHERE LookupCode = :lookupCode 
                  OR value2 = :lookupCode";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':lookupCode' => $lookupCode]);
    }

    public function deleteTaluka($lookupCode) {
        $query = "DELETE FROM Master_Lookup_Value 
                  WHERE LookupCode = :lookupCode";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':lookupCode' => $lookupCode]);
    }

    public function getAllSubCategoriesFromProduct($cateId) {
        $con = $this->pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS); // Replace with actual connection handling
        $ids = $this->getAllSubCategoriesFromProductRecursive($con, $cateId);

        $idsArray = array_filter(explode(',', $ids));
        $ids = implode(',', $idsArray);

        return $ids;
    }

    private function getAllSubCategoriesFromProductRecursive($con, $cateId) {
        $query = "SELECT cate_id 
                  FROM categories 
                  WHERE cate_parent_id = :cateId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':cateId' => $cateId]);

        $value = '';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $subCateId = $row['cate_id'];
            $value = $subCateId . ',' . $this->getAllSubCategoriesFromProductRecursive($con, $subCateId) . ',' . $value;
        }
        return $value;
    }

    public function getAllSubCategoriesFromProductMap() {
        $con = $this->pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS); // Replace with actual connection handling
        $map = [];

        $query = "SELECT cate_id, cate_name, cate_img_loc 
                  FROM categories 
                  WHERE cate_parent_id = 0 
                  AND status = 'Y'";
        $stmt = $this->pdo->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cateId = $row['cate_id'];
            $ids = $this->getAllSubCategoriesFromProductRecursiveMap($con, $cateId, $map);
        }

        return $map;
    }

    private function getAllSubCategoriesFromProductRecursiveMap($con, $cateId, &$map) {
        $query = "SELECT cate_id 
                  FROM categories 
                  WHERE cate_parent_id = :cateId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':cateId' => $cateId]);

        $value = '';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $subCateId = $row['cate_id'];

            $tmp = $this->getAllSubCategoriesFromProductRecursiveMap($con, $subCateId, $map);
            if (!empty($value)) {
                $value = $subCateId . ',' . $tmp . ',' . $value;
            } else {
                $value = $subCateId . ',' . $tmp;
            }

            $map[$cateId] = $value;
        }
        return $value;
    }

    public function sumNumber($str) {
        $sum = 0;
        foreach (str_split($str) as $char) {
            if (is_numeric($char)) {
                $sum += (int)$char;
            }
        }
        return $sum;
    }

    public static function phoneWord($initialPhoneNumber) {
        $number = 0;
        $strLen = strlen($initialPhoneNumber);

        for ($currCharacter = 0; $currCharacter < $strLen; $currCharacter++) {
            $ch = $initialPhoneNumber[$currCharacter];

            if (ctype_alpha($ch)) {
                switch (strtoupper($ch)) {
                    case 'A': case 'B': case 'C': $number = $number * 10 + 2; break;
                    case 'D': case 'E': case 'F': $number = $number * 10 + 3; break;
                    case 'G': case 'H': case 'I': $number = $number * 10 + 4; break;
                    case 'J': case 'K': case 'L': $number = $number * 10 + 5; break;
                    case 'M': case 'N': case 'O': $number = $number * 10 + 6; break;
                    case 'P': case 'Q': case 'R': case 'S': $number = $number * 10 + 7; break;
                    case 'T': case 'U': case 'V': $number = $number * 10 + 8; break;
                    case 'W': case 'X': case 'Y': case 'Z': $number = $number * 10 + 9; break;
                }
            } elseif (ctype_digit($ch)) {
                $number = $number * 10 + (int)$ch;
            } else {
                echo "Invalid character!";
            }
        }

        return $number;
    }


}
