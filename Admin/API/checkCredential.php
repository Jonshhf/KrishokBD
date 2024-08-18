<?php

  $usernames=$_POST["username"];
  $passwords=$_POST["password"];
  
include "../../connection.php";

$sql = "SELECT * FROM users where username='$usernames' and password='$passwords' ";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo 1;
} else {
   echo 0;
}

?>