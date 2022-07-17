<?php
include "config.php";
/*$output = '';

if(isset($_POST['search'])){
    $Searchtxt = $_POST['search'];
    $req = mysqli_query($connect_db,"SELECT * FROM fertilizers WHERE fertilizer_name LIKE '%$Searchtxt%'");
}else{
    $req = mysqli_query($connect_db,"SELECT * FROM fertilizers");
}

if(mysqli_num_rows($req) > 0){

        while($row = mysqli_fetch_array($req)){
            $FID = $row['fertilizer_id'];
            if($row['available']==="0" ||$row['available']===0 || $row['available']===""){
                $upav = "UPDATE fertilizers SET distributed = 0";

                if ($connect_db->query($upav) === TRUE){
                    $Movefert = "INSERT INTO fertilizer_archieve SELECT * FROM fertilizers WHERE fertilizer_id = $FID";
                    if($connect_db->query($Movefert)===TRUE){
                        $delRec ="DELETE FROM fertilizers WHERE fertilizer_id = $FID";
                        if ($connect_db->query($delRec) === TRUE){
                            header("Location../fertilizer/fertilizer.php");
                        }else{
                            echo "Error3".mysqli_error($connect_db);
                        }
                    }else{
                        echo "Error2".mysqli_error($connect_db);
                    }
                }else{
                    echo "Error1".mysqli_error($connect_db);
                }
            }else{
            $output .='<tr class="tr2" style="text-align:center">
                <td class="td1">'.$row['fertilizer_name'].'</td>
                <td class="td1">'.$row['net_weight'].' kg</td>
                <td class="td1">'.$row['available'].'</td>
                <td class="td1"><a class="btn btn-danger" href="distributeFert.php?id='.$row['fertilizer_id'].'"><i>Distribute</i></a></td>
                <td class="td1"><a class="btn btn-danger" href="../fertilizer/updateFert.php?id='.$row['fertilizer_id'].'">Update</a>
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
   $searchQuery = " and (fertilizer_name like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from fertilizers");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from fertilizers WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from fertilizers WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connect_db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {

    $FID = $row['fertilizer_id'];
    if($row['available']==="0" ||$row['available']===0 || $row['available']===""){
        $upav = "UPDATE fertilizers SET distributed = 0";

        if ($connect_db->query($upav) === TRUE){
            $Movefert = "INSERT INTO fertilizer_archieve SELECT * FROM fertilizers WHERE fertilizer_id = $FID";
            if($connect_db->query($Movefert)===TRUE){
                $delRec ="DELETE FROM fertilizers WHERE fertilizer_id = $FID";
                if ($connect_db->query($delRec) === TRUE){
                    header("Location../fertilizer/fertilizer.php");
                }else{
                    mysqli_error($connect_db);
                }
            }
        }
    }

   $data[] = array( 
      "fertilizer_name"=>$row['fertilizer_name'],
      "net_weight"=>$row['net_weight'],
      "available"=>$row['available'],
      "distributed"=>$row['distributed'],
      "fertilizer_id"=>$row['fertilizer_id'],
      "fertilizer_id"=>$row['fertilizer_id']
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