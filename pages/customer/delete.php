<?php
require 'db/connect.php';

$id = $_GET['id'];


$sql = db_query("CALL `xoa_khachhang`('" . $_GET['id'] . "');");
if ($sql) {
    redirect("?page=customer&action=index");
};
