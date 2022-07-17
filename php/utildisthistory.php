<?php
include "config.php";
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
   Barangay like'%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from farmer_data,distribute_utility where farmer_data.u_id = distribute_utility.farmer_id");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from farmer_data,distribute_utility WHERE farmer_data.u_id = distribute_utility.farmer_id ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from farmer_data,distribute_utility where farmer_data.u_id = distribute_utility.farmer_id".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connect_db, $empQuery);
$data = array();
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
while ($row = mysqli_fetch_assoc($empRecords)) {
   $rec_log = date($row['date_distributed']);
   $oldB_timestamp = strtotime($rec_log);
   $logdate = date("l, F-j-Y", $oldB_timestamp);
   $data[] = array( 
      "date_distributed"=>$logdate,
      "ReferenceControlNo"=>$row['ReferenceControlNo'],
      "Firstname"=>$row['Firstname'],
      "Surname"=>$row['Surname'],
      "Barangay"=>$row['Barangay'],
      "utility_name"=>$row['utility_name'],
      "utility_count"=>$row['utility_count']
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