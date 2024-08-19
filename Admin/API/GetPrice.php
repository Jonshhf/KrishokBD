
<?php
include "../../connection.php";

?>

<style>
  /* CSS styles for the table */
  #priceTbl {
    border-collapse: collapse;
    width: 100%;
  }

  #priceTbl th, #priceTbl td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    vertical-align: top; /* Align text to the top of cells */
  }

  #priceTbl th {
    background-color: #C8B1AD;
    color: black;
  }

  #priceTbl tbody tr:hover {
    background-color: #f5f5f5;
  }
</style>

<div class="page-header">
              <h3 class="page-title"> Krisok </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>Proudct List</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Krisok</li>
                </ol>
              </nav>
</div>

<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                
              
              
              <div class="card">
                  
              <div class="card-body">
                    
              <h4 class="card-title">Product List</h4>                 
                    <table id="priceTbl">
                      <thead style="background-color:#C8B1AD; color:black;">
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
$sql = "SELECT * FROM district_wise_price order by id desc";
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
     echo "<td class='price'>".$price."</td>";
     
     echo "<td> 
     <i class='fa fa-edit' aria-hidden='true' style='cursor: pointer;' onclick='EditPrice($id,this)'></i>
     &nbsp;&nbsp;
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"Delete($id,'district_wise_price')\"></i>    
     </td>"; 
     echo "</tr>";

  }
} 

?>
                       
                      </tbody>
                    </table>
                    
                    
              </div>
              
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

              <div class="card-body">
                    <h4 class="card-title">Add Price</h4>
                    
                    <form class="forms-sample" style="width:50%">
                    
            <div class="mb-3">
                <label for="product" class="form-label">Product</label>
                <select class="form-control" id="product" onchange="get_product_type(this)" name="product"  required>
                    <option value="" selected disabled>Select Product</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

              <!-- Type Dropdown -->
              <div class="mb-3">
                <label for="type" class="form-label">Product Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="" selected disabled>Select Type</option>
                </select>
            </div>

 <!-- Division Dropdown -->
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

            <!-- Price Field -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

                      <button type="button" onclick="savePrice()" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>

                 

                </div>
              </div>


