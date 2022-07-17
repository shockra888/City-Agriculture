<?php
include("config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    function Add_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");
    $Plant_name = $availability = $gmo ="";
    $gmo = Add_Input($_POST['gmo']);
    $sid = $_POST['SID'];
    $ID = $_POST['Lid'];


     if (!empty($_POST['plantname'])) {
        if(preg_match('(^[a-zA-Z\s_ ]*$)',$_POST['plantname'])){
            $Plant_name = Add_Input($_POST['plantname']);
        }else{
            $error1 = "Invalid input! Plant name must be letter with whitespaces only";
        }
    } else {
        $error1 = "Plant Name is required";
    }

    if (!empty($_POST['available'])) {
        if(preg_match('(^[0-9]*$)',$_POST['available'])){
            $availability = Add_Input($_POST['available']);
        }else{
            $error2 = "Invalid input! Availlability must be number only";
        }
    } else {
        $error2 = "Availability count is required";
    }

    $updateseed = "UPDATE seeds SET plant_name = '$Plant_name', GMO = '$gmo', available = '$availability' WHERE seed_id = $sid";

    if($connect_db->query($updateseed) === True){
        mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('seed record has been modified','{$Time}','{$Date}')");
        header("Location:seeds.php?id=$ID");
    }else{
        $errorinsert = "Error 1".mysqli_error($connect_db);
    }
}
?>