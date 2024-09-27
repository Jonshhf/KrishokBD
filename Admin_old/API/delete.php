<?php
include "../../connection.php";

$id=$_POST['id'];
$table=$_POST['table'];

// sql to delete a record
$sql = "DELETE FROM $table WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>