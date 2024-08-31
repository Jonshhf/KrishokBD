<?php

session_start(); 

// Database configuration
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$dbname = "krisok_db"; // The database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
   
    $mobile = $_POST['mobile'];
    $password = $_POST['password']; // Direct password, no hashing

$sql = "SELECT * FROM users_registration where mobile='$mobile' and password='$password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Test";
    $_SESSION["user_id"]=$row["id"];
  }
} else {
    echo "0";
}
   
    $conn->close();
}
?>
