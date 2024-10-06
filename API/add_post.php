<?php
include '../connection.php'; // Connection to the database
session_start();

$user_name="Guest User";
$user_id=0;
if(isset($_SESSION["user_id"])) {
    
    $user_id= $_SESSION["user_id"];
    $sql = "SELECT * FROM users_registration where id='$user_id' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $user_name=$row["name"];
      }
    }
}

$type = $_POST['type'];
$status = $_POST['status'];
$author = $user_name; // You can replace this with session or dynamic user info
$date = date('Y-m-d H:i:s');
$image = '';

if(isset($_FILES['image'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        $image = "API/".$targetFilePath;
    }
}

$query = "INSERT INTO posts (type, status, author, date, image,userid) VALUES ('$type', '$status', '$author', '$date', '$image','$user_id')";
if(mysqli_query($conn, $query)){
    echo json_encode(["message" => "Post added successfully"]);
} else {
    echo json_encode(["message" => "Error occurred"]);
}
?>
