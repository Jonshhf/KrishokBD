<?php
include '../connection.php'; // Connection to the database

$query = "SELECT * FROM posts ORDER BY date DESC";
$result = mysqli_query($conn, $query);
$posts = [];

while($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row;
}

echo json_encode($posts);
?>
