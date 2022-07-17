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
    $seedid = $_POST['seedid'];
    $Farmerid =  $_POST['farmerid'];
    $Remarks = Dist_Input($_POST['Remarks']);

    echo json_encode($seedCounter);

        if(empty($_POST['Scount'])){
            $errorcount = "Not empty";
        }else{
            if(preg_match('(^[0-9]*$)',$_POST['Scount'])){
                $Scount = Dist_Input($_POST['Scount']);
            }else{
                $errorcount = "Numeric number";
            }
        }

        $distribute = "INSERT INTO distribute_seed(farmer_id,plant_name,GMO) SELECT farmer_data.u_id, seeds.plant_name, seeds.GMO FROM farmer_data,seeds WHERE farmer_data.u_id = $Farmerid AND seeds.seed_id = $seedid";

        if($connect_db->query($distribute) === True){
            $last_id = $connect_db->insert_id;
            
            $distup = "UPDATE distribute_seed SET seed_count = '$Scount', remarks = '$Remarks', date_distributed = '$Date' WHERE distribution_id = '$last_id'";

            if($connect_db->query($distup) === True){
                $increase = "UPDATE seeds SET distributed = distributed + '$Scount' where seed_id = '$seedid'";
                if($connect_db->query($increase) === True){
                    $decrease = "UPDATE seeds SET available = available - '$Scount' where seed_id = '$seedid'";
                    if($connect_db->query($decrease) === True){
                        mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('A seed has been distributed','{$Time}','{$Date}')");
                        header("Location:seeds.php?id=$UID");
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