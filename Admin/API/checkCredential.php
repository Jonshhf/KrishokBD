<?php

  session_start(); 

  $usernames=$_POST["username"];
  $passwords=$_POST["password"];
  
include "../../connection.php";

$sql = "SELECT * FROM users where username='$usernames' and password='$passwords' and is_active=1 ";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();
    $_SESSION["userid"] = $row['id'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["division_id"] = $row['division_id'];
    $_SESSION["is_super_admin"] = $row['is_super_admin'];
   echo 1;
} else {
   echo 0;
}

?>