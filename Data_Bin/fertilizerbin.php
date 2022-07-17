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
     <link rel="stylesheet" type="text/css" href="../css/menunew.css">
    <title>Fertilizer Archive</title>
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
                <a class="tlink" id="farchive" href="bins.php?=<?php echo $_SESSION['id']; ?>">Farmers Archive</a>
                    <a class="tlink" id="sarchive" href="seedbin.php?=<?php echo $_SESSION['id']; ?>" >Seeds Archive</a>
                    <a class="tlink" id="ffarchive" href="fertilizerbin.php?=<?php echo $_SESSION['id']; ?>">Fertilizers Archive</a>
                    <a class="tlink" id="uarchive" href="utilitybin.php?=<?php echo $_SESSION['id']; ?>" >Utilities Archive</a>
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
                            <h4>Fertilizer | Archive</h4>
                        </div>
                        <div class="col-sm">
                            <form method="post" class="form-inline my-2 my-lg-0">
                                <input class="form-control" id="Search" type="search" name="Search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead bg-danger text-white">
                                <tr>
                                <tr style="text-align:center">
                                    <th scope="col">Fertilizer Name</th>
                                    <th scope="col">Net weight</th>
                                    <th scope="col">Available</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Distributed</th>
                                    <th scope="col">Date Created</th>
                                </tr>
                            </thead>
                            <tbody id="searchres">
                                
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div id="MyModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Restore Confirmation</h4>
                </div>
                <div class=" modal-body">
                    <h4 class="modal-title">Do you want to restore this record?</h4>
                </div>
                <form method="GET" action="../php/recoverfert.php" id="restore-fertilizer">
                    <input type="hidden" name="id">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="restore-fertilizer" class="btn btn-danger">Restore</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
    function confirmRestore(self) {
            var id = self.getAttribute("data-id");

            document.getElementById("restore-fertilizer").id.value = id;
            $("#MyModal").modal("show");

        }
        $(document).ready(function(){
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
            load_data();
            function load_data(query){
                $.ajax({
                    url:"../php/fertfindbin.php",
                    method:"post",
                    data:{search:query},
                    success:function(data){
                        $("#searchres").html(data);
                    }
                });
            }
            $('#Search').keyup(function(){
                var searchData = $(this).val();

                if(searchData != ''){
                    load_data(searchData);
                }else{
                    load_data();
                }
            });

            $(function(){
                $("#farchive").on('click',function(){
                    var txt = $(this).text();             
                    console.log(txt);
                    $.ajax({
                        url: "../php/log_process.php",
                        type: "POST",
                        dataType: "html",
                        data:{
                            farchive: $(this).text()
                        }
                    })
                });
                $("#sarchive").on('click',function(){
                    var txt = $(this).text();             
                    console.log(txt);
                    $.ajax({
                        url: "../php/log_process.php",
                        type: "POST",
                        dataType: "html",
                        data:{
                            sarchive: $(this).text()
                        }
                    })
                });
                $("#ffarchive").on('click',function(){
                    var txt = $(this).text();             
                    console.log(txt);
                    $.ajax({
                        url: "../php/log_process.php",
                        type: "POST",
                        dataType: "html",
                        data:{
                            ffarchive: $(this).text()
                        }
                    })
                });
                $("#uarchive").on('click',function(){
                    var txt = $(this).text();             
                    console.log(txt);
                    $.ajax({
                        url: "../php/log_process.php",
                        type: "POST",
                        dataType: "html",
                        data:{
                            uarchive: $(this).text()
                        }
                    })
                });
            });
        });
    </script>
</html>