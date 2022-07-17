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
    $CropCommodity = $OthercropComm = $Size = $FarmType = $OrganicP = $latitude = $longitude =  " ";
    $ID = $_POST['Lid'];

    if (!empty($_POST['cropComm'])) {
        if(preg_match('(^[a-zA-Z\/s]*$)',$_POST['cropComm'])){
            if(strcasecmp($_POST['cropComm'],'Others')==0){
                $CropCommodity = Add_Input($_POST['cropComm']);
                $OthercropComm = Add_Input($_POST['othercropComm']);
            }else{
                $CropCommodity = Add_Input($_POST['cropComm']);
            }
        }else{
            $error1 = "Invalid input!";
        }        
    } else {
        $error1 = "This Field is required";
    }

    if (!empty($_POST['Size'])) {
        if(preg_match('(^[0-9]*$)',$_POST['Size'])){
            $Size = Add_Input($_POST['Size']);
        }else{
            $error2 = "Size must be numbers only";
        }
    } else {
        $error2 = "Size is required";
    }

    if (!empty($_POST['FarmType'])) {
        if(preg_match('(^[a-zA-Z\s]*$)',$_POST['FarmType'])){
            $FarmType = Add_Input($_POST['FarmType']);
        }else{
            $error3 = "Invalid input! Farm Type must be letter only";
        }
    } else {
        $error3 = "Farm Type is required";
    }

     if (!empty($_POST['OrganicPractitioner'])) {
        if(preg_match('(^[a-zA-Z\s]*$)',$_POST['OrganicPractitioner'])){
            $OrganicP = Add_Input($_POST['OrganicPractitioner']);
        }else{
            $error4 = "Invalid input! Organic Practitioner must be letter only";
        }
    } else {
        $error4 = "Organic Practitioner is required";
    }

    if(preg_match('(^[-?\d+(\.\d+)?]+$)',$_POST['lati'])){
        $latitude = Add_Input($_POST['lati']);
    }else{
        $errorlat = "Input must be Map Coordinate format";
    }

    if(preg_match('(^[-?\d+(\.\d+)?]+$)',$_POST['longi'])){
        $longitude = Add_Input($_POST['longi']);
    }else{
        $errorlong = "Input must be Map Coordinate format";
    }
    
    if(empty($_POST['cropComm']) && empty($_POST['Size']) && empty($_POST['FarmType']) && empty($_POST['OrganicPractitioner'])){
        $errorinsert = "Some fields required input";
    }else{
        $addland = "INSERT INTO land_parcel(u_id,NoofFarmParcel,Crop_commodity,others,size_ha,farm_type,organic_practitioner,latitude,longitude)
        VALUES ('{$ID}',1,'{$CropCommodity}','{$OthercropComm}','{$Size}','{$FarmType}','{$OrganicP}','{$latitude}','{$longitude}')";

        if($connect_db->query($addland) === True){
            mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Land parcel has been added to farmer','{$Time}','{$Date}')");
            header("Location:viewFarmer.php?id=$ID");
        }else{
            $errorinsert = "Error 1".mysqli_error($connect_db);
        }
    }
}
?>