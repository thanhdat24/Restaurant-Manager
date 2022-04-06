<?php
$con = mysqli_connect("localhost", "root", "", "qlqa");
$con->set_charset('utf8mb4');

// Check connection
if ($con->connect_errno) {
  echo "Failed to connect to MySQL: " . $con->connect_error;
  die();
}
