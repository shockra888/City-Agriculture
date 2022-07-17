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
    $sid = $_POST['SID'];

    $fertilizer_name = $material = $npk = $weight = $fcrop = $available = "";
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
    

    $uptfertil = "UPDATE fertilizers SET fertilizer_name = '$fertilizer_name',material_used = '$material',available = '$available',numbers_npk = '$npk',net_weight = '$weight' WHERE fertilizer_id = '$sid'";

    if($connect_db->query($uptfertil) === True){
        mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Fertilizer has been modified','{$Time}','{$Date}')");
        header("Location:fertilizer.php?id=$ID");
    }else{
        $errorinsert = "Error 1".mysqli_error($connect_db);
    }
}
?>