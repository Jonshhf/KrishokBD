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
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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
                <h3 class="card-title" >List of Posts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered" style="width:100%">
                  <thead class="thead-light">
                  <tr>
                    <th style='text-align:center;'>#</th>
                    <th>Type</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Image</th>    
        <th>Date</th>
        <th>Interested</th>  
        <th>Action</th>                 
                  </tr>
                  </thead>
                  <tbody>

                  <?php

$slno=0;
  	

$sql = "SELECT * from posts
        ORDER BY id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $slno = 1; // Serial number

    while($row = $result->fetch_assoc()) {
        // Assign values to variables
        $id = $row["id"];
        $type = $row["type"];
        $author = $row["author"];
        $status = $row["status"];
        $image="../".$row["image"];
        $date = $row["date"];
        $interested = $row["interested"];


        // Output the table rows
        echo "<tr>";
        echo "<td style='text-align:center;'>".$slno."</td>";
        echo "<td>".$type."</td>";
        echo "<td>".$author."</td>";
        echo "<td>".$status."</td>";
        echo "<td><img height='100px;' src='$image'></td>";
        echo "<td>".$date."</td>";
        echo "<td>".$interested."</td>";

        echo "<td class='text-center py-0 align-middle' style='text-align:center;'>
        <div class='btn-group btn-group-sm'>
          <a onclick=deletedata($id,this,'posts','id') class='btn btn-danger'><i class='fas fa-trash'></i></a>
        </div>
      </td>";

        echo "</tr>";

        $slno++;
    }

    echo "</tbody></table>";
} else {
    echo "No records found.";
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


</div>
