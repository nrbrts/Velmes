<?php
$hostname = "localhost";
$username = "kvdlv_norberts";
$password = "Norberts123!";
$dbname = "kvdlv_velmes";

$conn = new mysqli($hostname, $username, $password, $dbname);   

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
