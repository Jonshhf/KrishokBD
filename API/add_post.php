<?php
include '../connection.php'; // Connection to the database

$type = $_POST['type'];
$status = $_POST['status'];
$author = "John Doe"; // You can replace this with session or dynamic user info
$date = date('Y-m-d H:i:s');
$image = '';

if(isset($_FILES['image'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        $image = $targetFilePath;
    }
}

$query = "INSERT INTO posts (type, status, author, date, image) VALUES ('$type', '$status', '$author', '$date', '$image')";
if(mysqli_query($conn, $query)){
    echo json_encode(["message" => "Post added successfully"]);
} else {
    echo json_encode(["message" => "Error occurred"]);
}
?>
