<?php
    require 'db/connect.php';

    $id = $_GET['id'];

    $sql = "CALL `xoahd`('".$_GET['id']."');";

        if(mysqli_query($con, $sql)){
            redirect("?page=order&action=index");
        };
?>