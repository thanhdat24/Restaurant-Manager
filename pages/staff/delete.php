<?php
    require 'db/connect.php';

    $id = $_GET['id'];

    $sql = "CALL `xoa_nv`('".$_GET['id']."');";

        if(mysqli_query($con, $sql)){
            header('Location: http://localhost/Restaurant-Manager/?page=staff&action=index');
        };
?>