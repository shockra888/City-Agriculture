<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    function Dist_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $UID = $_POST['uid'];
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");
    $Farmerid = $utilid = $Count = $Remarks ="";
    $utilid = $_POST['utilid'];
    $Farmerid =  $_POST['farmerid'];
    $Remarks = Dist_Input($_POST['Remarks']);

    if(empty($_POST['Count'])){
        $errorcount = "No empty";
    }else{
        if(preg_match('(^[0-9]*$)',$_POST['Count'])){
            $Count = Dist_Input($_POST['Count']);
        }else{
            $errorcount = "Numeric number";
        }
    }

    $distribute = "INSERT INTO distribute_utility(farmer_id,category,type,tractor_type,CH_type,Attachment_type,utility_name) SELECT farmer_data.u_id, utilities.category, utilities.type,
    utilities.tractor_type, utilities.CH_type, utilities.Attachment_type, utilities.utility_name FROM farmer_data,utilities WHERE farmer_data.u_id = $Farmerid AND utilities.utility_id = $utilid";

    if($connect_db->query($distribute) === True){
        $last_id = $connect_db->insert_id;
        
        $distup = "UPDATE distribute_utility SET utility_count = '$Count', remarks = '$Remarks', date_distributed = '$Date' WHERE distribution_id = '$last_id'";

        if($connect_db->query($distup) === True){
            $increase = "UPDATE utilities SET distribute = distribute + '$Count' where utility_id = '$utilid'";
            if($connect_db->query($increase) === True){
                $decrease = "UPDATE utilities SET availability = availability - '$Count' where utility_id = '$utilid'";
                if($connect_db->query($decrease) === True){
                    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Equipment has been distributed','{$Time}','{$Date}')");
                    header("Location:utillities.php?id=$UID");
                }else{
                    $disterror = "Error4".mysqli_error($connect_db);
                }
            }else{
                $disterror = "Error3".mysqli_error($connect_db);
            }
        }else{
            $disterror = "Error2".mysqli_error($connect_db);
        }

    }else{
        $disterror = "Error1".mysqli_error($connect_db);
    }
}
?>