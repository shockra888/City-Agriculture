<?php
    require_once("../php/session.php");
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
    <title class="tit">Farmer Record</title>
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
                    <a class="tlink" id="farmertxt" href="farmerrecord.php?=<?php echo $_SESSION['id'];?>">Farmers</a>
                    <a class="tlink" id="seedtxt" href= "../seed/seeds.php?=<?php echo $_SESSION['id']; ?>" >Available Seeds</a>
                    <a class="tlink"  id="ferttxt" href= "../fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Available Fertilizers</a>
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
                        <div class="col-sm-2">
                            <h4>Farmers</h4>
                        </div>
                        <div class="col-sm">
                            <a id="addftxt" href="addFarmer.php?=<?php echo $_SESSION['id']; ?>" class="btn btn-danger text-white" type="button" id="buttoni">Add Farmer</a>
                        </div>                      
                        <div class="col-sm">
                            <a id="uptneed" href="unlockupdate.php?=<?php echo $_SESSION['id']; ?>" class="btn btn-danger text-white" type="button" id="buttoni">Need update</a>
                        </div>
                    </div>
                </div>
                    <div class="Barangay-filter">
                        <select id="BarangayFilter" class="form-control">
                            <option value="" selected>...</option>
                            <option value="Alos">Alos</option> 
                            <option value="Amandiego">Amandiego</option> 
                            <option value="Amangbangan">Amangbangan</option> 
                            <option value="Balangobong">Balangobong</option> 
                            <option value="Balayang">Balayang</option> 
                            <option value="Bisocol">Bisocol</option>
                            <option value="Bolaney">Bolaney</option>
                            <option value="Baleyadaan">Baleyadaan</option>
                            <option value="Bued">Bued</option>
                            <option value="Cabatuan">Cabatuan</option>
                            <option value="Cayucay">Cayucay</option>
                            <option value="Dulacac">Dulacac</option>
                            <option value="Inerangan">Inerangan</option>
                            <option value="Landoc">Landoc</option>
                            <option value="Linmansangan">Linmansangan</option>
                            <option value="Lucap">Lucap</option>
                            <option value="Maawi">Maawi</option>
                            <option value="Macatiw">Macatiw</option>
                            <option value="Magsaysay">Magsaysay</option>
                            <option value="Mona">Mona</option>
                            <option value="Palamis">Palamis</option>
                            <option value="Pandan">Pandan</option>
                            <option value="Pangapisan">Pangapisan</option>
                            <option value="Poblacion">Poblacion</option>
                            <option value="Pocal-Pocal">Pocal-Pocal</option>
                            <option value="Pogo">Pogo</option>
                            <option value="Polo">Polo</option>
                            <option value="Quibuar">Quibuar</option>
                            <option value="Sabangan">Sabangan</option>
                            <option value="San Antonio">San Antonio</option>
                            <option value="San Jose">San Jose</option>
                            <option value="San Roque">San Roque</option>
                            <option value="San Vicente">San Vicente</option>
                            <option value="Santa Maria">Santa Maria</option>
                            <option value="Tanaytay">Tanaytay</option>
                            <option value="Tangcarang">Tangcarang</option>
                            <option value="Tawintawin">Tawintawin</option>
                            <option value="Telbang">Telbang</option>
                            <option value="Victoria">Victoria</option>
                        </select>
                    </div>
                    <table id="Farmtable" class="dataTable">
                        <thead class="thead bg-danger">
                            <tr>
                                <th>Ref/Ctrl No.</th>
                                <th>Surname</th>
                                <th>First name</th>
                                <th>Middle name</th>
                                <th>Barangay</th>
                                <th>Total Farm Area</th>
                                <th>Action</th>
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
            $(".thead").css("color","white");

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            function confirmDelete(self) {
                    var id = self.getAttribute("data-id");
                    document.getElementById("delete-farmer").id.value = id;
                    $("#MyModal").modal("show");
                }

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

            $("#addftxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        addftxt: $(this).text()
                    }
                })
            });

            $("#uptneed").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        uptneed: $(this).text()
                    }
                })
            });

            $("#viewf").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        viewf: $(this).text()
                    }
                })
            });

            $("#btnprint").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "../php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        btnprint: $(this).text()
                    }
                })
            });

        });

        });

        $(document).ready(function(){
            $("select").on('change',function(){
                var barangay = $(this).val();
                $(".dataTables_filter input").val(barangay);
                $(".dataTables_filter input").keyup();
            });
                $('#Farmtable').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'searching': true,
                    'serverMethod': 'post',
                    'ajax': {
                        'url':'../php/search.php'
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
                                columns: [ 0, 1, 2 , 3,4,5 ]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'List of Farmers',
                            attr:{id:'btnprint', class:'btn btn-danger'},
                            exportOptions:{
                                columns: [ 0, 1, 2,3,4,5 ]
                            }
                        }
                    ],
                    
                    'columns': [
                        { data: 'ReferenceControlNo' },
                        { data: 'Surname' },
                        { data: 'Firstname' },
                        { data: 'Middlename' },
                        { data: 'Barangay' },
                        { data: 'tot_farm_area',render : function(data,type,full){
                            if(data != ''){
                                return  data + ' Square Meter';
                            }else{
                                return  'No land';
                            }
                             }},
                        { data: 'u_id',
                            render : function(data,type,full){
                            return '<a class="btn btn-danger" id="viewf" href=viewFarmer.php?id=' + data + '>' + 'View' + '</a>';
                        }}
                    ],
                });
            });
    </script>
</html>