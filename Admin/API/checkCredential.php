<?php

  $usernames=$_POST["username"];
  $passwords=$_POST["password"];
  
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

$sql = "SELECT * FROM users where username='$usernames' and password='$passwords' ";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo 1;
} else {
   echo 0;
}

?>