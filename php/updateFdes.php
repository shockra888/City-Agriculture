<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function Reg_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $ARB = $LandLocation = $OwnerDocNo = $Ownership = $TenantownerName = $LesseeownerName = $OtherOwner = ""; 
    $FID = $_POST['Lid'];
    $OID = $_POST['Iid'];

    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");
    $fsDate = date('Y-m-d', strtotime("+6 months", strtotime($Date))); 

    if(!empty($_POST['ARB'])){
        if(strcasecmp($_POST['ARB'],'Yes') == 0 || strcasecmp($_POST['ARB'],'yes') == 0){
            $ARB = Reg_Input($_POST['ARB']);
        }else{
            $ARB = "No";
        }
    }else{
        $Error = "This field is required";
    }

    if (!empty($_POST['location'])) {
        if(preg_match('(^[a-zA-Z\/s]*$)',$_POST['location'])){
            $LandLocation = Reg_Input($_POST['location']);
        }else{
            $Error1 = "Invalid Input";
        }
    } else {
        $Error1 = "This field is required";
    }

    if (!empty($_POST['OwnerDoc'])) {
        if(preg_match('(^[0-9]*$)',$_POST['OwnerDoc'])){
            $OwnerDocNo = Reg_Input($_POST['OwnerDoc']);
        }else{
            $Error2 = "Owner Document No. must be numbers only";
        }
    } else {
        $Error2 = "Owner Document No. is required";
    }

    if(!empty($_POST['ownership'])){
        if(strcasecmp($_POST['ownership'],"Tenant")==0){
            $TenantownerName = Reg_Input($_POST['tenant']);
        }else if(strcasecmp($_POST['lessee'],"Lessee")==0){
            $LesseeownerName = Reg_Input($_POST['lessee']);
        }else if(strcasecmp($_POST['otherowner'],"Others")==0){
            $OtherOwner = Reg_Input($_POST['otherowner']);
        }else{
            $Ownership = Reg_Input($_POST['ownership']);
        }
    }else{
        $Error3 ="This field is required";
    }

    $UpdateDes = mysqli_query($connect_db,"UPDATE farm_land SET ARB = '$ARB', location = '$LandLocation', ownership_docNo = '$OwnerDocNo',
    Ownership = '$Ownership', tenant_landOwnname = '$TenantownerName', lessee_landOwnername	= '$LesseeownerName', otherowner = '$OtherOwner' WHERE id = $OID");

    if($UpdateDes === TRUE){
        $uptsched = mysqli_query($connect_db,"UPDATE farmer_data SET update_sched = '$fsDate' WHERE u_id = '$FID'");

        if($uptsched === TRUE){
            mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Land description has been modified','{$Time}','{$Date}')");
            header("Location:viewFarmer.php?id=$FID");
        }else{
            $err = "Error2".mysqli_error($connect_db);
        }
    }else{
        $err = "Error".mysqli_error($connect_db);
    }
}