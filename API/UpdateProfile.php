<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("UPDATE users_registration SET name = ?, mobile = ? WHERE id = ?");
    
    // Bind the parameters (s for string, i for integer)
    $stmt->bind_param("ssi", $name, $mobile, $id);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        $success_message = "Update successful!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
