<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "quanlyquanan";


$con = mysqli_connect($severname, $username, $password, $dbname);
$con->set_charset('utf8mb4');

// Check connection
if ($con->connect_errno) {
  echo "Failed to connect to MySQL: " . $con->connect_error;
  die();
}
