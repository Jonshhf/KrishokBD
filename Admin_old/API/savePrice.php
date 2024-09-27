

<?php

include "../../connection.php";

// Retrieve data from POST request
$division_id = isset($_POST['division_id']) ? $_POST['division_id'] : '';
$district_id = isset($_POST['district_id']) ? $_POST['district_id'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
$product_type_id = isset($_POST['product_type_id']) ? $_POST['product_type_id'] : 0;
$price_id = isset($_POST['id']) ? $_POST['id'] : 0;


if ($division_id && $district_id && $date && $price) {
    if ($price_id > 0) {
        
    } else {
        $sql = "INSERT INTO district_wise_price (division_id, district_id, date, price,product_id,product_type_id) VALUES ($division_id, $district_id, '$date', $price,$product_id,$product_type_id)";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Data Saved Successfully !!";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
   
$conn->close();
?>