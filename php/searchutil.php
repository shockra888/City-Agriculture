<?php
include "config.php";
/*$output = '';

if(isset($_POST['search']) || isset($_POST['search1'])){
    $Searchtxt = $_POST['search'];
    $req = mysqli_query($connect_db,"SELECT * FROM utilities WHERE utility_name LIKE '%$Searchtxt%' OR category LIKE '%$Searchtxt%'");
}else{
    $req = mysqli_query($connect_db,"SELECT * FROM utilities");
}

if(mysqli_num_rows($req) > 0){

        while($row = mysqli_fetch_array($req)){
            $UID = $row['utility_id'];
            if($row['availability']==="0" ||$row['availability']===0){
                $upav = "UPDATE utilities SET distribute = 0";

                if ($connect_db->query($upav) === TRUE){
                    $Moveutil = "INSERT INTO utility_archieve SELECT * FROM utilities WHERE utility_id = $UID";
                    if($connect_db->query($Moveutil)===TRUE){
                        $delRec ="DELETE FROM utilities WHERE utility_id = $UID";
                        if ($connect_db->query($delRec) === TRUE){
                            header("Location../utilities/utillities.php");
                        }else{
                            echo mysqli_error($connect_db);
                        }
                    }else{
                        echo mysqli_error($connect_db);
                    }
                }else{
                    echo mysqli_error($connect_db);
                }
            }else{
            $output .='<tr class="tr2" style="text-align:center">
                <td class="td1">'.$row['category'].'</td>
                <td class="dta-1" data-toggle="tooltip" data-placement="top" data-original-title="'.$row['utility_name'].'" title="'.$row['Attachment_type'].'">'.$row['utility_name'].'</td>
                <td class="td1">'.$row['availability'].'</td>
                <td class="td1" data-toggle="tooltip" data-placement="top" title="'.$row['tractor_type'].''.$row['CH_type'].'">'.$row['type'].'</td>
                <td class="td1"><a class="btn btn-danger" href="distributeutility.php?id='.$row['utility_id'].'"><i>Distribute</i></a></td>
                <td class="td1"><a class="btn btn-danger" href="../utilities/updateutil.php?id='.$row['utility_id'].'">Update</a>
                <td class="td1">'.$row['distribute'].'</td>
                </tr>';
            }
        }

        echo $output;
    }else{
        echo "<h4>Record Not Exist</h4>";
    }*/

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($connect_db,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (utility_name like '%".$searchValue."%' or category like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from utilities");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from utilities WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from utilities WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connect_db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {

    $UID = $row['utility_id'];
    if($row['availability']==="0" ||$row['availability']===0){
        $upav = "UPDATE utilities SET distribute = 0";

        if ($connect_db->query($upav) === TRUE){
            $Moveutil = "INSERT INTO utility_archieve SELECT * FROM utilities WHERE utility_id = $UID";
            if($connect_db->query($Moveutil)===TRUE){
                $delRec ="DELETE FROM utilities WHERE utility_id = $UID";
                if ($connect_db->query($delRec) === TRUE){
                    header("Location../utilities/utillities.php");
                }else{
                     mysqli_error($connect_db);
                }
            }
        }
    }

   $data[] = array( 
      "category"=>$row['category'],
      "utility_name"=>$row['utility_name'],
      "availability"=>$row['availability'],
      "type"=>$row['type'],
      "distribute"=>$row['distribute'],
      "utility_id"=>$row['utility_id'],
      "utility_id"=>$row['utility_id']
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
?>