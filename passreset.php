<?php
include("php/config.php");
date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("h:i:s");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    function Res_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $password = $repassword ="";

    $password = Res_Input($_POST['pass']);
    $repassword = Res_Input($_POST['repass']);

    if(empty($_POST['pass']) && empty($_POST['repass'])){
        $emp = "Forms must not be empty";
    }else{
        if($password == $repassword){
            $Fpassword = sha1($repassword);

            $uptpass = "UPDATE admin_account SET password = '$Fpassword' WHERE admin_id = 1";
            if($connect_db->query($uptpass) === True){
                $passred = mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Password has been reset','{$Time}','{$Date}')");
                if($passred === TRUE){
                    header("Location:index.php?Password Reset Successfully");
                }else{
                    mysqli_error($connect_db);
                }
            }else{
                $errorupt = "Error 2".mysqli_error($connect_db);
            }
        }else{
            $errorupt = "Error 1".mysqli_error($connect_db);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="source/bootstrap-4.3.1/dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/resspass.css" type="text/css">
    <title>Reset Password</title>
</head>
<body>
<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
</nav>

<center>
<div class="container conts">
    <div class="card jumbs shadow rounded">
        <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registration" enctype="multipart/form-data">
            <div class="card-header">
                <div class="form-group">
                    <input type="password" class="form-control" id="tokeninput" placeholder="Enter Token">
                    <p class="tokenError"></p>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter Password">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><a class="hp" href="#"><i id="he" class="fa fa-eye"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" name="repass" id="repass" placeholder="Re-Enter Password">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><a class="hp1" href="#"><i id="he1" class="fa fa-eye"></i></a></div>
                        </div>
                    </div>
                    <p class="repassError"><?php echo $emp; ?></p>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary" href="index.php">back</a>
                <button type="button" id="btn-res" class="btn btn-danger" data-toggle="modal" data-target="#Reset">
                    Reset
                </button>
            </div>
            <div class="modal fade" id="Reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Do you want to reset your password?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Reset</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</center>

<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
    <p><?php echo $errorupt; ?></p>
</nav>
</body>
<script src="source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="js/FarmerRegValidation.js"></script>
</html>