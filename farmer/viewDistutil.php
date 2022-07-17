<?php
    require_once("../php/config.php");
    $result = mysqli_query($connect_db, "SELECT * FROM admin_account ORDER BY admin_id Asc");
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] = $res['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:index.php");
        exit();
    }

    $utilid = $_GET['id'];

    $dutil = mysqli_query($connect_db,"SELECT * FROM distribute_utility WHERE distribution_id = $utilid");
    $distutil = mysqli_fetch_array($dutil);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/viewDist.css" type="text/css"> 
    <title>View Distributed Equpment</title>
</head>
<body>
<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
</nav>

<div class="container Cform">
    <div class="card shadow bg-white rounded">
        <div class="card-header bg-danger">
            <div class="row">
                <div class="col-md">
                    <h5 class="ttle">View Distributred Equipment</h5>
                </div>
                <div class="col-md">
                    <a class="btn btn-outline-warning" href="viewFarmer.php?id=<?php echo $_GET['fid']; ?>">Back</a>
                </div>
            </div>
        </div>
        <div class ="card-body">
            <div class="jumbotron">
                <table class="table">
                    <thead class="thead bg-danger text-white">
                        <tr>
                            <th>Description</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Category: </td>
                            <td id="catt"><?php echo $distutil['category']; ?></td>
                        </tr>
                        <tr>
                            <td>Utility Name: </td>
                            <td><?php echo $distutil['utility_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Type: </td>
                            <td id="ttype"><?php echo $distutil['type']; ?></td>
                        </tr>
                        <tr id="typetract">
                            <td>Tractor Type: </td>
                            <td><?php echo $distutil['tractor_type']; ?></td>
                        </tr>
                        <tr id="chtype">
                            <td>Combine or harvester type </td>
                            <td><?php echo $distutil['CH_type']; ?></td>
                        </tr>
                        <tr id="atttype">
                            <td>Attachment Type: </td>
                            <td><?php echo $distutil['Attachment_type']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/FarmerRegValidation.js"></script>
</html>