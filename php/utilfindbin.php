<?php
include "config.php";
$output = '';

if(isset($_POST['search']) || isset($_POST['search1'])){
    $Searchtxt = $_POST['search'];
    $req = mysqli_query($connect_db,"SELECT * FROM utility_archieve WHERE utility_name LIKE '%$Searchtxt%' OR category LIKE '%$Searchtxt%'");
}else{
    $req = mysqli_query($connect_db,"SELECT * FROM utility_archieve");
}

if(mysqli_num_rows($req) > 0){

        while($row = mysqli_fetch_array($req)){
            $rec_datecreate = date($row['date_created']);
            $oldC_timestamp = strtotime($rec_datecreate);
            $DateC = date("l, F-j-Y", $oldC_timestamp);
            $output .='<tr class="tr2" style="text-align:center">
                <td class="td1">'.$row['category'].'</td>
                <td class="dta-1" data-toggle="tooltip" data-placement="top" data-original-title="'.$row['utility_name'].'" title="'.$row['Attachment_type'].'">'.$row['utility_name'].'</td>
                <td class="td1">'.$row['availability'].'</td>
                <td class="td1" data-toggle="tooltip" data-placement="top" title="'.$row['tractor_type'].''.$row['CH_type'].'">'.$row['type'].'</td>
                <td class="td1"><a class="btn btn-danger" data-id="'.$row['utility_id'].'" onCLick="confirmRestore(this);"><i style="color:white">Restore</i></a></td>
                <td class="td1">'.$row['distribute'].'</td>
                <td class="td1">'.$DateC.'</td>
                </tr>';
        }

        echo $output;
    }else{
        echo "<h4>Record Not Exist</h4>";
    }
?>