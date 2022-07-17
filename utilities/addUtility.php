<?php
    require_once("../php/session.php");
    include_once "../php/addUtil.php";
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="../css/addSeed.css">
    <title>Add Utility</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav><br>

<div class="container Cform">
    <div class="card shadow bg-white rounded">
        <div class="card-header bg-danger text-white">
        </div>
        <div class="card-body">
            <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registration" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="input-group addon">
                        <select id="category" name="category" class="form-control">
                            <option><b>Choose Category</b></option>
                            <option value="Farming_vehicle" >Farming Vehicle</option>
                            <option value="Vehicle_attachment">Vehicle Attachment</option>
                        </select>
                    </div>
                    <p class="catError"></p>
                </div>
                <div class="form-group">
                    <h6>Utility name</h6>
                    <input type="text" id="utilname" name="utilityname" class="form-control" placeholder="Enter utility name">
                    <p class="utilError"></p>
                </div>
                <div class="form-group">
                    <h6>Available Count</h6>
                    <input type="text" id="avail" name="available" class="form-control" placeholder="Available count">
                    <p class="availError"></p>
                </div>
                <div class="form-group vehicle">
                    <div class="input-group addon">
                        <select id="veh" class="form-control" name="vehicle">
                            <option><b> vehicle type</b></option>
                            <option value="Tractor">Tractor</option>
                            <option value="Combine_or_Harvester">Combine or harvester</option>
                        </select>
                    </div>
                </div>
                <div class="form-group tractor">
                    <div class="input-group addon">
                        <select class="form-control" name="tractor">
                            <option><b> tractor Type</b></option>
                            <option value="Compact_tractor">Compact Tractor</option></option>
                            <option value ="Wheeled_Tractor">Wheeled Tractor</option>
                            <option value = "Track_Tractor">Track Tractor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group combine">
                    <div class="input-group addon">
                        <select class="form-control" name="combine">
                            <option>Combine or Harvester Type</option>
                            <option value="Reaper">Reaper</option>
                            <option value="Thresher">Thresher</option>
                            <option value="Winnower">Winnower</option>
                        </select>
                    </div>
                </div>
                <div class="form-group attach">
                    <div class="input-group addon">
                        <select class="form-control" name="attach">
                            <option><b> Attachment Type</b></option>
                            <option value="Plow">Plow</option></option>
                            <option Value="Harrow">Harrow</option>
                            <option value="Fertilizer_spreader">Fertilizer Spreader</option>
                            <option value="seeder">Seeders</option>
                            <option value="Wagon">Wagon</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="utillities.php?=<?php echo $_SESSION['id']; ?>"class="btn btn-secondary">Back</a>
                <button type="button" id="btn-util" class="btn btn-danger btn-up" data-toggle="modal" data-target="#AddModal">Add</button>
            </div>
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Add</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Add this Utility?</h4>
                            </div>
                            <div class="modal-footer">        
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
</div>

    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
        <p><?php echo $errorinsert; ?></p>
    </nav>

</body>

<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/FarmerRegValidation.js"></script>
</html>