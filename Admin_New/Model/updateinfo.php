<?php
include "../connection.php";

session_start();
$admin_user_id=$_SESSION["admin_user_id"];


      $text=$_POST["text"];
    	/*$tagline=$_POST["tagline"];
    	$address=$_POST["address"];
    	$mobileno=$_POST["mobileno"];
    	$website=$_POST["website"];
    	$facebook=$_POST["facebook"];
    	$username=$_POST["username"];
    	$password=$_POST["password"];*/




$sql = "UPDATE `notice` SET `text`='$text'";
//echo $sql;
if ($conn->query($sql) === TRUE) { 
   echo "Data Successfully Udated";
} else {
    echo "Error updating record: " . $conn->error;
}


/*
// Check if Exist ..............................

$counter=0;

$sql = "SELECT * FROM basic_info ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $counter++;
  }
} else {
  
}

if($counter==0)
{
    $sql="INSERT INTO `basic_info`( `name`, `address`, `mobile_no`, `web_address`, `facebook`, ) 
	VALUES ('$shopname','$address','$mobileno','$website','$facebook')";
}
else{

	$sql = "UPDATE `basic_info` SET `name`='$shopname',`address`='$address',`mobile_no`='$mobileno',`web_address`='$website',`facebook`='$facebook' ";

}

if ($conn->query($sql) === TRUE) {
	
   echo "Basic Info Successfully Updated ! ! !";


} else {
    echo "Error updating record: " . $conn->error;
}
*/
$conn->close();
?>