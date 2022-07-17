<?php
require_once "config.php";
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("h:i:s");
$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

    if(preg_match('(^[a-zA-Z\s_ ]*$)',$title)){
        $title1= isset($_POST['title']) ? $_POST['title'] : "";
    }else{
        echo '<script> alert("Invalid input");</script>';
    }

$sqlInsert = mysqli_query($connect_db,"INSERT INTO tbl_events (title,start,end) VALUES ('".$title1."','".$start."','".$end ."')");

if ($sqlInsert === TRUE){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Event is added to calendar','{$Time}','{$Date}')");
}else{
    mysqli_error($connect_db);
}
?>