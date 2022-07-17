<?php
require_once("session.php");
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("H:i:s");
$id = $_GET['id'];

    if($id==0){
        $msg =  "Unable_to_delete_this_record";
        header("Location:../Data_Bin/seedbin.php?=$msg");
    }else{

    $updateSU = "UPDATE utility_archieve SET availability = 1 WHERE utility_id = $id";

    if ($connect_db->query($updateSU) === TRUE){
        $recutil = "INSERT INTO utilities SELECT * FROM utility_archieve WHERE utility_id = $id";
        if($connect_db->query($recutil)===TRUE){
            $delRec ="DELETE FROM utility_archieve WHERE utility_id = $id";
            if($connect_db->query($delRec)===TRUE){
                mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('An equipment has been restored from archive record','{$Time}','{$Date}')");
                header("Location:../Data_Bin/utilitybin.php?Restored_Successfully");
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
