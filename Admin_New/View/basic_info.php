<?php

include "../connection.php";

session_start(); 

$admin_user_id=9;



$sql = "SELECT * FROM notice";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$shopname=$row["text"];
    	/*$tagline="";
    	$address=$row["address"];
    	$mobileno=$row["mobile_no"];
    	$website=$row["web_address"];
    	$facebook=$row["facebook"];
    	$username= $_SESSION["username"];
    	$password= $_SESSION["password"];*/

    }
} else {
	
	    $shopname="Shop Name";
    	$tagline="Shop Tag Line";
    	$address="Shop Address";
    	$mobileno="123456789";
    	$website="http://www.Shop.com";
    	$facebook="http://www.facebook.com";
    	$username= $_SESSION["username"];
    	$password= $_SESSION["password"];
	
}

// Content  ......................................................

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Basic Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Basc Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


     
<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add / Update Shop Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">


    
            
  <table class="table table-bordered" style="font-size:18px; ">

    <tbody>

 <?php

    

echo "<form action='Model/updateinfo.php' method='post'>";

      

echo "<tr>";

echo "<td>Notice</td>";

echo "<td><input class='form-control' type='text' value='$shopname' name='shopname'></td>";


echo "</tr>";
/*
echo "<tr style='display:none;'>";


echo "<td>Tag Line</td>";

echo "<td><input class='form-control' type='text' value='$tagline' name='tagline'></td>";


echo "</tr>";


echo "<td>Address</td>";

echo "<td><input class='form-control' type='text' value='$address' name='address'></td>";


echo "</tr>";


 echo "<td>Mobile No</td>";

echo "<td><input class='form-control' type='text' value='$mobileno' name='mobileno'></td>";


echo "</tr>";

 echo "<td>Website</td>";

echo "<td><input class='form-control' type='text' value='$website' name='website'></td>";


echo "</tr>";


echo "<td>Facebook</td>";

echo "<td><input class='form-control' type='text' value='$facebook' name='facebook'></td>";


echo "</tr>";


echo "<td>User Name</td>";

echo "<td><input class='form-control' type='text' value='$username' name='username'></td>";


echo "</tr>";


  echo "<td>Password</td>";

echo "<td><input class='form-control' type='text' value='$password' name='password'></td>";


echo "</tr>";
*/

echo "<tr><td><button onclick='savedata()' style='float:left; background-image:url('images/heading.jpg');' class='btn btn-success' type='submit'><i class='fa fa-refresh' aria-hidden='true'></i>&nbsp;&nbsp;Update Info</button></td><td></td></tr>";

echo "</form>";

  


?>


</tbody>
  </table>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
     
    </section>
    <!-- /.content -->



</div>
