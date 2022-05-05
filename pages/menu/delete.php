<?php
    require 'db/connect.php';

    $id = $_GET['id'];

    $sql = db_query("CALL `xoa_thucan`('" . $_GET['id'] . "');");

        if($sql){
            redirect("?page=menu&action=index");
        };
