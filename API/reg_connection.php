<?php
// Database configuration
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_type = $_POST['user_type'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password']; // Direct password, no hashing

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users_registration (user_type, name, mobile, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $user_type, $name, $mobile, $password);

    // Execute the statement
    if ($stmt->execute()) {
        $success_message = "Registration successful!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
