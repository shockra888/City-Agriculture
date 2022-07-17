<?php
include "config.php";
$output = ''; 
if(isset($_POST['search'])){
    $Searchtxt = $_POST['search'];
    $req = mysqli_query($connect_db,"SELECT * FROM farmer_data WHERE Barangay LIKE '%$Searchtxt%' OR Surname LIKE '%$Searchtxt%' OR Firstname LIKE '%$Searchtxt%'");
}else{ 
    $req = mysqli_query($connect_db,"SELECT * FROM farmer_data");
}

if(mysqli_num_rows($req) > 0){
    $Date = date("Y-m-d");
        while($row = mysqli_fetch_array($req)){
                $distf_date1 = date($row['update_sched']);
                $oldf_timestamp1 = strtotime($distf_date1);
                $distdate1 = date("l, F-j-Y", $oldf_timestamp1);

                $mod = strtotime($row['update_sched']);
                $mod1 = strtotime($Date);
                if($mod1 >= $mod){
                    $output .='<tr>
                        <td class="td1">'.$row['ReferenceControlNo'].'</td>
                        <td class="td1">'.$row['Surname'].'</td>
                        <td class="td1">'.$row['Firstname'].'</td>
                        <td class="td1">'.$row['Middlename'].'</td>
                        <td class="td1">'.$row['Barangay'].'</td>
                        <td class="btn1"><a class="btn btn-danger" id="viewf" href="viewFarmer.php?id='.$row['u_id'].'"><i>View</i></a></td>
                        <td class="btn1"><a class="btn btn-danger" data-primary="'.$row['id'].'"  data-id="'.$row['u_id'].'" onCLick="confirmDelete(this);"><i style="color:white">Archive</i></a></td>
                        </tr>';
                }
        }
        echo $output;
    }else{
        echo "<h4>Record Not Exist</h4>";
    }

?>