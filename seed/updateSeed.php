<?php
    require_once("../php/session.php");
    include_once "../php/updateseed.php";
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

    $findseed = mysqli_query($connect_db,"SELECT * FROM seeds WHERE seed_id = $IDN");
    $seed = mysqli_fetch_array($findseed);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="XUA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="../css/addSeed.css">
    <title>Update Seed</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav><br>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white ">
                <h5>Update Seed</h5>
            </div>
            <div class="card-body">
                <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registration" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <h6>Plant Name</h6>
                        <input type="text" id="plantname" name="plantname" class="form-control" placeholder="Plant Name" value="<?php echo $seed['plant_name'] ?>">
                        <p class="plantnameError"></p>
                    </div>
                    <div class="form-group">
                        <h6>Available Count</h6>
                        <input type="text" id="available" name="available" class="form-control" placeholder="Available Count" value="<?php echo $seed['available'] ?>">
                        <p class="availableError"></p>
                    </div>
                    <div class="form-group">
                        <h6>Genetically modified?</h6>
                        <input type="hidden" name="SID" value="<?php echo $IDN; ?>">
                        <input type="text" name="gmo" class="form-control" placeholder="GMO" value="<?php echo $seed['GMO'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="Lid" value="<?php echo $_SESSION['id']; ?>">
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
                            <h4>Update this Seed?</h4>
                        </div>
                        <div class="modal-footer">        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                    <a class="btn btn-secondary" href="seeds.php?=<?php echo $_SESSION['id']; ?>">Back</a>
                    <button type="button" id="btn-seed" class="btn btn-danger btn-up" data-toggle="modal" data-target="#AddModal">Update</button>
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