<?php 

include "../connection.php";

$salesid=$_POST["salesid"];

// Show Sales Master ................................................................

?>

<div id="ContentDiv">



<table id="" class="table" style="width:40%; font-size:12px;">
<thead class="thead-white">

</thead>
<tbody>

<?php



// Get Company Data ..................................................

$companyname="Shop Name";
$logosrc="dist/img/global_logo.png";

$sql = "SELECT * FROM basic_info where userid=(select userid from sales_master where id=$salesid)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $companyname=$row["shop_name"];
    $logo=$row["logo"];
    $logosrc="imageUpload/uploads/".$logo;
 $mobilenoshop=$row["mobileno"];
 $facebook=$row["facebook"];
 $shopcategory=$row["shop_categoryid"];
 $division=$row["division_id"];
 $district=$row["district_id"];
 $upazilla=$row["upazila_id"];
 $custom_address=$row["address"];
  }
} else {
  
}

// Get Upazilla ......................................

$up_name="";
$sqlsem = "SELECT * FROM upazilas where id=$upazilla";
$resultse = $conn->query($sqlsem);

if ($resultse->num_rows > 0) {
   
    while($rowse = $resultse->fetch_assoc()) {
       	   
       $up_name=$rowse["name"];

    }
} 


// Get District ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,

$dis_name="";
$sqlsem = "SELECT * FROM districts where id=$district";
$resultse = $conn->query($sqlsem);

if ($resultse->num_rows > 0) {
   
    while($rowse = $resultse->fetch_assoc()) {
       	   
       $dis_name=$rowse["name"];

    }
}

$address="";
if($custom_address!="")
{
  $address=$custom_address."<br>";
}


if($up_name!="" && $dis_name!="")
{
   $address=$address."".$up_name.",".$dis_name;
}



$slno=0;

$sql = "SELECT * FROM sales_master where id=$salesid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$slno++;
$id=$row["id"];
$customerid=$row["customerid"];
$customer_name="";
$mobileno="";

$sqls = "SELECT name,mobileno FROM customer where id=$customerid";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
// output data of each row
while($rows = $results->fetch_assoc()) {
$customer_name=$rows["name"];
$mobileno=$rows["mobileno"];
}
} else {
// echo "0 results";
}

$sales_date=$row["sales_date"];
$grand_total=$row["grand_total"];
$paid=$row["paid"];
$due=$row["due"];
$note=$row["note"];



echo "<tr>";

echo "<td style='width:30%;'><img src=$logosrc height='30px' width='30px' style='border-radius:5px;' ></td><td style='text-align:center; float:left;'colspan='4'><b>".$companyname."<br>".$address."<br>Contact : ".$mobilenoshop."</b></td>";

echo "</tr>";

//echo "<tr><td colspan='5' style='text-align:center;'>Recipt</td></tr>";

echo "<tr>";

echo "<td>Customer Name</td>"; 
echo "<td class='customer_name'>".$customer_name."</td>"; 

echo "</tr>";

echo "<tr>";

echo "<td>Mobile No</td>"; 
echo "<td class=''>".$mobileno."</td>"; 

echo "</tr>";


echo "<tr>";

echo "<td>Date</td>"; 
echo "<td class=''>".$row["sales_date"]."</td>"; 

echo "</tr>";


}
} else {

}
?>

</tbody>
</table>


<br>

<table id="" class="table" style="width:40%; font-size:12px;" >
                  <thead class="thead-light">
                  <tr>
                    <th style='text-align:center;'>#</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    
                  </tr>
                  </thead>
                  <tbody>


<?php

// Show Sales Detail .....................................................................................


$sl=0;
$grand_total=0;

$sql = "SELECT * FROM sales_detail where salesid=$salesid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $sl++;
    $detailid=$row["id"];
    $productid=$row["productid"];
    
    // Get Product Name ........................................
    $productname="";
    $sqlp = "SELECT name FROM product where id=$productid";
    $resultp = $conn->query($sqlp);
    
    if ($resultp->num_rows > 0) {
      // output data of each row
      while($rowp = $resultp->fetch_assoc()) {
        $productname=$rowp["name"];
      }
    } else {
      //echo "0 results";
    }

    $quantity=$row["quantity"];
    $total_price=$row["total_price"];

    $grand_total=$grand_total+$total_price;

    echo "<tr>";
    echo "<td>".$sl."</td>";
    echo "<td>".$productname."</td>";
    echo "<td>".$quantity."</td>";
    echo "<td>".$total_price."</td>";
    echo "</tr>";

    

  }
} else {
  
}

?>

              </tbody>
                  <tfoot style="background-color:white; font-weight: bold;">
                     <tr> <td colspan="3">Grand Total : </td> <td><?php echo $grand_total ?></td> </tr>
                     <tr> <td colspan="3">Paid : </td> <td><?php echo $paid ?></td> </tr>
                     <tr> <td colspan="2"></td> <td colspan="2"></td> </tr>
                     <tr> <td colspan="2">Prepared By</td> <td colspan="2" style='text-align:right;'>Authorized By</td> </tr>
                  </tfoot>
                  </table>


</div>

                  <input type="button" style="width:20%; margin-left:0px; float:left;" onclick="printDiv('ContentDiv')" class="btn btn-success" value="Print receipt">