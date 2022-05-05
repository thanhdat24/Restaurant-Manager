<?php
require 'db/connect.php';

$id = $_GET['id'];


$sql =   db_query("CALL `xoahd`('" . $_GET['id'] . "');");
if ($sql) {
    redirect("?page=order&action=index");
};
