<?php
include("config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function Reg_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $CropCommodity = $OthercropComm = $Size = $FarmType = $OrganicP = $latitude = $longitude =" ";
    $oid = $_POST['Lid'];
    $iid = $_POST['Iid'];

    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");
    $fsDate = date('Y-m-d', strtotime("+6 months", strtotime($Date))); 

    if (!empty($_POST['cropComm'])) {
        if(preg_match('(^[a-zA-Z\/s]*$)',$_POST['cropComm'])){
            if(strcasecmp($_POST['cropComm'],'Others')==0){
                $CropCommodity = Reg_Input($_POST['cropComm']);
                $OthercropComm = Reg_Input($_POST['othercropComm']);
            }else{
                $CropCommodity = Reg_Input($_POST['cropComm']);
            }
        }else{
            $error1 = "Invalid input!";
        }        
    } else {
        $error1 = "This Field is required";
    }

    if (!empty($_POST['Size'])) {
        if(preg_match('(^[0-9]*$)',$_POST['Size'])){
            $Size = Reg_Input($_POST['Size']);
        }else{
            $error2 = "Size must be numbers only";
        }
    } else {
        $error2 = "Size is required";
    }

    if (!empty($_POST['FarmType'])) {
        if(preg_match('(^[a-zA-Z\s]*$)',$_POST['FarmType'])){
            $FarmType = Reg_Input($_POST['FarmType']);
        }else{
            $error3 = "Invalid input! Farm Type must be letter only";
        }
    } else {
        $error3 = "Farm Type is required";
    }

     if (!empty($_POST['OrganicPractitioner'])) {
        if(preg_match('(^[a-zA-Z\s]*$)',$_POST['OrganicPractitioner'])){
            $OrganicP = Reg_Input($_POST['OrganicPractitioner']);
        }else{
            $error4 = "Invalid input! Organic Practitioner must be letter only";
        }
    } else {
        $error4 = "Organic Practitioner is required";
    }

    if(preg_match('(^[-?\d+(\.\d+)?]+$)',$_POST['lati'])){
        $latitude = Reg_Input($_POST['lati']);
    }else{
        $errorlat = "Input must be Map Coordinate format";
    }

    if(preg_match('(^[-?\d+(\.\d+)?]+$)',$_POST['longi'])){
        $longitude = Reg_Input($_POST['longi']);
    }else{
        $errorlong = "Input must be Map Coordinate format";
    }
    $upland = mysqli_query($connect_db,"UPDATE land_parcel SET Crop_commodity = '$CropCommodity', others = '$OthercropComm', size_ha = '$Size', farm_type = '$FarmType', organic_practitioner = '$OrganicP', latitude = '$latitude', longitude = '$longitude' WHERE id = '$iid'");

    if($upland === True){
        $uptsched = mysqli_query($connect_db,"UPDATE farmer_data SET update_sched = '$fsDate' WHERE u_id = '$oid'");

        if($uptsched === TRUE){
            mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Land parcel has been modified','{$Time}','{$Date}')");
            header("Location:viewFarmer.php?id=$oid");
        }else{
            $err = "Error2".mysqli_error($connect_db);
        }
    }
}
?>