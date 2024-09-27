
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
                    <table id="productTbl">
                      <thead style="background-color:#C8B1AD; color:black;">
                        <tr>
                          <th> # </th>
                          <th> Product Name </th>
                          <th> Image </th> 
                          <th> Order </th>
                          <th> Active Status </th> 
                          <th> Action </th>                  
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = "SELECT * FROM products order by id desc";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $slno++;
     $id=$row["id"];
     $name=$row["name"];
     $order_no=$row["order_no"];
     
     $image_url="API/".$row["image_url"];
    
     $is_active="Inactive";
     if($row["is_active"]==1)
     {
        $is_active="Active";
     }


  
     echo "<tr style='height:100px; '>";
     echo "<td>".$slno."</td>";
     echo "<td class='name'>".$name."</td>";
     echo "<td class='image_url'><img src='$image_url'  width='100px;'  height='100px;' style='border-radius:0% !important;' ></td>";
     echo "<td class='order_no' contentEditable onblur='updateProductOrderNo($id,this)'>".$order_no."</td>";
     echo "<td class='is_active'>".$is_active."</td>";
     
     echo "<td> 
     <i class='fa fa-edit' aria-hidden='true' style='cursor: pointer;' onclick='EditProduct($id,this)'></i>
     &nbsp;&nbsp;
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"Delete($id,'products')\"></i>    
     </td>"; 
     echo "</tr>";

  }
} 

?>
                       
                      </tbody>
                    </table>
                    
                    
              </div>
              
              <div class="card-body">
                    <h4 class="card-title">Add Products</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="name">Name</label>
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
                      <button type="button" onclick="saveImage()" class="btn btn-primary mr-2">Submit</button>
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