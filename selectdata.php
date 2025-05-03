<?php
require('db.php');

function selectData($sql)
{
    global $conn;
    $allDatas = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($allDatas)) {
        $rows[] = $row;
    }

    return $rows;
}
