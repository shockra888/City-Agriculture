<?php
    include("../php/session.php");
    $result = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] =  $res['admin_id'];

    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/font-awesome.min.css">
    <link href='../source/datatables/datatables.min.css' rel='stylesheet' type='text/css'>
    <link href='../source/datatables/Responsive-2.2.9/css/responsive.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href='../source/datatables/RowReorder-1.2.8/css/rowReorder.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href='../source/datatables/Buttons-2.1.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" type="text/css" href="../css/menunew.css">
    <title>Distributed seeds</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <center>
                <img class="imgbar" src="../css/logo.png">
                </center>
            </div>
            <ul class="list-unstyled components">
                <li>
                <a class="tlink" id="seedhstxt" href="disthistory.php?=<?php echo $_SESSION['id']; ?>" >Seeds</a>
                    <a class="tlink" id="ferthstxt" href="disthistory1.php?=<?php echo $_SESSION['id']; ?>">Fertilizers</a>
                    <a class="tlink" id="utilhstxt" href="disthistory2.php?=<?php echo $_SESSION['id']; ?>" >Utilities</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" href= "../admin_menu.php?=<?php echo $_SESSION['id']; ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                </li>
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
                        <a class= "navbar-brand ml2" href= "../admin_menu.php?=<?php echo $_SESSION['id']; ?>"> AC | Agriculture Record Management</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="alert alert-danger">
                <div class="row">
                        <div class="col-sm-5">
                            <h4>Distributed | Seeds</h4>
                        </div>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table id="seeddisttable" class="display dataTable">
                            <thead class="thead bg-danger text-white ">
                                <tr>
                                <th>Date Distributed</th>
                                <th>Farmer RefNo</th>
                                <th>Distributed to</th>
                                <th>Surname</th>
                                <th>Barangay</th>
                                <th>Item Name</th>
                                <th>Count</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../source/datatables/datatables.min.js"></script>
<script src="../source/datatables/Buttons-2.1.1/js/dataTables.buttons.min.js"></script>
<script src="../source/datatables/Buttons-2.1.1/js/buttons.print.min.js"></script>
<script src="../source/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="../source/datatables/Buttons-2.1.1/js/buttons.html5.min.js"></script>
<script src="../source/datatables/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
<script src="../source/datatables/RowReorder-1.2.8/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('#seeddisttable').DataTable({
        'processing': true,
        'serverSide': true,
        'responsive': true,
        'searching': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'../php/seeddisthistory.php'
        },
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'excel',
                title: 'Distributed seeds',
                attr:{id:'btnprint', class:'btn btn-danger'},
            },
            {
                extend: 'print',
                title: 'Distributed seeds',
                attr:{id:'btnprint', class:'btn btn-danger'},
            }
        ],
        'columns': [
            { data: 'date_distributed' },
            { data: 'ReferenceControlNo' },
            { data: 'Firstname' },
            { data: 'Surname' },
            { data: 'Barangay' },
            { data: 'plant_name' },
            { data: 'seed_count',render : function(data,type,full){
                return  data + ' Pcs';
            }}
        ],
    });

    $(function(){
        $("#utilhstxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    utilhstxt: $(this).text()
                }
            });
        });
        $("#ferthstxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    ferthstxt: $(this).text()
                }
            });
        });
        $("#seedhstxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    seedhstxt: $(this).text()
                }
            });
        });
    });
});
</script>
</html>