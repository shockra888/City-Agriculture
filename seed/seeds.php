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
    <title>Seeds Record</title>
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
                    <a class="tlink" id="seedtxt" href= "seeds.php?=<?php echo $_SESSION['id']; ?>" >Available Seeds</a>
                    <a class="tlink" id="ferttxt" href= "../fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Available Fertilizers</a>
                    <a class="tlink" id="utiltxt" href= "../utilities/utillities.php?=<?php echo $_SESSION['id']; ?>" >Equipments</a>
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
                        <div class="col-sm-5">
                            <h4>Seeds</h4>
                        </div>
                        <div class="col-sm">
                            <a href="addSeed.php?=<?php echo $_SESSION['id']; ?>" id="addseedtxt" class="btn btn-danger text-white" type="button" id="buttoni">Add Seed</a>
                        </div>
                    </div>
                </div>
                    <table id="Seedtable" class="display dataTable">
                        <thead class="thead bg-danger text-white">
                            <tr>
                                <th>Plant_name</th>
                                <th>Available</th>
                                <th>GMO</th>
                                <th>Distributed</th>
                                <th>Action</th>
                                <th> </th>
                            </tr>
                        </thead>
                    </table>
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
                    $("#addseedtxt").on('click',function(){
                        var txt = $(this).text();             
                        console.log(txt);
                        $.ajax({
                            url: "../php/log_process.php",
                            type: "POST",
                            dataType: "html",
                            data:{
                                addseedtxt: $(this).text()
                            }
                        })
                    });

                    $("#printseed").on('click',function(){
                        var txt = $(this).text();             
                        console.log(txt);
                        $.ajax({
                            url: "../php/log_process.php",
                            type: "POST",
                            dataType: "html",
                            data:{
                                printseed: $(this).text()
                            }
                        })
                    });
                    $("#distseedtxt").on('click',function(){
                        var txt = $(this).text();             
                        console.log(txt);
                        $.ajax({
                            url: "../php/log_process.php",
                            type: "POST",
                            dataType: "html",
                            data:{
                                distseedtxt: $(this).text()
                            }
                        })
                    });
                    $("#uptseedtxt").on('click',function(){
                        var txt = $(this).text();             
                        console.log(txt);
                        $.ajax({
                            url: "../php/log_process.php",
                            type: "POST",
                            dataType: "html",
                            data:{
                                uptseedtxt: $(this).text()
                            }
                        })
                    });

                });

                $('#Seedtable').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'searching': true,
                    'serverMethod': 'post',
                    'ajax': {
                        'url':'../php/searchseed.php'
                    },
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    responsive: true,
                    dom: 'lBfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            attr:{id:'printexc', class:'btn btn-danger'},
                            exportOptions:{
                                columns: [ 0, 1, 2 ]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'List of Seeds',
                            attr:{id:'printseed', class:'btn btn-danger'},
                            exportOptions:{
                                columns: [ 0, 1, 2 ]
                            }
                        }
                    ],
                    'columns': [
                        { data: 'plant_name' },
                        { data: 'available',render : function(data,type,full){
                            return  data + ' Pcs';
                        }},
                        { data: 'GMO' },
                        { data: 'distributed' ,render : function(data,type,full){
                            return  data + ' Pcs';
                        }},
                        { data: 'seed_id',
                            render : function(data,type,full){
                            return '<a class="btn btn-danger" id="distseedtxt" href=../seed/distributeSeed.php?id='+data+'>' + 'Distribute' +'</a>';
                        }},
                        { data: 'seed_id',
                            render : function(data,type,full){
                            return '<a class="btn btn-danger" id="uptseedtxt" href=../seed/updateSeed.php?id='+ data +'>'+' Update' +'</a>';
                        }}
                    ],
                });

                
        });
    </script>
</html>