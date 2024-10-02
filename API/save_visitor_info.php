<?php

include "../connection.php";

session_start(); 
   
$it=$_SESSION["siteit"];        
         
if(isset($_SESSION["user_id"])){
    
    $id=$_SESSION["user_id"];
}         
else
{
    $id=$_POST["siteid"];
    $it=$_POST["siteit"];
}


date_default_timezone_set('Asia/Dhaka');
$dt=date("Y-m-d h:i:sa");

//echo $id;

// OS .............................................................

$hua = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
$os = 'I have no idea...';

if(preg_match('/android/i', $hua)) {
    $os = 'Android';
} elseif (preg_match('/linux/i', $hua)) {
    $os = 'Linux';
} elseif (preg_match('/iphone/i', $hua)) {
    $os = 'iPhone';
} elseif (preg_match('/macintosh|mac os x/i', $hua)) {
    $os = 'Mac';
} elseif (preg_match('/windows|win32/i', $hua)) {
    $os = 'Windows';
}
//echo $os;

// Browser . . . ..............................................

$agent = $_SERVER['HTTP_USER_AGENT'];
$name = 'I have no idea...';

if (preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i', $agent)) {
    $name = 'Internet Explorer';
} elseif (preg_match('/Firefox/i', $agent)) {
    $name = 'Mozilla Firefox';
} elseif (preg_match('/Chrome/i', $agent)) {
    $name = 'Google Chrome';
} elseif (preg_match('/Safari/i', $agent)) {
    $name = 'Apple Safari';
} elseif (preg_match('/Opera/i', $agent)) {
    $name = 'Opera';
} elseif (preg_match('/Netscape/i', $agent)) {
    $name = 'Netscape';
}


//echo $name;



$ip = $_SERVER['REMOTE_ADDR'];

//echo $ip;

$latitude=$_POST["latitude"];
$longitude=$_POST["longitude"];

//echo $longitude;


$sql = "INSERT INTO website_visitor (`userid`, `os`, `browser`, `ip`, `latitude`, `longitude`,dates)
VALUES ($id, '$os','$name', '$ip','$latitude','$longitude','$dt')";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT count(id) as total FROM website_visitor where userid=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["total"];
  }
} else {
  //echo "0 results";
}

$conn->close();


?>











