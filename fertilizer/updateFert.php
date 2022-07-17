<?php
    require_once("../php/session.php");
    require_once "../php/updatefert.php";
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

    $fetchfert = mysqli_query($connect_db,"SELECT * FROM fertilizers WHERE fertilizer_id = '$IDN'");
    $fert = mysqli_fetch_array($fetchfert);
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
    <title>Update Fertilizer</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
                <h5>Update Fertilizer</h5>
            </div>
            <div class="card-body">
                <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registration" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <h6>Fertilizer Name</h6>
                            <input type="text" id="fertilizername" name="fertilizername" class="form-control" placeholder="Fertilizer Name" value="<?php echo $fert['fertilizer_name']?>">
                            <p class="fertilnameError"></p>
                        </div>            
                        <div class="form-group">
                            <h6>Net Weight</h6>
                            <input type="hidden" name="Lid" value="<?php echo $_SESSION['id']; ?>">
                            <input type="hidden" name="SID" value="<?php echo $IDN; ?>">
                            <input type="text" id="weight" name="weight" class="form-control" placeholder="Net Weight (g)" value="<?php echo $fert['net_weight']?>">
                            <p class="weightError"></p>
                        </div>
                        <div class="form-group">
                            <h6>Available count</h6>
                            <input type="text" id="favailable" name="available" class="form-control" placeholder="Available count" value="<?php echo $fert['available']?>">
                            <p class="favailableError"></p>
                        </div>              
                </div>
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Update this fertilizer?</h4>
                            </div>
                            <div class="modal-footer">        
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                        <a class="btn btn-secondary" href="fertilizer.php?=<?php echo $_SESSION['id']; ?>">Back</a>
                        <button type="button" id="btn-fert" class="btn btn-danger btn-up" data-toggle="modal" data-target="#AddModal">Update</button>
                </div>
            </form>
         </div>
    </div>

    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
        <p><?php echo $errorinsert; ?></p>
    </nav>

</body>
<<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/FarmerRegValidation.js"></script>
</html>