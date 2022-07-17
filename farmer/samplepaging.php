<?php
require_once "../php/config.php";

$pagenum = $_GET['page'];
if($pagenum=="" || $pagenum=="1"){
    $page1 = 0;
}else{
    $page1 = ($pagenum*5)-5;
}
$req = mysqli_query($connect_db,"SELECT * FROM farmer_data LIMIT $page1,3");
while($row = mysqli_fetch_array($req)){
    echo $row['u_id']." ".$row['Surname']." ".$row['Firstname'];
    echo "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        $recount = mysqli_query($connect_db,"SELECT * FROM farmer_data");
        $count = mysqli_num_rows($recount);
        $a = $count/3;
        echo $a;
        
        for($b = 1; $b<=$a; $b++){
                echo '<ul class="pagination" style="display:inline-block;">
                    <li class="page-item"><a class="page-link" href="samplepaging.php?page='.$b.'"> '.$b.'</a></li>
                </ul>';        
        }
    ?>
</body>
<script src="js/cdn-jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>