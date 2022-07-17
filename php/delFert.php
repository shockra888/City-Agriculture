<?php
require_once("session.php");

$id = $_GET['id'];

    if($id==0){
        $msg =  "Unable_to_delete_this_record";
        header("Location:../fertilizer/fertilizer.php?=$msg");
    }else{

    $Movefert = "INSERT INTO fertilizer_archieve SELECT * FROM fertilizers WHERE fertilizer_id = $id";

    if ($connect_db->query($Movefert) === TRUE){
        $delRec ="DELETE FROM fertilizers WHERE fertilizer_id = $id";
        if($connect_db->query($delRec)===TRUE){
            header("Location:../fertilizer/fertilizer.php?Deleted_Successfully");
        }else{
            echo "Error5".mysqli_error($connect_db);
        }       
    }else{
        echo "Error1".mysqli_error($connect_db);
    }
}

?>
