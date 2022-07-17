<?php
include "config.php";
/*$output = '';

if(isset($_POST['search'])){
    $Searchtxt = $_POST['search'];
    $req = mysqli_query($connect_db,"SELECT * FROM seeds WHERE plant_name LIKE '%$Searchtxt%'");
}else{
    $req = mysqli_query($connect_db,"SELECT * FROM seeds");
}

if(mysqli_num_rows($req) > 0){
        while($row = mysqli_fetch_array($req)){
            $rec_exp = date($row['expiration_date']);
            $oldE_timestamp = strtotime($rec_exp);
            $expire = date("l, F-j-Y", $oldE_timestamp);
            $SID = $row['seed_id'];
            if($row['available']==="0" ||$row['available']===0){
                $upav = "UPDATE seeds SET distributed = 0";

                if ($connect_db->query($upav) === TRUE){
                    $Moveseed = "INSERT INTO seed_archieve SELECT * FROM seeds WHERE seed_id = $SID";
                    if($connect_db->query($Moveseed)===TRUE){
                        $delRec ="DELETE FROM seeds WHERE seed_id = $SID";
                        if ($connect_db->query($delRec) === TRUE){
                            header("Location../seed/seeds.php");
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
                <td class="td1">'.$row['plant_name'].'</td>
                <td class="td1">'.$row['available'].'</td>
                <td class="td1">'.$row['GMO'].'</td>
                <td class="td1"><a class="btn btn-danger" href="../seed/distributeSeed.php?id='.$row['seed_id'].'"><i>Distribute</i></a></td>
                <td class="td1"><a class="btn btn-danger" href="../seed/updateSeed.php?id='.$row['seed_id'].'">Update</a>
                <td class="td1">'.$row['distributed'].'</td>
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
   $searchQuery = " and (plant_name like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from seeds");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from seeds WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from seeds WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connect_db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $SID = $row['seed_id'];
    if($row['available']==="0" ||$row['available']===0){
        $upav = "UPDATE seeds SET distributed = 0";

        if ($connect_db->query($upav) === TRUE){
            $Moveseed = "INSERT INTO seed_archieve SELECT * FROM seeds WHERE seed_id = $SID";
            if($connect_db->query($Moveseed)===TRUE){
                $delRec ="DELETE FROM seeds WHERE seed_id = $SID";
                
                if ($connect_db->query($delRec) === TRUE){
                    header("Location../seed/seeds.php");
                }else{
                    echo mysqli_error($connect_db);
                }

            }
        }
    }

   $data[] = array( 
      "plant_name"=>$row['plant_name'],
      "available"=>$row['available'],
      "GMO"=>$row['GMO'],
      "distributed"=>$row['distributed'],
      "seed_id"=>$row['seed_id'],
      "seed_id"=>$row['seed_id']
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