<?php

include "../connection.php";

$divisionId=$_POST["divisionId"];
$productId=$_POST["productId"];

// Variables for product ID and division ID (coming from your application logic)
$product_id = $_POST['productId']; // assuming it's passed via URL
$division_id = $_POST['divisionId'];

// Database connection
$mysqli = new mysqli("localhost", "root", "", "krisok_db");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Fetch product and product type details
$productQuery = "
    SELECT p.name AS product_name, pt.id AS product_type_id, pt.name AS product_type_name
    FROM products p
    JOIN products_type pt ON p.id = pt.product_id
    WHERE p.id = ?";

// Prepare statement to fetch product and type details
$stmt = $mysqli->prepare($productQuery);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

// Loop through each product type and generate a table for it
while ($row = $result->fetch_assoc()) {
    $product_name = $row['product_name'];
    $product_type_id = $row['product_type_id'];
    $product_type_name = $row['product_type_name'];

    // Fetch pricing details for this product type
    $priceQuery = "
        SELECT 
            MAX(CASE WHEN date = CURDATE() THEN price ELSE NULL END) AS todays_price,
            AVG(CASE WHEN date >= CURDATE() - INTERVAL 7 DAY THEN price ELSE NULL END) AS last_week_avg,
            AVG(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN price ELSE NULL END) AS this_month_avg
        FROM district_wise_price 
        WHERE product_id = ? AND product_type_id = ? AND division_id = ?";

    // Prepare statement to fetch pricing details
    $stmt_price = $mysqli->prepare($priceQuery);
    $stmt_price->bind_param("iii", $product_id, $product_type_id, $division_id);
    $stmt_price->execute();
    $priceResult = $stmt_price->get_result();
    $priceRow = $priceResult->fetch_assoc();

    // Display a table for this product type
    echo "<h4> $product_name - $product_type_name</h4><hr>";
    echo "<table border='1' class='table table-bordered' style='font-size:14px;'>
            <tr>
                <th>গতকালের মূল্য</th>
                <th>গত সপ্তাহের গড় মূল্য </th>
                <th>গত মাসের গড় মূল্য</th>
            </tr>
            <tr>
                <td>{$priceRow['todays_price']}</td>
                <td>{$priceRow['last_week_avg']}</td>
                <td>{$priceRow['this_month_avg']}</td>
            </tr>
          </table>";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>
