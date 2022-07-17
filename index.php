<?php
require_once "php/config.php";

SESSION_START();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_Input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    $Username = test_input($_POST['username']);
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("h:i:s");

    if (!preg_match("(^[a-zA-Z0-9_]*$)", $Username)) {
        ?>
        <script src="source/jquery-3.6.0/cdn-jquery.js"></script>
       <script lang="javascript" type="text/javascript">
            $(document).ready(function () {
                $('#modalErr1').modal('show');
            });
        </script>
    <?php
    } else {
        $Password = test_input($_POST["password"]);
        //hashing password to sha1
        $encrypt = sha1($Password);

        //finding data to database
        $query = mysqli_query($connect_db, "select * from `admin_account` where username='$Username' and password='$encrypt'");

        if (mysqli_num_rows($query) == 0) {
            $log = mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Admin Is trying to log in','{$Time}','{$Date}')");
            ?>
            <script src="source/jquery-3.6.0/cdn-jquery.js"></script>
            <script lang="javascript" type="text/javascript">
                $(document).ready(function () {
                    $('#modalErr').modal('show');
                });
            </script>
            <?php
        } else {
            $row = mysqli_fetch_array($query);
            if ($row['password'] == $encrypt) {
                $log = mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Admin Is Logged in','{$Time}','{$Date}')");
                if ($log === TRUE){
                    $_SESSION['id'] = $row['admin_id'];
                    header("Location:admin_menu.php?=$_SESSION[id]");
                }else{
                   $err = mysqli_error($connect_db);
                }
                
            } else {
                $error2 = "Failed! No record found";
            }
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
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Log In</title>
</head>
<body>
    <div class="container-fluid conts">
        <div class="jumbotron jumbs shadow bg-white rounded" >
            <div class="row">
                <div class="col-md col2">
                    <div class="container conts1">
                        <center>
                        <img class="toplogo" src="css/logo.png">
                        <img class="Alogo" src="css/toplogo.png">
                        </center>
                        <form role="form" method="POST" class="Pform" action="<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete="off">
                            <div class="form-group">
                                <input type="Text" name="username" class="form-control" id="InputUsername" aria-describedby="emailHelp" placeholder="Enter Username" x-webkit-speech>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password">
                            </div>
                            <center>
                            <button type="submit" class="btn btn-secondary btn-login">Log In</button><br>
                            <a name="txt" type="text" id="respas" href="passreset.php">Forgot Password?</a>
                            <p><?php echo $err; ?></p>
                            </center>
                        </form>
                    </div>
                </div>
                <span class="border-left"></span>
                <div class="col-md col1">
                    <center>
                    <img class="DAlogo" src="css/DA.png">
                    </center>
                    <img class="farmer" src="css/f.jpg">                  
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalErr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Log in Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Wrong credentials entered</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalErr1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Log in Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Invalid username</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript">
        window.history.forward();

        $(document).ready(function(){
            $("#respas").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        txt: $(this).text()
                    }
                });
            });
        });
</script>
</html>
