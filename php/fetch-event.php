<?php
    require_once "config.php";

    $json = array();
    $sqlQuery = "SELECT * FROM tbl_events ORDER BY id";

    $result = mysqli_query($connect_db, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    echo json_encode($eventArray);
?>