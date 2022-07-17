<?php
include ("config.php");
$searchU = $_GET['term'];
    $query = $connect_db->query("SELECT * FROM utilities WHERE utility_name LIKE '%".$searchU."%'");

    $sData = array();
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $data['id'] = $row['utility_id'];
            $data['value'] = $row['utility_name'];
            array_push($sData,$data);
        }
    }else{
        echo json_encode("No data found");
    }
    echo json_encode($sData);
?>