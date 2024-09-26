<?php

include "../connection.php";

session_start(); 

$userid=9;

// Content  ......................................................

?>




<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Items in Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        
         

          


          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <a target="_blank" href="../Recipt/orderrecipt.php"><button type="button" class="btn btn-danger">Print Recipt</button></a>
      </div>
    </div>
  </div>
</div>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Price Entry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Price</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>







    <!-- Table -->   

    <section class="content">
      <div class="row">
        <div class="col-md-12">

    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" >List of Price</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <?php

$divisionsResult = $conn->query("SELECT id, bn_name FROM divisions");

$divisions = [];
if ($divisionsResult->num_rows > 0) {
    while($row = $divisionsResult->fetch_assoc()) {
        $divisions[] = $row;
    }
}

// Fetch districts from database
$productsResult = $conn->query("SELECT id, name FROM products");
$products = [];
if ($productsResult->num_rows > 0) {
    while($row = $productsResult->fetch_assoc()) {
        $products[] = $row;
    }
}

// Get current date
$currentDate = date('Y-m-d');


              ?>

              <div class="mb-3">
                <label for="division" class="form-label">Division</label>
                <select class="form-control" id="division" name="division" onchange="get_districts(this)" required>
                    <option value="" selected disabled>Select Division</option>
                    <?php foreach ($divisions as $division): ?>
                        <option value="<?= $division['id'] ?>"><?= htmlspecialchars($division['bn_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- District Dropdown -->
            <div class="mb-3">
                <label for="district" class="form-label">District</label>
                <select class="form-control" id="district" name="district" required>
                    <option value="" selected disabled>Select District</option>
                    <?php foreach ($districts as $district): ?>
                        <option value="<?= $district['id'] ?>"><?= htmlspecialchars($district['bn_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Date Selection Field -->
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= $currentDate ?>" required>
            </div>

            <button type="button" class="btn btn-primary" onclick="LoadData()">Load Data</button><br>

                <table id="example1" class="table table-bordered" style="width:100%">
                  <thead class="thead-light">
                  <tr>
                  <th> # </th>
                          <th> Product </th>
                          <th> Type </th>
                          <th> Division </th>
                          <th> District </th> 
                          <th> Date </th> 
                          <th> Price </th>
                          <th> Action </th>    
                  </tr>
                  </thead>
                  <tbody>

                  <?php
$user_division_id=$_SESSION["division_id"];


if(isset($_GET["division_id"]))
{
  $division_id = $_GET["division_id"];
  $district_id = $_GET["district_id"];
  $date = $_GET["date"];

  $sql = "SELECT IFNULL(dwp.id,0) as id, p.id as product_id,IFNULL(pt.id,0) as product_type_id,
  $division_id as division_id,$district_id as district_id,'$date' as date,IFNULL(dwp.price,0) as price from products p 
left join products_type pt on p.id=pt.product_id 
left join district_wise_price dwp on p.id=dwp.product_id and IFNULL(pt.id,0)=dwp.product_type_id and date='$date' and division_id=$division_id and district_id=$district_id
 order by p.id,pt.id desc";

// echo $sql ;

}
else{
  $sql = "SELECT * FROM district_wise_price order by id desc";
}
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $slno++;
     $id=$row["id"];
     $product_id=$row["product_id"];
     $product_type_id = $row["product_type_id"];
     $division_id=$row["division_id"];
     $district_id=$row["district_id"];
     $date=$row["date"];
     $price=$row["price"];
     
 
     $product_name="";
     $sqlq = "SELECT * FROM products where id=$product_id";
     $resultq = $conn->query($sqlq);
     if ($resultq->num_rows > 0) {
       while($rowq = $resultq->fetch_assoc()) {
         $product_name=$rowq["name"];
       }
     }

     $product_type="";
     $sqlq = "SELECT * FROM products_type where id=$product_type_id";
     $resultq = $conn->query($sqlq);
     if ($resultq->num_rows > 0) {
       while($rowq = $resultq->fetch_assoc()) {
         $product_type=$rowq["name"];
       }
     }
     
$division_name="";
$sqlq = "SELECT * FROM divisions where id=$division_id";
$resultq = $conn->query($sqlq);
if ($resultq->num_rows > 0) {
  while($rowq = $resultq->fetch_assoc()) {
    $division_name=$rowq["bn_name"];
  }
}
   
$district_name="";
$sqlq = "SELECT * FROM districts where id=$district_id";
$resultq = $conn->query($sqlq);
if ($resultq->num_rows > 0) {
  while($rowq = $resultq->fetch_assoc()) {
    $district_name=$rowq["bn_name"];
  }
}
  
     echo "<tr style='height:50px; '>";
     echo "<td>".$slno."</td>";

     echo "<td class='product_name'>".$product_name."</td>";
     echo "<td class='product_type'>".$product_type."</td>";
     echo "<td class='division_name'>".$division_name."</td>";
     echo "<td class='district_name'>".$district_name."</td>";
     echo "<td class='date'>".$date."</td>";
     echo "<td class='price' onblur='updatePrice($id,$product_id,$product_type_id,$division_id,$district_id,\"$date\",this)' contentEditable>".$price."</td>";
     
     echo "<td> 
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"deletedata($id,this,'district_wise_price','id')\"></i>    
     </td>"; 
     echo "</tr>";

  }
} 

?> </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            </div>
        
        </div>
       
      </section>

    <!-- End Table -->


</div>
