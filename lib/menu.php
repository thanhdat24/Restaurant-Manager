<?php

function checkMenuExits($TenTA)
{
    $checkMenuExits = db_num_rows("SELECT * FROM thucan WHERE TenTA = '{$TenTA}'");
    if ($checkMenuExits > 0) {
        return true;
    } else {
        return false;
    }
}
