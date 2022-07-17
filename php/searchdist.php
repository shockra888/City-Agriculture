<?php
include "config.php";
$output = '';

    if(isset($_POST['search'])){
        $Searchtxt = $_POST['search'];
        $req = mysqli_query($connect_db,"SELECT farmer_data.u_id, farmer_data.Surname, farmer_data.Firstname, distribute_seed.farmer_id, distribute_seed.date_distributed, distribute_seed.plant_name, distribute_seed.seed_count FROM farmer_data INNER JOIN distribute_seed ON distribute_seed.farmer_id = farmer_data.u_id WHERE distribute_seed.date_distributed LIKE '%$Searchtxt%' AND (farmer_data.Surname LIKE '%$Searchtxt%' OR farmer_data.Firstname LIKE '%$Searchtxt%')"); 
    }else{
        $req = mysqli_query($connect_db,"SELECT distribute_seed.plant_name, distribute_seed.seed_count, distribute_seed.date_distributed, farmer_data.Surname, farmer_data.Firstname , farmer_data.Middlename FROM farmer_data, distribute_seed WHERE distribute_seed.farmer_id = farmer_data.u_id ORDER BY distribute_seed.date_distributed DESC");
    }
    
    if(mysqli_num_rows($req) > 0){
    
        while($row = mysqli_fetch_array($req)){
            $rec_datecreate = date($row['date_distributed']);
            $oldC_timestamp = strtotime($rec_datecreate);
            $DateC = date("l, F-j-Y", $oldC_timestamp);
            $output .='<tr class="tr2">
                <td class="td1">'.$DateC.'</td>
                <td class="td1">'.$row['Surname'].", ".$row['Firstname']." ".$row['Middlename'].'</td>
                <td class="td1">'."Seed".'</td>
                <td class="td1">'.$row['plant_name'].'</td>
                <td class="td1">'.$row['seed_count'].'</td>
                </tr>';
        }
    
            echo $output;
        }else{
            echo "<h4>Record Not Exist</h4>";
        }
?>