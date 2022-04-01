<?php
ob_start();
session_start();

//data
require 'configs/site.php';
// connect
require('db/connect.php');
// lib
require 'lib/url.php';
require 'lib/database.php';
require 'lib/number.php';
require 'lib/template.php';

?>

<?php
$act = isset($_GET['action']) ? $_GET['action'] : 'index';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$path = "./pages/{$page}/{$act}.php";


if (file_exists($path)) {
    require "{$path}";
}
