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
    $Plant_name = $availability = $gmo = $expiredate ="";
    $gmo = Add_Input($_POST['gmo']);
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");

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
    
    if(empty($_POST['plantname']) && empty($_POST['available'])){
        $errorinsert = "Fields required input";
    }else{
        $addseed = "INSERT INTO seeds(plant_name,GMO,available,date_created)
        VALUES ('{$Plant_name}','{$gmo}','{$availability}','{$Date}')";

        if($connect_db->query($addseed) === True){
            mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Seed has been added to the record','{$Time}','{$Date}')");
            header("Location:seeds.php?id=$ID");
        }else{
            $errorinsert = "Error 1".mysqli_error($connect_db);
        }
    }
}
?>