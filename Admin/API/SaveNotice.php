<?php

    
    $text=$_POST['text'];
    $area=$_POST['area'];
    
   
include "../../connection.php";
$sqlc = "SELECT * FROM notice where area='header'";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {
 
      $sql = "UPDATE notice set text='$text',area='$area' where area='header'  ";
}
else{
    $sql = "INSERT INTO notice (  `text`, `area`)
    VALUES ('$text', '$area')";
}


if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
