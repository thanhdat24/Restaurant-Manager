<?php
    require 'db/connect.php';

    $id = $_GET['id'];

    $sql = "CALL `xoa_khachhang`('".$_GET['id']."');";

        if(mysqli_query($con, $sql)){
            header('Location: http://localhost/Restaurant-Manager/?page=customer&action=index');
        };
?>