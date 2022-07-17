<?php
include "config.php";
/*$output = ''; 
if(isset($_POST['search']) && isset($_POST['page'])){
    $pagenum = $_POST['page'];
        if($pagenum=="" || $pagenum=="1"){
            $page1 = 0;
        }else{
            $page1 = ($pagenum*5)-5;
        }
    $Searchtxt = $_POST['search'];
    $req = mysqli_query($connect_db,"SELECT * FROM farmer_data WHERE Barangay LIKE '%$Searchtxt%' OR Surname LIKE '%$Searchtxt%' OR Firstname LIKE '%$Searchtxt%' LIMIT $page1,5");

}else{
    $pagenum = $_POST['page'];
    if($pagenum=="" || $pagenum=="1"){
        $page1 = 0;
    }else{
        $page1 = ($pagenum*5)-5;
    }
    $req = mysqli_query($connect_db,"SELECT * FROM farmer_data LIMIT $page1,5");
}
if(mysqli_num_rows($req) > 0){
    while($row = mysqli_fetch_array($req)){
        $output .='<tr>
            <td class="td1">'.$row['ReferenceControlNo'].'</td>
            <td class="td1">'.$row['Surname'].'</td>
            <td class="td1">'.$row['Firstname'].'</td>
            <td class="td1">'.$row['Middlename'].'</td>
            <td class="td1">'.$row['Barangay'].'</td>
            <td class="btn1"><a class="btn btn-danger" href="viewFarmer.php?id='.$row['u_id'].'"><i>View</i></a></td>
            <td class="btn1"><a class="btn btn-danger" data-primary="'.$row['id'].'"  data-id="'.$row['u_id'].'" onCLick="confirmDelete(this);"><i style="color:white">Archive</i></a></td>
            </tr>';
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
   $searchQuery = " and (Surname like '%".$searchValue."%' or 
   Firstname like '%".$searchValue."%' or 
   Barangay like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from farmer_data");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from farmer_data WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select *,farm_land.tot_farm_area from farmer_data,farm_land WHERE farmer_data.u_id = farm_land.u_id ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connect_db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "ReferenceControlNo"=>$row['ReferenceControlNo'],
      "Surname"=>$row['Surname'],
      "Firstname"=>$row['Firstname'],
      "Middlename"=>$row['Middlename'],
      "Barangay"=>$row['Barangay'],
      "tot_farm_area"=>$row['tot_farm_area'],
      "u_id"=>$row['u_id'],
      "u_id"=>$row['u_id']
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