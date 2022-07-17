<?php
include "php/config.php";
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
    $Time = date("h:i:s");
    SESSION_START();
    $_SESSION = array();
    session_destroy();
    $log = mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Admin has been logged out','{$Time}','{$Date}')");
    if ($log === TRUE){
        header("Location:index.php");
        exit();
    }else{
        mysqli_error($connect_db);
    }
    
?>