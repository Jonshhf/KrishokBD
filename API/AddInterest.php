<?php
include '../connection.php'; // Connection to the database
session_start();

$user_id=0;
if(isset($_SESSION["user_id"])) {
    
    $user_id= $_SESSION["user_id"];
   
}

$post_id = $_POST['post_id'];

$query = "INSERT INTO post_interest (user_id, post_id) VALUES ('$user_id', '$post_id')";
if(mysqli_query($conn, $query)){
    echo json_encode(["message" => "Post added successfully"]);
} else {
    echo json_encode(["message" => "Error occurred"]);
}

$query = "update posts set interested=interested+1 where id=$post_id";
if(mysqli_query($conn, $query)){
    echo json_encode(["message" => "Post added successfully"]);
} else {
    echo json_encode(["message" => "Error occurred"]);
}

?>
