
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krisok_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$divisionId = $_POST['division_id'];

// Fetch districts based on the selected division
    $districtsResult = $conn->query("SELECT id, bn_name FROM districts WHERE division_id = '$divisionId'");
    
    if ($districtsResult->num_rows > 0) {
        echo '<option value="" selected disabled>Select District</option>';
        while($row = $districtsResult->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['bn_name']) . '</option>';
        }
    } else {
        echo '<option value="" selected disabled>No Districts Available</option>';
    }

    // Close the connection
    $conn->close();

?>