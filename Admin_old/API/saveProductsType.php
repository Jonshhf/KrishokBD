<?php

    $id=$_POST['id'];
    $product_id=$_POST['product_id']==''?0:$_POST['product_id'];
    $name=$_POST['name'];
    
    $is_active=$_POST['is_active'];
    $image_url=$_POST['image_url'];

include "../../connection.php";
$sqlc = "SELECT * FROM products_type where id=$id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {

    if($image_url=="")
    {
      $sql = "UPDATE products_type set name='$name',is_active='$is_active',product_id=$product_id where id=$id ";
    }
    else
    {
      $sql = "UPDATE products_type set name='$name',is_active='$is_active',image_url='$image_url',product_id=$product_id where id=$id ";
    }
    

}
else{
    $sql = "INSERT INTO products_type ( `name`, `image_url`, `is_active`,product_id)
    VALUES ('$name','$image_url', '$is_active',$product_id)";
}



if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>