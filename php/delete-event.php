<?php
require_once "config.php";
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("H:i:s");
$id = $_POST['id'];
$sqlDelete = mysqli_query($connect_db,"DELETE from tbl_events WHERE id=".$id);
if ($sqlDelete === TRUE){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Event is Deleted in calendar','{$Time}','{$Date}')");
}else{
    mysqli_error($connect_db);
}
mysqli_close($connect_db);
?>