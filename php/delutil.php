<?php
require_once("session.php");

$id = $_GET['id'];

    if($id==0){
        $msg =  "Unable_to_delete_this_record";
        header("Location:../utilities/utilities.php?=$msg");
    }else{

    $Moveutil = "INSERT INTO utility_archieve SELECT * FROM utilities WHERE utility_id = $id";

    if ($connect_db->query($Moveutil) === TRUE){
        $delRec ="DELETE FROM utilities WHERE utility_id = $id";
        if($connect_db->query($delRec)===TRUE){
            header("Location:../utilities/utillities.php?Deleted_Successfully");
        }else{
            echo "Error5".mysqli_error($connect_db);
        }       
    }else{
        echo "Error1".mysqli_error($connect_db);
    }
}

?>
