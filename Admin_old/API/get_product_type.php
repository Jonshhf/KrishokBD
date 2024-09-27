
<?php

include "../../connection.php";

$productId = $_POST['product_id'];

    $typesResult = $conn->query("SELECT id, name FROM products_type WHERE product_id = '$productId'");
    
    if ($typesResult->num_rows > 0) {
        echo '<option value="" selected disabled>Select Type</option>';
        while($row = $typesResult->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
        }
    } else {
        echo '<option value="" selected disabled>No Type Available</option>';
    }

    // Close the connection
    $conn->close();

?>