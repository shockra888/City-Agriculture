<?php
include ("config.php");
$searchF = $_GET['term'];
    $query = $connect_db->query("SELECT * FROM fertilizers WHERE fertilizer_name LIKE '%".$searchF."%'");

    $sData = array();
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $data['id'] = $row['fertilizer_id'];
            $data['value'] = $row['fertilizer_name'];
            array_push($sData,$data);
        }
    }else{
        echo json_encode("No data found");
    }
    echo json_encode($sData);
?>