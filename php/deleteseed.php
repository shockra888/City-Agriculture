<?php
require_once("session.php");

$id = $_GET['id'];

    if($id==0){
        $msg =  "Unable_to_delete_this_record";
        header("Location:../seed/seeds.php?=$msg");
    }else{

    $Moveseed = "INSERT INTO seed_archieve SELECT * FROM seeds WHERE seed_id = $id";

    if ($connect_db->query($Moveseed) === TRUE){
        $delRec ="DELETE FROM seeds WHERE seed_id = $id";
        if($connect_db->query($delRec)===TRUE){
            $upSbin = "UPDATE seed_archieve SET distributed = 0";
            if($connect_db->query($upSbin)===TRUE){
                header("Location:seeds.php");
            }
        }else{
            echo "Error5".mysqli_error($connect_db);
        }       
    }else{
        echo "Error1".mysqli_error($connect_db);
    }
}

?>
