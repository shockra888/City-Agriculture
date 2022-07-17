<?php
require_once "config.php";

$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sqlUpdate = mysqli_query($connect_db,"UPDATE tbl_events SET title='" . $title . "',start='" . $start . "',end='" . $end . "' WHERE id=" . $id);
if ($sqlUpdate === TRUE){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Event has been modified in calendar','{$Time}','{$Date}')");
}else{
    mysqli_error($connect_db);
}
?>