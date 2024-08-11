<?php

    $id=$_POST['id'];
    $name=$_POST['name'];
    
    $is_active=$_POST['is_active'];
    $image_url=$_POST['image_url'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krisok_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqlc = "SELECT * FROM products where id=$id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {

    if($image_url=="")
    {
      $sql = "UPDATE products set name='$name',is_active='$is_active' where id=$id ";
    }
    else
    {
      $sql = "UPDATE products set name='$name',is_active='$is_active',image_url='$image_url' where id=$id ";
    }
    

}
else{
    $sql = "INSERT INTO products ( `name`, `image_url`, `is_active`)
    VALUES ('$name','$image_url', '$is_active')";
}



if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>