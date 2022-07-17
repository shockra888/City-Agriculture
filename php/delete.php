<?php
require_once("session.php");
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("H:i:s");
$id = $_GET['id'];

    if($id==0){
        $msg =  "Unable_to_delete_this_record";
        header("Location:farmer/farmerrecord.php?=$msg");
    }else{

    $MoveFarmerRec = "INSERT INTO archieve_farmer_data SELECT * FROM farmer_data WHERE u_id = $id";

    if ($connect_db->query($MoveFarmerRec) === TRUE){
        $includeLand = "INSERT INTO archieve_farm_land SELECT id,u_id,ARB,location,tot_farm_area,ownership_docNo,Ownership,tenant_landOwnname,lessee_landOwnername,otherowner FROM farm_land WHERE u_id = $id";
        if ($connect_db->query($includeLand) === TRUE){
            $include_farmP = "INSERT INTO archieve_farm_profile SELECT id,u_id,Main_Livelihood,type_ofFarmingAct,othercrops_specify,kind_ofwork,other_specify,farming_income,non_farming FROM farm_profile WHERE u_id = $id";
            if ($connect_db->query($include_farmP) === TRUE){
                $include_landP = "INSERT INTO archieve_land_parcel SELECT id,u_id,NoofFarmParcel,Crop_commodity,others,size_ha,farm_type,organic_practitioner,latitude,longitude FROM land_parcel WHERE u_id = $id";
                if ($connect_db->query($include_landP) === TRUE){
                    $delRec ="DELETE FROM farmer_data WHERE u_id = $id";
                    if($connect_db->query($delRec) === TRUE){
                        mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Farmer record has been archived','{$Time}','{$Date}')");
                        header("Location:../farmer/farmerrecord.php");
                    }else{
                        echo "Error5".mysqli_error($connect_db);
                    }                  
                }else{
                    echo "Error4".mysqli_error($connect_db);
                }
            }else{
                echo "Error3".mysqli_error($connect_db);
            }
        }else{
            echo "Error2".mysqli_error($connect_db);
        }      
    }else{
        echo "Error1".mysqli_error($connect_db);
    }
}

?>
