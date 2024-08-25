
<?php
include "../../connection.php";

?>

<style>
  /* CSS styles for the table */
  #productTbl {
    border-collapse: collapse;
    width: 100%;
  }

  #productTbl th, #productTbl td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    vertical-align: top; /* Align text to the top of cells */
  }

  #productTbl th {
    background-color: #C8B1AD;
    color: black;
  }

  #productTbl tbody tr:hover {
    background-color: #f5f5f5;
  }
</style>

<div class="page-header">
              <h3 class="page-title"> Krisok </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>Proudct Type</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Krisok</li>
                </ol>
              </nav>
</div>

<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                
              
              
              <div class="card">
                  
              <div class="card-body">
                    
              <h4 class="card-title">Product Type</h4>                 
                    <table id="productTbl">
                      <thead style="background-color:#C8B1AD; color:black;">
                        <tr>
                          <th> # </th>
                          <th> Product </th>
                          <th> Product Type </th>
                          <th> Image </th>
                          <th> Order </th>
                          <th> Active Status </th> 
                          <th> Action </th>                  
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = "SELECT * FROM products_type order by id desc";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $slno++;
     $id=$row["id"];
     $product_id=$row["product_id"];
     $name=$row["name"];
     $order_no=$row["order_no"];

     $product_name="";
     $sqlq = "SELECT * FROM products where id=$product_id";
     $resultq = $conn->query($sqlq);
     if ($resultq->num_rows > 0) {
       while($rowq = $resultq->fetch_assoc()) {
         $product_name=$rowq["name"];
       }
     }
     
    $image_url="API/".$row["image_url"];
    
     $is_active="Inactive";
     if($row["is_active"]==1)
     {
        $is_active="Active";
     }


  
     echo "<tr style='height:100px; '>";
     echo "<td>".$slno."</td>";
     echo "<td class='product_name'>".$product_name."</td>";
     echo "<td class='name'>".$name."</td>";
     echo "<td class='image_url'><img src='$image_url'  width='100px;'  height='100px;' style='border-radius:0% !important;' ></td>";
     echo "<td class='order_no' contentEditable onblur='updateProductTypeOrderNo($id,this)'>".$order_no."</td>";
     echo "<td class='is_active'>".$is_active."</td>";
     
     echo "<td> 
     <i class='fa fa-edit' aria-hidden='true' style='cursor: pointer;' onclick='EditProductType($id,this)'></i>
     &nbsp;&nbsp;
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"Delete($id,'products_type')\"></i>    
     </td>"; 
     echo "</tr>";

  }
} 

?>
                       
                      </tbody>
                    </table>
                    
                    
              </div>
           
              
              <?php

$productsResult = $conn->query("SELECT id, name FROM products");
$products = [];
if ($productsResult->num_rows > 0) {
    while($row = $productsResult->fetch_assoc()) {
        $products[] = $row;
    }
}

              ?>

              <div class="card-body">
                    <h4 class="card-title">Add Products Type</h4>
                    
                    <form class="forms-sample">

              <div class="mb-3">
                <label for="product" class="form-label">Product</label>
                <select class="form-control" id="product" name="product"  required>
                    <option value="" selected disabled>Select Product</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

                      <div class="form-group">
                        <label for="name">Type</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" >
                      </div>
    
                      <div class="container mt-5">
<label for="imageInput">Upload News Image</label>
  <input type="file" id="imageInput" class="form-control-file">
  <div id="imagePreview" class="mt-3"></div>
</div>

                      <div class="form-check form-check-success">
                            <label > 
                            Is Active <input style="margin-left:20px;"  id="isactive" type="checkbox" class="form-check-input" checked/>  
                            </label>
                        </div>
                      <button type="button" onclick="saveImageProductType()" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>

                 

                </div>
              </div>


<script>
$(document).ready(function() {
    // Function to preview image after validation
    $("#imageInput").change(function(){
      var file = this.files[0];
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#imagePreview").html('<img src="'+e.target.result+'" class="img-fluid preview-image">');
      };
      reader.readAsDataURL(file);
    });
  });
</script>