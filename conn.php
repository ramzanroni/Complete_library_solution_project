<?php 
$conn= new mysqli("localhost", "root", "", "library_project_final");
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>