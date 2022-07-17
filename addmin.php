<?php
include ('php/config.php');

//data validation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function test_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $usernanme = $passowerd = "";

    if (empty($_POST['username'])) {
        $error = "Username is required";
    } else {
        $username = test_Input($_POST['username']);
    }

    if (empty($_POST['password'])) {
        $error1 = "Password is required";
    } else {
        $password = test_Input($_POST['password']);
        $encrypt = sha1($password);
    }

    if(!empty($username) && (!empty($encrypt))){
         $result = "INSERT into admin_account(username,password) VALUES ('{$username}', '{$encrypt}')";

         if ($connect_db->query($result) === TRUE) {
            header("Location:index.php?=Success");
        } else {
            $error4 = "error";
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
    <title>Register</title>
</head>
<body>
    <center>
        <div class="container">
            <img class="Alogo" src="css/Assets/images/logo.png" alt="Logo">
            <img class="toplogo" alt="logo" src="Assets/images/toplogo.png">
            <form role="form" class="Pform" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span?><?php echo $error; ?></span>
                </div><br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span?><?php echo $error1; ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Register admin</button>
                    <span?><?php echo $error4; ?></span>
                </div>
            </form>
        </div>
    </center>
</body>
<script src="source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
</html>