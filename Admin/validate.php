<html>
<head>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

<?php

include "connection.php";

$email=$_POST["email"];
$pass=$_POST["password"];

session_start(); 
		 
// Check .......................................................

$sql = "SELECT * FROM users where username='$email' and password='$pass' and is_active=1 ";
//echo $sql;
$result = $conn->query($sql);

$validatuser=0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    $n=$row["username"];
    $p=$row["password"];

    $_SESSION["username"]=$n;
    $_SESSION["password"]=$p;
    $_SESSION["admin_user_id"] = $row["id"];
    $_SESSION["is_super_admin"] = $row["is_super_admin"];
    $_SESSION["division_id"] = $row["division_id"];

    $validatuser=1;
  }
} else {
  
}


// Redirect .......................................................

if($validatuser==1)
{

  echo "<script>
 
  swal('Login Successful ! ! !','')
  .then((willDelete) => {
if (willDelete) {

window.location.href='home.php';

}
});

</script>";

}
else{

  
  echo "<script>
  swal('Login Failed !','Wrong Email or Password ! Try Again ')
    .then((willDelete) => {
if (willDelete) {

window.location.href='index.html';
  
}
});
</script>";

}




?>

</body>

</html>