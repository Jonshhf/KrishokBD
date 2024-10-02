<?php
// Database connection
include "../connection.php";

// Fetch user_type from the POST request
$user_type = $_POST['user_type'];

// Prepare and execute the query
$stmt = $conn->prepare("SELECT id, name, mobile FROM users_registration WHERE user_type = ?");
$stmt->bind_param("s", $user_type);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data as an associative array
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// Return the data as JSON
echo json_encode($users);

// Close the connection
$stmt->close();
$conn->close();
?>
