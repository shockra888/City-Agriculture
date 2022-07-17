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

    $fertilizer_name = $weight = $fcrop = $available = "";
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");

     if (!empty($_POST['fertilizername'])) {
        if(preg_match('(^[a-zA-Z\s_ ]*$)',$_POST['fertilizername'])){
            $fertilizer_name = Add_Input($_POST['fertilizername']);
        }else{
            $error1 = "Invalid input! fertilizer name must be letter with whitespaces only";
        }
    } else {
        $error1 = "Fertilizer Name is required";
    }

    if (!empty($_POST['weight'])) {
        if(preg_match('(^[0-9]*$)',$_POST['weight'])){
            $weight = Add_Input($_POST['weight']);
        }else{
            $error4 = "Invalid input! weight must be number only";
        }
    } else {
        $error4 = "weight is required";
    }

    if (!empty($_POST['available'])) {
        if(preg_match('(^[0-9]*$)',$_POST['available'])){
            $available = Add_Input($_POST['available']);
        }else{
            $error4 = "Invalid input! availability must be number only";
        }
    } else {
        $error4 = "Availability is required";
    }
    
    if(empty($_POST['fertilizername']) && empty($_POST['weight']) && empty($_POST['available'])){
        $errorinserting = "Some fields required input";
    }else{
        $addfertil = "INSERT INTO fertilizers(fertilizer_name,material_used,available,numbers_npk,net_weight,distributed,date_created)
        VALUES ('{$fertilizer_name}','{$material}','{$available}','{$npk}','{$weight}',0,'{$Date}')";

        if($connect_db->query($addfertil) === True){
            mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('fertilizer has been updated in record','{$Time}','{$Date}')");
            header("Location:fertilizer.php?id=$ID");
        }else{
            $errorinsert = "Error 1".mysqli_error($connect_db);
        }
    }
}
?>