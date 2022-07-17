<?php
require_once("config.php");
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("H:i:s");

if(isset($_POST['txt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Password Reset clicked','{$Time}','{$Date}')");
}

if(isset($_POST['farmertxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to farmers record page','{$Time}','{$Date}')");
}
if(isset($_POST['seedtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to seeds record page','{$Time}','{$Date}')");
}
if(isset($_POST['ferttxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to fertilizers record page','{$Time}','{$Date}')");
}
if(isset($_POST['utiltxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to equpments record page','{$Time}','{$Date}')");
}
if(isset($_POST['archtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to archive page','{$Time}','{$Date}')");
}
if(isset($_POST['disttxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to distribution history page','{$Time}','{$Date}')");
}
if(isset($_POST['syslogtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to system logs page','{$Time}','{$Date}')");
}
if(isset($_POST['poptxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to farmers population page','{$Time}','{$Date}')");
}
if(isset($_POST['addftxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to farmers registration page','{$Time}','{$Date}')");
}
if(isset($_POST['uptneed'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to farmers update page','{$Time}','{$Date}')");
}
if(isset($_POST['viewf'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to farmer profile page','{$Time}','{$Date}')");
}
if(isset($_POST['btnprint'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Farmers record print button clicked','{$Time}','{$Date}')");
}
if(isset($_POST['editftxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to Edit farmer page','{$Time}','{$Date}')");
}
if(isset($_POST['printfptxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to print farmer profile page','{$Time}','{$Date}')");
}
if(isset($_POST['fldestxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to update land description page','{$Time}','{$Date}')");
}
if(isset($_POST['addparceltxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to add land parcel page','{$Time}','{$Date}')");
}
if(isset($_POST['distferttxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to distributed fetilizer item detail page','{$Time}','{$Date}')");
}
if(isset($_POST['distseedtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to distributed seed item detail page','{$Time}','{$Date}')");
}
if(isset($_POST['distutiltxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to distributed equpment detail item page','{$Time}','{$Date}')");
}
if(isset($_POST['parceluptxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to update land parcel page','{$Time}','{$Date}')");
}
if(isset($_POST['maptxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to land geography page','{$Time}','{$Date}')");
}
if(isset($_POST['printfprofile'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Farmer profile print button is clicked','{$Time}','{$Date}')");
}
if(isset($_POST['addseedtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to add seed page','{$Time}','{$Date}')");
}
if(isset($_POST['printseed'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('print seed button is clicked','{$Time}','{$Date}')");
}
if(isset($_POST['distseedtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to seed distribution page','{$Time}','{$Date}')");
}
if(isset($_POST['uptseedtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to seed update page','{$Time}','{$Date}')");
}
if(isset($_POST['printfert'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('print fertilizer button is clicked','{$Time}','{$Date}')");
}
if(isset($_POST['addferttxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to add fertilizer page','{$Time}','{$Date}')");
}
if(isset($_POST['distferttxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to distribute fertilizer page','{$Time}','{$Date}')");
}
if(isset($_POST['fertupdtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to update fertilizer page','{$Time}','{$Date}')");
}
if(isset($_POST['printutil'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('print equipment button has been clicked','{$Time}','{$Date}')");
}
if(isset($_POST['addutiltxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to add equipment page','{$Time}','{$Date}')");
}
if(isset($_POST['distutiltxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to equpment distribution page','{$Time}','{$Date}')");
}
if(isset($_POST['utilupdtxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to update equpment page','{$Time}','{$Date}')");
}
if(isset($_POST['farchive'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to farmer archive page','{$Time}','{$Date}')");
}
if(isset($_POST['sarchive'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to seed archive page','{$Time}','{$Date}')");
}
if(isset($_POST['ffarchive'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to fertilizer archive page','{$Time}','{$Date}')");
}
if(isset($_POST['uarchive'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to equipment archive page','{$Time}','{$Date}')");
}
if(isset($_POST['utilhstxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to Equipment distribution history page','{$Time}','{$Date}')");
}
if(isset($_POST['ferthstxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to Fertilizer distribution history page','{$Time}','{$Date}')");
}
if(isset($_POST['seedhstxt'])){
    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Redirected to Seed distribution history page','{$Time}','{$Date}')");
}
?>