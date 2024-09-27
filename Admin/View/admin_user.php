<?php

include "../connection.php";


session_start(); 

$userid=9;

// Content  ......................................................

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin User</li>
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
                <h3 class="card-title" >List of Admin User List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered" style="width:100%">
                  <thead class="thead-light">
                  <tr>
                    <th style='text-align:center;'>#</th>
                    <th>Division</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Is Super Admin</th>
                    <th>Is Active</th>
                    <th style='text-align:center;'>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

$slno=0;

$sql = "SELECT a.*,b.bn_name as division_name From users a,divisions b where a.division_id=b.id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $slno++;
    $id=$row["id"];
    $name=$row["username"];
    $password=$row["password"];
    $is_super_admin=$row["is_super_admin"]==1?"checked":"";
    $is_active=$row["is_active"]==1?"checked":"";
    $division_name=$row["division_name"];

   
     echo "<tr>";
     echo "<td style='text-align:center;'>".$slno."</td>";
     echo "<td class='DivisionName'>".$division_name."</td>";
     echo "<td class='UserName'>".$name."</td>";
     echo "<td class='Password'>".$password."</td>";
     echo "<td><input type='checkbox' onchange='update_superadmin($id,this)'  $is_super_admin></td>";
     echo "<td><input type='checkbox' onchange='update_active($id,this)'  $is_active></td>";

     echo "<td class='text-center py-0 align-middle' style='text-align:center;'>
                      <div class='btn-group btn-group-sm'>
                        <a onclick='updatedata($id,this)' class='btn btn-info'><i class='fas fa-edit'></i></a>
                        <a onclick=deletedata($id,this,'users','id') class='btn btn-danger'><i class='fas fa-trash'></i></a>
                      </div>
                    </td>";
     echo "</tr>";
      

  }
} else {
  
}
                ?>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            </div>
        
        </div>
       
      </section>

    <!-- End Table -->






    <!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Admin User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="Product">User Name</label>
                <input type="text" id="UserName" style="width:25%" class="form-control" placeholder="Name">
              </div>

              <div class="form-group">
                <label for="Product">Password</label>
                <input type="text" id="Password" style="width:25%" class="form-control" placeholder="Password">
              </div>

              <?php

$sqlsem = "SELECT * FROM divisions";
$resultse = $conn->query($sqlsem);
echo "<select style='width:25%' class='form-control' id='DivisionNames' name='DivisionName' required>";
echo "<option hidden='' value=''>--Select Division--</option>";
if ($resultse->num_rows > 0) {
while($rowse = $resultse->fetch_assoc()) {
$up_name=$rowse["bn_name"];
$upid=$rowse["id"];
echo  "<option value='$upid'>".$up_name."</option>";
}
} else {
echo  "<option >None</option>";
}
echo " </select>";
?>
<br>

              <input type="button" onclick="savedata()"  value="Save" class="btn btn-success float-left">
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
     
    </section>
    <!-- /.content -->


</div>
