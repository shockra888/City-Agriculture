<?php
    require_once("../php/session.php");
    include "../php/farmerProfile.php";
    include "../php/updateFdes.php";
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    //this is where we get the session and compare it to identify the user is
    //logged in if not it will be redirected to the homepage
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:index.php");
        exit();
    }
    $IDN = $_GET['id'];
    $OID = $_GET['Fid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="../css/LandUpdate.css">
    <title>Update Land Parcel</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav><br>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
                <h5>Update Land Description</h5>
            </div>
            <div class="card-body">
                <p class="errorM"><?php echo $field_error; ?></p>
                <form role="form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="FormValidation" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <h6>Agrarian Reform Beneficiary</h6>
                        <input type="text" name="ARB" class="form-control" placeholder="ARB" value="<?php echo $ARB; ?>">
                    </div>
                    <div class="form-group">
                        <h6>Location</h6>
                        <input type="text" name="location" class="form-control" placeholder="Location" value="<?php echo $LandLocation ?>">
                    </div>
                    <div class="form-group">
                        <h6>Ownership Document Number</h6>
                        <input type="text" name="OwnerDoc" class="form-control" placeholder="Owner document No." value="<?php echo $docno ?>">
                    </div>
                    <div class="form-group">
                        <h6>Ownership</h6>
                        <input type="text" id="own" name="ownership" class="form-control" placeholder="Ownership" value="<?php echo $Ownership; ?>">
                        <p class="ownth1"></p>
                    </div>
                    <div class="form-group" id="ten">
                        <h6>If Tenant</h6>
                        <input type="text" name="tenant" class="form-control" placeholder="if ownership is tenant" value="<?php echo $TenantownerName; ?>">
                    </div>
                    <div class="form-group" id="les" >
                        <h6>If Lessee</h6>
                        <input type="text" name="lessee" class="form-control" placeholder="if ownership is Lessee" value="<?php echo $LesseeownerName; ?>">
                    </div>
                    <div class="form-group" id="ownth" >
                        <h6>If Others</h6>
                        <input type="text" name="otherowner" class="form-control" placeholder="if ownership is Others" value="<?php echo $OtherOwner; ?>">
                    </div>
            </div>
            <div class="modal fade" id="LUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Update this Land Description</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <a class="btn btn-secondary btn-back" href="viewFarmer.php?id=<?=$id?>">Cancel</a>
                            </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" name="Lid" value="<?php echo $id ?>">
                            <input type="hidden" name="Iid" value="<?php echo $OID ?>">
                            <button type="button" class="btn btn-danger btn-up" data-toggle="modal" data-target="#LUpdateModal">Update</button>
                        </div>
                    </div>
                </div>
            </form>
         </div>
    </div>

    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
        <p class="errorM"><?php echo $err; ?></p>
    </nav>
</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/FarmerRegValidation.js"></script>?
</html>