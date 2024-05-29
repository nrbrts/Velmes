<?php
$env = parse_ini_file('.env');
$hostname = $env["HOSTNAME"];
$username = $env["USERNAME"];
$password = $env["PASSWORD"];
$dbname = $env["DBNAME"];

$conn = new mysqli($hostname, $username, $password, $dbname);   

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
