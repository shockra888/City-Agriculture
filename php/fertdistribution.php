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
    $Farmerid = $fertid = $Ucount = $Remarks ="";
    $fertid = $_POST['fertid'];
    $Farmerid =  $_POST['farmerid'];
    $Remarks = Dist_Input($_POST['Remarks']);
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");

    if(empty($_POST['Ucount'])){
        $errorcount = "No empty";
    }else{
        if(preg_match('(^[0-9]*$)',$_POST['Ucount'])){
            $Ucount = Dist_Input($_POST['Ucount']);
        }else{
            $errorcount = "Numeric number";
        }
    }

    $distribute = "INSERT INTO distribute_fertilizer(farmer_id,fertilizer_name,material_used,numbers_npk,net_weight) SELECT farmer_data.u_id, fertilizers.fertilizer_name, fertilizers.material_used,
    fertilizers.numbers_npk, fertilizers.net_weight FROM farmer_data,fertilizers WHERE farmer_data.u_id = $Farmerid AND fertilizers.fertilizer_id = $fertid";

    if($connect_db->query($distribute) === True){
        $last_id = $connect_db->insert_id;
        
        $distup = "UPDATE distribute_fertilizer SET fertilizer_count = '$Ucount', remarks = '$Remarks', date_distributed = '$Date' WHERE distribution_id = '$last_id'";

        if($connect_db->query($distup) === True){
            $increase = "UPDATE fertilizers SET distributed = distributed + '$Ucount' where fertilizer_id = '$fertid'";
            if($connect_db->query($increase) === True){
                $decrease = "UPDATE fertilizers SET available = available - '$Ucount' where fertilizer_id = '$fertid'";
                if($connect_db->query($decrease) === True){
                    mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Fertilizer has been distributed','{$Time}','{$Date}')");
                    header("Location:fertilizer.php?id=$UID");
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