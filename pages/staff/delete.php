<?php
require 'db/connect.php';

$id = $_GET['id'];

$sql = db_query("CALL `xoa_nv`('" . $_GET['id'] . "')");

if ($sql) {
    redirect("?page=staff&action=index");
};
