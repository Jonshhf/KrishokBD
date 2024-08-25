<?php

    $name=$_POST['username'];
    $pass=$_POST['password'];
    $division_id=$_POST['division_id'];
    $is_active=$_POST['is_active'];
    $id=$_POST['id'];
    

include "../../connection.php";

  if(id==0){
    $sql = "INSERT INTO users ( `username`, `password`, `is_active`,division_id)
    VALUES ('$name','$pass', '$is_active',$division_id)";
  }
  else{
     $sql = "update users set username='$name',password='$password',is_active='$is_active',$division_id='$division_id' where id='$id' ";
  }


if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>