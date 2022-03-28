<?php
    require 'db/connect.php';

    $id = $_GET['id'];

    $sql = "CALL `xoa_thucan`('".$_GET['id']."');";

        if(mysqli_query($con, $sql)){
            redirect("?page=menu&action=index");
        };
?>