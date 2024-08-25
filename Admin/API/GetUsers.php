
<?php
include "../../connection.php";

?>

<style>
  /* CSS styles for the table */
  #userTbl {
    border-collapse: collapse;
    width: 100%;
  }

  #userTbl th, #userTbl td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    vertical-align: top; /* Align text to the top of cells */
  }

  #userTbl th {
    background-color: #C8B1AD;
    color: black;
  }

  #userTbl tbody tr:hover {
    background-color: #f5f5f5;
  }
</style>

<div class="page-header">
              <h3 class="page-title"> Krisok </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Krisok</li>
                </ol>
              </nav>
</div>

<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                
              
              
              <div class="card">
                  
              <div class="card-body">
                    
              <h4 class="card-title">Users</h4>                 
                    <table id="userTbl">
                      <thead style="background-color:#C8B1AD; color:black;">
                        <tr>
                          <th> # </th>
                          <th> User Name </th>
                          <th> Password </th>
                          <th> Division </th>
                          <th> Active Status </th> 
                          <th> Action </th>                  
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = "SELECT * FROM users order by id desc";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $slno++;
     $id=$row["id"];
     $name=$row["username"];
     $pass=$row["password"];
     $division_id=$row["division_id"];
     

     $division_name="";
     $sqlq = "SELECT * FROM divisions where id=$division_id";
     $resultq = $conn->query($sqlq);
     if ($resultq->num_rows > 0) {
       while($rowq = $resultq->fetch_assoc()) {
         $division_name=$rowq["bn_name"];
       }
     }
     
    // $image_url="API/".$row["image_url"];
    
     $is_active="Inactive";
     if($row["is_active"]==1)
     {
        $is_active="Active";
     }


  
     echo "<tr style='height:100px; '>";
     echo "<td>".$slno."</td>";
     echo "<td class='username'>".$name."</td>";
     echo "<td class='password'>".$pass."</td>";
     echo "<td class='division_name'>".$division_name."</td>";
     echo "<td class='is_active'>".$is_active."</td>";
     
     echo "<td> 
     <i class='fa fa-edit' aria-hidden='true' style='cursor: pointer;' onclick='EditUser($id,this)'></i>
     &nbsp;&nbsp;
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"Delete($id,'users')\"></i>    
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

              ?>

              <div class="card-body">
                    <h4 class="card-title">Add Users</h4>
                    
                    <form class="forms-sample">

                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="username" placeholder="User Name" >
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" >
                    </div>

              <div class="mb-3">
                <label for="product" class="form-label">Division</label>
                <select class="form-control" id="division_id" name="product"  required>
                    <option value="" selected disabled>Select Division</option>
                    <?php foreach ($divisions as $division): ?>
                        <option value="<?= $division['id'] ?>"><?= htmlspecialchars($division['bn_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

          
                      <div class="form-check form-check-success">
                            <label > 
                            Is Active <input style="margin-left:20px;"  id="isactive" type="checkbox" class="form-check-input" checked/>  
                            </label>
                        </div>
                      <button type="button" onclick="SaveUsers()" class="btn btn-primary mr-2">Submit</button>
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