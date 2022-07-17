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
    $uID = $_POST['utilid'];
    $ad = $_POST['uid'];

    $category = $utilname = $avail = $vehicle = $tractor = $combine = $attach = "";
    $category = Add_Input($_POST['category']);
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");

    if (!empty($_POST['utilityname'])) {
        if(preg_match('(^[a-zA-Z\s_ ]*$)',$_POST['utilityname'])){
            $utilname = Add_Input($_POST['utilityname']);
        }else{
            $error2 = "Invalid input! Utility Name must be letter with whitespaces only";
        }
    } else {
        $error2 = "Utility name is required";
    }

    if (!empty($_POST['available'])) {
        if(preg_match('(^[0-9]*$)',$_POST['available'])){
            $avail = Add_Input($_POST['available']);
        }else{
            $error3 = "Invalid input! Availlability must be number only";
        }
    } else {
        $error3 = "Availability count is required";
    }

    if($_POST['category'] === "Farming_vehicle"){
        $vehicle = Add_Input($_POST['vehicle']);

        if($_POST['vehicle'] === "Combine_or_Harvester"){
            $combine = Add_Input($_POST['combine']);
        }else if($_POST['vehicle'] === "Tractor"){
            $tractor = Add_Input($_POST['tractor']);
        }else{
            $combine = "N/A";
            $tractor = "N/A";
        }
    }else if($_POST['category'] === "Vehicle_attachment"){
        $attach = Add_Input($_POST['attach']);
    }
 

    $uputil = "UPDATE utilities SET category = '$category', type = '$vehicle', tractor_type = '$tractor', CH_type = '$combine', Attachment_type = '$attach', utility_name = '$utilname', availability = '$avail' WHERE utility_id = $uID";

    if($connect_db->query($uputil) === True){
        mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('An equipment has been modified','{$Time}','{$Date}')");
        header("Location:utillities.php?id=$ad");
    }else{
        $errorinsert = "Error 1".mysqli_error($connect_db);
    }
}
?>