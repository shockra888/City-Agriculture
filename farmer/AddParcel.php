<?php
    require_once("../php/session.php");
    include "../php/addLandparcel.php";
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    //this is where we get the session and compare it to identify the user is
    //logged in if not it will be redirected to the homepage
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }
    $IDN = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="../css/Addparcel.css">
    <title>Add Parcel</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
                <h4>Add Land Parcel</h4>
            </div>
            <div class="card-body">
                <p class="errorM"><?php echo $field_error; ?></p>
                <form role="form" method="POST" id="addparcel" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="FormValidation" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <h6>Crop Commodity</h6>
                        <input type="text" id="cropcom" name="cropComm" class="form-control" placeholder="Crop Commodity" value="<?php echo $res['Crop_commodity']; ?>">
                        <p class="cropcomError"></p>
                    </div>
                    <div class="form-group" id="oth">
                        <h6>if other crop commodity</h6>
                        <input type="text" id="othercropcom" name="othercropComm" class="form-control" placeholder="if other crop commodity" value="<?php echo $res['others']; ?>">
                        <p class="othercropcomError"></p>
                    </div>
                    <div class="form-group">
                        <h6>Size (Hectare)</h6>
                        <input type="text" id="Size" name="Size" class="form-control" placeholder="Size (hectare)" value="<?php echo $res['size_ha']; ?>">
                        <p class="SizeError"></p>
                    </div>
                    <div class="form-group">
                        <h6>Farm Type</h6>
                        <input type="text" id="Farmtype" name="FarmType" class="form-control" placeholder="Farm Type" value="<?php echo $res['farm_type']; ?>">
                        <p class="FarmtypeError"></p>
                    </div>
                    <div class="form-group">
                        <h6>Organic Practitioner</h6>
                        <input type="text" id="orgpra" name="OrganicPractitioner" class="form-control" placeholder="Organic Practitioner" value="<?php echo $res['organic_practitioner']; ?>">
                        <p class="orgpracError"></p>
                    </div>
                    <div class="form-group">
                        <h6>Map Latitude</h6>
                        <input type="text" id="lati" name="lati" class="form-control" placeholder="Latitude">
                        <p class="latError"><?php echo $errorlat; ?></p>
                    </div>
                    <div class="form-group">
                        <h6>Map Longitude</h6>
                        <input type="text" id="longi" name="longi" class="form-control" placeholder="Longitude">
                        <p class="longError"><?php echo $errorlong; ?></p>
                    </div>
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
                            <h4>Add Land Parcel?</h4>
                        </div>
                        <div class="modal-footer">        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <a class="btn btn-secondary btn-back" href="viewFarmer.php?id=<?=$IDN?>">Cancel</a>
                            </div>
                        <div class="form-group col-md-7">
                            <input type="hidden" name="Lid" value="<?php echo $IDN ?>">
                            <button type="button" id="btn-add" class="btn btn-danger btn-up" data-toggle="modal" data-target="#AddModal">Add</button>
                        </div>
                    </div>
                </div>
            </form>
         </div>
    </div>

    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
        <p class="errorM"><?php echo $errorinsert; ?></p>
    </nav>
</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/FarmerRegValidation.js"></script>?
</html>