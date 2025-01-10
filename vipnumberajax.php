<?php

require_once 'helpers/DBConnection.php';

    $dbcon = new DBConnection();
    $conn = $dbcon->getCon();



// Access form data or relevant parameters
$page = $_POST['page'] ?? 1;
$minPrice = $_POST['min_price'] ?? null;
$maxPrice = $_POST['max_price'] ?? null;
$orderbyprice = $_POST['orderbyprice'] ?? null;



// Validate input data
if (empty($number_id) || !is_numeric($rate)) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}


    $query = "SELECT * FROM tbl_posts ORDER BY post_id DESC LIMIT :start, :limit";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':start', $_POST['start'], PDO::PARAM_INT);
    $stmt->bindParam(':limit', $_POST['limit'], PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        // Your code to process the row data
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$sql = "SELECT COUNT(*) FROM productdetails WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $number_id, PDO::PARAM_INT);
$stmt->execute();
$count = $stmt->fetchColumn();



// Simulate database interaction (replace with actual logic)
$data = array(
  'totalPages' => 10,  // Replace with actual total pages
  'html' => '',  // Replace with actual content
  'success' => true,
);

// Set headers (adjust as needed)
header('Content-Type: application/json');

echo json_encode($data);

?>