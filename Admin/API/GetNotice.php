<?php
include "../../connection.php";
session_start(); 

$sqlc = "SELECT * FROM notice where area='header'";
$resultc = $conn->query($sqlc);
$_Notice="";
if ($resultc->num_rows > 0) {
 
  while($row = $resultc->fetch_assoc()) {

    $_Notice=$row["text"];
  }    

}
else{
   
}

?>


<div class="card-body">
                    <h4 class="card-title">Add/Update Notice</h4>
                    
                    <form class="forms-sample" style="width:50%">
                    
    

                    <div class="form-group">
                        <label for="exampleTextarea1">Notice</label>
                        <textarea class="form-control" id="text" rows="5"><?php echo htmlspecialchars($_Notice, ENT_QUOTES, 'UTF-8'); ?></textarea>

                      </div>

                      <button type="button" onclick="SaveNotice()" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>

                 

                </div>
              </div>
