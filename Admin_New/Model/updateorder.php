<?php
include "../../connection.php";

$oid=$_POST["oid"];


// .............................

$delivery="";

if(isset($_POST["delivery"]))
{

	$delivery="checked";

}
else
{
	$delivery="";
}

//  ...............

if($delivery=="checked")
{

        $proid=0;
        $ordqty=0;

$sql = "SELECT * from `order` where orderid=$oid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $proid=$row["productid"];
        $ordqty=$row["orderqty"];
        $custid=$row["memberid"];


         
$sql = "UPDATE products SET qty=qty-$ordqty WHERE id=$proid";

if ($conn->query($sql) === TRUE) {
  
} else {
    echo "Error updating record: " . $conn->error;
}
 


// Insert Point . . . 
  // Get Product points by id . . . . . . . . . . .

  $sqlpp = "SELECT *FROM products where id=$proid";
  //echo $sql;
  $resultpp = $conn->query($sqlpp);
  
  if ($resultpp->num_rows > 0) {
      // output data of each row
      while($rowpp = $resultpp->fetch_assoc()) {
  
          $referel_point=$rowpp["points"];
          
  
      }
    }
    else{
      $referel_point=0;
    }
  
         if($referel_point<500){
  
            $sqlp = "INSERT INTO points (`customerid`, `point`, `order_passcode`, `note`,point_type) VALUES ($custid,$referel_point,'0','Point by Regular Product Purchase','Point')";
            
            
            if ($conn->query($sqlp) === TRUE) {
              //echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

         }


        

    }
} else {
   
}




}



function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$p = randomPassword();




$sql = "UPDATE `order` SET delivery='$delivery',passcode='$p' WHERE orderid=$oid";

if ($conn->query($sql) === TRUE) {
	
   echo "Delivery Status Successfully Updated ! ! !";

} else {
  //  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>