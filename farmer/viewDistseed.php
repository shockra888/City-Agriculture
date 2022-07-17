<?php
    require_once("../php/config.php");
    $result = mysqli_query($connect_db, "SELECT * FROM admin_account ORDER BY admin_id Asc");
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] = $res['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:index.php");
        exit();
    }

    $seedid = $_GET['id'];

    $dseed = mysqli_query($connect_db,"SELECT * FROM distribute_seed WHERE distribution_id = $seedid");
    $distseed = mysqli_fetch_array($dseed);
    
    $old_date = date($distseed['expiration_date']);
    $old_timestamp = strtotime($old_date);
    $expdate = date("l F-j-Y", $old_timestamp);
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
    <title>View Distributed Fertilizer</title>
</head>
<body>
<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
</nav><br>

<div class="container Cform">
    <div class="card shadow bg-white rounded">
        <div class="card-header bg-danger">
            <div class="row">
                <div class="col-md">
                    <h5 class="ttle">View Distributred Seed</h5>
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
                            <td>Plant Name: </td>
                            <td><?php echo $distseed['plant_name']; ?></td>
                        </tr>
                        <tr>
                            <td>GMO?: </td>
                            <td><?php echo $distseed['GMO']; ?></td>
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
</html>