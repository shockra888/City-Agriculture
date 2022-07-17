<?php
    require_once("../php/session.php");
    require_once "../php/updateutil.php";
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }

    $IDN = $_GET['id'];

    $findutil = mysqli_query($connect_db,"SELECT * FROM utilities WHERE utility_id = $IDN");
    $util = mysqli_fetch_array($findutil)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="../css/addUtillity.css">
    <title>Update Utility</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
                <h4>Update Utillity</h4>
            </div>
            <div class="card-body">
                <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registration" enctype="multipart/form-data">
                <div class="form-group">
                <h6>Category</h6>
                    <div class="input-group addon">
                        <select id="category" name="category" class="form-control">
                            <option value="Farming_vehicle" <?php echo $util['category'] == 'Farming_vehicle' ? 'selected' : ''; ?>>Farming Vehicle</option>
                            <option value="Vehicle_attachment" <?php echo $util['category'] == 'Vehicle_attachment' ? 'selected' : ''; ?>>Vehicle Attachment</option>
                        </select>
                    </div>
                    <p class="catError"></p>
                </div>
                <div class="form-group">
                    <h6>Utility name</h6>
                    <input type="text" id="utilname" name="utilityname" class="form-control" placeholder="Enter utility name" value="<?php echo $util['utility_name']?>">
                    <p class="utilError"></p>
                </div>
                <div class="form-group">
                    <h6>Available Count</h6>
                    <input type="text" id="avail" name="available" class="form-control" placeholder="Available count" value="<?php echo $util['availability']?>">
                    <p class="availError"></p>
                </div>
                <div class="form-group vehicle">
                    <div class="input-group addon">
                        <select id="veh" class="form-control" name="vehicle">
                            <option value="Tractor" <?php echo $util['type'] == 'Tractor' ? 'selected' : ''; ?>>Tractor</option>
                            <option value="Combine_or_Harvester" <?php echo $util['type'] == 'Combine_or_Harvester' ? 'selected' : ''; ?>>Combine or harvester</option>
                        </select>
                    </div>
                </div>
                <div class="form-group tractor">
                    <div class="input-group addon">
                        <select class="form-control" name="tractor">
                            <option value="Compact_tractor" <?php echo $util['tractor_type'] == 'Compact_tractor' ? 'selected' : ''; ?>>Compact Tractor</option>
                            <option value ="Wheeled_Tractor" <?php echo $util['tractor_type'] == 'Wheeled_Tractor' ? 'selected' : ''; ?>>Wheeled Tractor</option>
                            <option value = "Track_Tractor" <?php echo $util['tractor_type'] == 'Track_Tractor' ? 'selected' : ''; ?>>Track Tractor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group combine">
                    <div class="input-group addon">
                        <select class="form-control" name="combine">
                            <option value="Reaper" <?php echo $util['CH_type'] == 'Reaper' ? 'selected' : ''; ?>>Reaper</option>
                            <option value="Thresher" <?php echo $util['CH_type'] == 'Thresher' ? 'selected' : ''; ?>>Thresher</option>
                            <option value="Winnower" <?php echo $util['CH_type'] == 'Winnower' ? 'selected' : ''; ?>>Winnower</option>
                        </select>
                    </div>
                </div>
                <div class="form-group attach">
                    <div class="input-group addon">
                        <select class="form-control" name="attach">
                            <option value="Plow" <?php echo $util['Attachment_type'] == 'Plow' ? 'selected' : ''; ?>>Plow</option></option>
                            <option Value="Harrow" <?php echo $util['Attachment_type'] == 'Harrow' ? 'selected' : ''; ?>>Harrow</option>
                            <option value="Fertilizer_spreader" <?php echo $util['Attachment_type'] == 'Fertilizer_spreader' ? 'selected' : ''; ?>>Fertilizer Spreader</option>
                            <option value="seeder" <?php echo $util['Attachment_type'] == 'seeder' ? 'selected' : ''; ?>>Seeders</option>
                            <option value="Wagon" <?php echo $util['Attachment_type'] == 'Wagon' ? 'selected' : ''; ?>>Wagon</option>
                        </select>
                    </div>
                    <input type="hidden" name="utilid" value="<?php echo $IDN;?>">
                    <input type="hidden" name="uid" value="<?php echo $_SESSION['id'];?>">
                </div>
            </div>
        <div class="card-footer">
            <a  href="utillities.php?=<?php echo $_SESSION['id']; ?>l"class="btn btn-secondary">Back</a>
            <button type="button" id="btn-util" class="btn btn-danger" data-toggle="modal" data-target="#AddModal">Update</button>
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
                                    <h4>Update this Utility?</h4>
                                </div>
                                <div class="modal-footer">        
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
</div>

    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
        <p><?php echo $errorinsert; ?></p>
    </nav>

</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/FarmerRegValidation.js"></script>
</html>