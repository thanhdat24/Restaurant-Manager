<?php
    require 'db/connect.php';

    $id = $_GET['id'];

    $sql = "CALL `xoa_khachhang`('".$_GET['id']."');";

        if(mysqli_query($con, $sql)){
            redirect("?page=customer&action=index");
        };
?>