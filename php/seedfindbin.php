<?php
include "config.php";
$output = '';

    if(isset($_POST['search'])){
        $Searchtxt = $_POST['search'];
        $req = mysqli_query($connect_db,"SELECT * FROM seed_archieve WHERE plant_name LIKE '%$Searchtxt%'");
    }else{
        $req = mysqli_query($connect_db,"SELECT * FROM seed_archieve");
    }
    
    if(mysqli_num_rows($req) > 0){
    
        while($row = mysqli_fetch_array($req)){
            $rec_datecreate = date($row['date_created']);
            $oldC_timestamp = strtotime($rec_datecreate);
            $DateC = date("l, F-j-Y", $oldC_timestamp);
            $output .='<tr class="tr2">
                <td class="td1">'.$row['plant_name'].'</td>
                <td class="td1">'.$row['available'].'</td>
                <td class="td1">'.$row['GMO'].'</td>
                <td class="td1"><a class="btn btn-danger" data-id="'.$row['seed_id'].'" onCLick="confirmRestore(this);"><i style="color:white">Restore</i></a></td>
                <td class="td1">'.$row['distributed'].'</td>
                <td class="td1">'.$DateC.'</td>
                </tr>';
        }
    
            echo $output;
        }else{
            echo "<h4>Record Not Exist</h4>";
        }
?>