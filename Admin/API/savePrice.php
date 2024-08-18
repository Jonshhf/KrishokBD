

<?php

include "../../connection.php";

// Retrieve data from POST request
$division_id = isset($_POST['division_id']) ? $_POST['division_id'] : '';
$district_id = isset($_POST['district_id']) ? $_POST['district_id'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
$price_id = isset($_POST['id']) ? $_POST['id'] : 0;


if ($division_id && $district_id && $date && $price) {
    if ($price_id > 0) {
        // Update existing price entry
        //$query = "UPDATE district_wise_price SET division_id=?, district_id=?, date=?, price=?,product_id=? WHERE id=?";
        //$stmt = $conn->prepare($query);
        //$stmt->bind_param($division_id, $district_id, $date, $price, $product_id);
    } else {
        // Insert new price entry
        $sql = "INSERT INTO district_wise_price (division_id, district_id, date, price,product_id) VALUES ($division_id, $district_id, '$date', $price,$product_id)";
        //$stmt = $conn->query($query);
       
    }

    if ($conn->query($sql) === TRUE) {
        echo "Data Saved Successfully !!";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
   
// Close the connection
$conn->close();
?>