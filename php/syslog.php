<?php
include_once "config.php";

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
   $searchQuery = " and (t_activity like '%".$searchValue."%' or 
   t_date like '%".$searchValue."%')";
}

## Total number of records without filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from transaction_logs");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connect_db,"select count(*) as allcount from transaction_logs WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from transaction_logs where 1".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connect_db, $empQuery);
$data = array();
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
while ($row = mysqli_fetch_assoc($empRecords)) {
   $rec_log = date($row['t_date']);
   $oldB_timestamp = strtotime($rec_log);
   $logdate = date("l, F-j-Y", $oldB_timestamp);

   $logDateTime = $row['t_time'];
   $newDateTime = date('h:i A', strtotime($logDateTime));

   $data[] = array( 
      "t_activity"=>$row['t_activity'],
      "t_time"=>$newDateTime,
      "t_date"=>$logdate,
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