<?php
ob_start();
session_start();

// session_destroy();
//data
require 'data/site.php';
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
$page = isset($_GET['page']) ? $_GET['page'] : 'menu';
$path = "./pages/{$page}/{$act}.php";
// require './inc/header.php';

if (file_exists($path)) {
    require "{$path}";
}

// require './inc/footer.php';
