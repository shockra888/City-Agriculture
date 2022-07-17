<?php
include "config.php";
$output = '';

if(isset($_POST['search'])){
    $Searchtxt = $_POST['search'];
    $req = mysqli_query($connect_db,"SELECT * FROM archieve_farmer_data WHERE Surname LIKE '%$Searchtxt%' OR Firstname LIKE '%$Searchtxt%'");
}else{
    $req = mysqli_query($connect_db,"SELECT * FROM archieve_farmer_data");
}

if(mysqli_num_rows($req) > 0){

        while($row = mysqli_fetch_array($req)){
            $rec_datecreate = date($row['Date_created']);
            $oldC_timestamp = strtotime($rec_datecreate);
            $DateC = date("l, F-j-Y", $oldC_timestamp);

            $output .='<tr class="tr2">
                <td class="td1">'.$row['ReferenceControlNo'].'</td>
                <td class="td1">'.$row['Surname'].'</td>
                <td class="td1">'.$row['Firstname'].'</td>
                <td class="td1">'.$row['Middlename'].'</td>
                <td class="td1"><a class="btn btn-danger" data-primary="'.$row['id'].'"  data-id="'.$row['u_id'].'" onCLick="confirmRestore(this);"><i style="color:white">Restore</i></a></td>
                <td class="td1">'.$DateC.'</td>
                </tr>';
        }

        echo $output;
    }else{
        echo "<h4>Record Not Exist</h4>";
    }
?>