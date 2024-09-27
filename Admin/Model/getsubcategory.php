<?php



$cid=$_POST["cid"];

include "../connection.php";
$sqlsem = "SELECT * FROM sub_category where category_id=$cid";


$resultse = $conn->query($sqlsem);

   
//echo "<label for='dis'>Class:</label>";



 echo  "<option hidden='' value='' >--Select Subcategory--</option>";

if ($resultse->num_rows > 0) {
    
	
    while($rowse = $resultse->fetch_assoc()) {
       
	   
	   $up_name=$rowse["name"];
	   $upid=$rowse["id"];
	   
	   
	  echo  "<option value='$upid'>".$up_name."</option>";
	   	   
    }
	
	
} else {
   
   echo  "<option value='0'>None</option>";
   

}
		

echo " </select>";


$conn->close();

?>