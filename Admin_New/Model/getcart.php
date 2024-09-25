<?php

include "../../connection.php";

session_start();

$ipaddr=$_POST['ip'];

$_SESSION['ip']=$_POST['ip'];

//echo $ipaddr;

$sql = "SELECT *FROM order_temp a ,products b, unit c where a.productid=b.id and b.unit=c.unitid and a.ip='$ipaddr' ";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row

echo "<table class='table table-condensed'>
    <thead style='background-color:gray; color:white;'>
      <tr>
        <th style='color:white;'>Item</th>
        <th style='color:white;'>Quantity</th>
        <th style='color:white;'>Price</th>
        <th style='color:white;'>Delete</th>
      </tr>
    </thead>
    <tbody>";

    $totalitem=0;
    $totalprice=0;

    while($row = $result->fetch_assoc()) {

        $pid=$row["productid"];
        $pname= $row["product_name"];
        $qty=$row["orderqty"];
        $unit=$row["unitname"];
        $unitprice=$row["price"];

        $price=$unitprice*$qty;

        $totalitem++;
        $totalprice=$totalprice+$price;

         ?>

          <form class="form-inline" action="#">


      <tr>
        <td><?php echo $pname ?></td>
        <td>

        	<?php $inputid=$pid."in"; ?>

 <div class="form-group">
    <input type="number" onChange="updatecart('<?php echo $pid ?>');" id="<?php echo $inputid ?>" style="width:80px; float:left;" class="form-control" id="p" value="<?php echo $qty ?>" disabled><span style="float:left; margin:5px 0px 0px 10px;"><?php echo $unit ?></span>
  </div>

  
        
        </td>

        <td><?php echo $price ?></td>


        <td><button onclick="deletefromcart('<?php echo $pid ?>')" style="color:red; font-size:20px;" class="btn btn-default"><i class="fa fa-remove"></i></button></td>
      </tr>
    
    


       

</form>



         <?php


    }

    echo "<tr><td><b>Total Item : </b></td><td><b>".$totalitem."</b></td><td><b> Total Price : </b></td><td><b>".$totalprice."</b></td>";

echo "</tbody>
  </table>";

  

} else {
  
}

?>
