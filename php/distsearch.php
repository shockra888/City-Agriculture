<?php
include ("config.php");
$searchF = $_GET['term'];
    $query = $connect_db->query("SELECT * FROM farmer_data WHERE Firstname LIKE '%".$searchF."%' OR Surname LIKE '%".$searchF."%'");

    $sData = array();
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $data['id'] = $row['u_id'];
            $data['value'] = $row['Firstname']." ".$row['Surname'];
            array_push($sData,$data);
        }
    }else{
        echo json_encode("No data found");
    }
    echo json_encode($sData);
?>