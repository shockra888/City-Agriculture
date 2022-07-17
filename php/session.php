<?php
    include('config.php');
	session_start();
	
    //check if user session id is matched to the database user id
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header("Location:index.php");
    exit();
	}else{
        $sq=mysqli_query($connect_db,"select * from `admin_account` where admin_id='".$_SESSION['id']."'");
	    $srow=mysqli_fetch_array($sq);
	    $user=$srow['username'];
    }
?>
