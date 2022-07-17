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
    <title>Utility Record</title>
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
                    <a class="tlink" id="farmertxt" href="../farmer/farmerrecord.php?=<?php echo $_SESSION['id'];?>">Farmers</a>
                    <a class="tlink" id="seedtxt" href= "../seed/seeds.php?=<?php echo $_SESSION['id']; ?>" >Available Seeds</a>
                    <a class="tlink" id="ferttxt" href= "../fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Available Fertilizers</a>
                    <a class="tlink" id="utiltxt" href= "utillities.php?=<?php echo $_SESSION['id']; ?>" >Equipments</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" id="archtxt" href="../Data_Bin/bins.php?=<?php echo $_SESSION['id'];?>">Archives</a>
                    <a class="tlink" id="disttxt" href="../distributions/disthistory.php?=<?php echo $_SESSION['id']; ?>">Distributions</a>
                    <a class="tlink" id="syslogtxt" href="../sys_log.php?=<?php echo $_SESSION['id']; ?>">System Logs</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" href="../logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
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
                        <div class="col-sm-3">
                            <h4>Agricultural Equipments</h4>
                        </div>
                        <div class="col-sm">
                        <a href="addUtility.php?=<?php echo $_SESSION['id']; ?>" id="addutiltxt" class="btn btn-danger text-white" type="button" id="buttoni">Add Equipment</a>
                        </div>
                    </div>
                </div>
                    <table id="Utiltable" class="display dataTable">
                        <thead class="thead bg-danger text-white">
                            <tr>
                                <th>Category</th>
                                <th>Utility Name</th>
                                <th>Availability</th>
                                <th>Type</th>
                                <th>Distributed</th>
                                <th>Action</th>
                                <th> </th>
                            </tr>
                        </thead>
                    </table>
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
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            $(document).ready(function(){
                $('#Utiltable').DataTable({
                    'processing': true,
                    'serverSide': true,
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    'responsive': true,
                    'searching': true,
                    'serverMethod': 'post',
                    'ajax': {
                        'url':'../php/searchutil.php'
                    },
                    dom: 'lBfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            attr:{id:'printexc', class:'btn btn-danger'},
                            exportOptions:{
                                columns: [ 0, 1, 2 , 3 ]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'List of Farming Equipments',
                            attr:{id:'printutil', class:'btn btn-danger'},
                            exportOptions:{
                                columns: [ 0, 1, 2,3 ]
                            }
                        }
                    ],
                    'columns': [
                        { data: 'category' },
                        { data: 'utility_name' },
                        { data: 'availability',render : function(data,type,full){
                            return  data + ' Pcs';
                        }},
                        { data: 'type'},
                        { data: 'distribute',render : function(data,type,full){
                            return  data + ' Pcs';
                        }},
                        { data: 'utility_id',
                            render : function(data,type,full){
                            return '<a class="btn btn-danger" id="distutiltxt" href=../utilities/distributeutility.php?id='+data+'>' + 'Distribute' +'</a>';
                        }},
                        { data: 'utility_id',
                            render : function(data,type,full){
                            return '<a class="btn btn-danger" id="utilupdtxt" href=../utilities/updateutil.php?id='+ data +'>'+' Update' +'</a>';
                        }}
                    ],
                });
            });
            $(".dta-1").tooltip();
            $(function(){
            $("#farmertxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        farmertxt: $(this).text()
                    }
                })
            });
            $("#seedtxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        seedtxt: $(this).text()
                    }
                })
            });
            $("#ferttxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        ferttxt: $(this).text()
                    }
                })
            });
            $("#utiltxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        utiltxt: $(this).text()
                    }
                })
            });
            $("#archtxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        archtxt: $(this).text()
                    }
                })
            });

            $("#disttxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        disttxt: $(this).text()
                    }
                })
            });

            $("#syslogtxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        syslogtxt: $(this).text()
                    }
                })
            });

            $("#printutil").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        printutil: $(this).text()
                    }
                })
            });
            $("#addutiltxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        addutiltxt: $(this).text()
                    }
                })
            });
            $("#distutiltxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        distutiltxt: $(this).text()
                    }
                })
            });

            $("#utilupdtxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        utilupdtxt: $(this).text()
                    }
                })
            });

        });
        });
    </script>
</html>