<?php
include ("config.php");
$searchS = $_GET['term'];
    $query = $connect_db->query("SELECT * FROM seeds WHERE plant_name LIKE '%".$searchS."%'");

    $sData = array();
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $data['id'] = $row['seed_id'];
            $data['value'] = $row['plant_name'];
            array_push($sData,$data);
        }
    }else{
        echo json_encode("No data found");
    }
    echo json_encode($sData);
?>