<?php
    include("php/session.php");
    $result = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] =  $res['admin_id'];

    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:index.php");
        exit();
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
    <link href='source/datatables/datatables.min.css' rel='stylesheet' type='text/css'>
    <link href='source/datatables/Buttons-2.1.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" type="text/css" href="css/menunew.css">
    <title>System Logs</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <center>
                <img class="imgbar" src="css/logo.png">
                </center>
            </div>
            <ul class="list-unstyled components">
                <li>
                <a class="tlink active" href="farmer/farmerrecord.php?=<?php echo $_SESSION['id'];?>">Farmers</a>
                    <a class="tlink" href= "seed/seeds.php?=<?php echo $_SESSION['id']; ?>" >Available Seeds</a>
                    <a class="tlink" href= "fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Available Fertilizers</a>
                    <a class="tlink" href= "utilities/utillities.php?=<?php echo $_SESSION['id']; ?>" >Equipments</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" href="Data_Bin/bins.php?=<?php echo $_SESSION['id'];?>">Archives</a>
                    <a class="tlink"href="distributions/disthistory.php?=<?php echo $_SESSION['id']; ?>">Distributions</a>
                    <a class="tlink"href="sys_log.php?=<?php echo $_SESSION['id']; ?>">System Logs</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" href="logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="container">
                        <a class= "navbar-brand ml2" href= "admin_menu.php?=<?php echo $_SESSION['id']; ?>"> AC | Agriculture Record Management</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="alert alert-danger">
                <div class="row">
                        <div class="col-sm-5">
                            <h4>System Logs</h4>
                        </div>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table id="logtable" class="display dataTable">
                            <thead class="thead bg-danger text-white ">
                                <tr>
                                    <th>Activity</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="source/datatables/datatables.min.js"></script>
<script src="source/datatables/Buttons-2.1.1/js/dataTables.buttons.min.js"></script>
<script src="source/datatables/Buttons-2.1.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('#logtable').DataTable({
        'processing': true,
        'serverSide': true,
        'responsive': true,
        'searching': true,
        'serverMethod': 'post',
        'ajax': {
        'url':'php/syslog.php'
        },
        "order": [1, 'desc'],
        'columnDefs': [{
            'targets': [0,1,2],
            'orderable': false,
        }],
        'columns': [
            { data: 't_activity' },
            { data: 't_time' },
            { data: 't_date' }
        ],
    });
});
</script>
</html>