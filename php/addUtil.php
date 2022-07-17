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
    $ID = $_POST['Lid'];

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
 
    if(empty($_POST['utilityname']) && empty($_POST['available']) && empty($_POST['category'])){
        $errorinsert = "Some fields require input";
    }else{
        $addutil = "INSERT INTO utilities(category,type,tractor_type,CH_type,Attachment_type,utility_name,availability,distribute,date_created)
        VALUES ('{$category}','{$vehicle}','{$tractor}','{$combine}','{$attach}','{$utilname}','{$avail}',0,'{$Date}')";

        if($connect_db->query($addutil) === True){
            mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('An equipment has been added to the record','{$Time}','{$Date}')");
            header("Location:utillities.php?id=$ID");
        }else{
            $errorinsert = "Error 1".mysqli_error($connect_db);
        }
    }
}
?>