<?php
require_once("session.php");
error_reporting(~E_DEPRECATED & ~E_NOTICE);
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("H:i:s");
$id = $_GET['id'];

    if($id==0){
        $msg =  "Unable_to_delete_this_record";
        header("Location:../Data_Bin/seedbin.php?=$msg");
    }else{

    $updateSB = "UPDATE seed_archieve SET available = 1 WHERE seed_id = $id";

    if ($connect_db->query($updateSB) === TRUE){
        $recseed = "INSERT INTO seeds SELECT * FROM seed_archieve WHERE seed_id = $id";
        if($connect_db->query($recseed)===TRUE){
            $delRec ="DELETE FROM seed_archieve WHERE seed_id = $id";
            if($connect_db->query($delRec)===TRUE){
                mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('A seed has been restored from archive record','{$Time}','{$Date}')");
                header("Location:../Data_Bin/seedbin.php?Restored_Successfully");
            }else{
                echo "Error6".mysqli_error($connect_db);
            }
        }else{
            echo "Error5".mysqli_error($connect_db);
        }       
    }else{
        echo "Error1".mysqli_error($connect_db);
    }
}

?>
