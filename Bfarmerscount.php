<?php
    include("php/session.php");
    $result = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] =  $res['admin_id'];

    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:index.php");
        exit();
    }
    $FetchFarmerData = mysqli_query($connect_db, "SELECT * From farm_data");
    $Fcount = mysqli_query($connect_db, "SELECT COUNT(u_id) FROM farmer_data");
    $FarmerCount = mysqli_fetch_array($Fcount);

    $Scount = mysqli_query($connect_db, "SELECT COUNT(seed_id) FROM seeds");
    $SeedCount = mysqli_fetch_array($Scount);

    $Fertcount = mysqli_query($connect_db, "SELECT COUNT(fertilizer_id) FROM fertilizers");
    $FertilCount = mysqli_fetch_array($Fertcount);

    $utilcount = mysqli_query($connect_db, "SELECT COUNT(utility_id) FROM utilities");
    $utcount = mysqli_fetch_array($utilcount);
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
     <link rel="stylesheet" type="text/css" href="css/menunew.css">
    <title>Menu</title>
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
                    <a class="tlink"href="farmer/farmerrecord.php?=<?php echo $_SESSION['id'];?>">Farmers</a>
                    <a class="tlink" href= "seed/seeds.php?=<?php echo $_SESSION['id']; ?>" >Seeds</a>
                    <a class="tlink" href= "fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Fertilizers</a>
                    <a class="tlink" href= "utilities/utillities.php?=<?php echo $_SESSION['id']; ?>" >Utilities</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" href="Data_Bin/bins.php?=<?php echo $_SESSION['id'];?>">Archives</a>
                    <a class="tlink"href="distributions/disthistory.php?=<?php echo $_SESSION['id']; ?>">Distributions</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" href="logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
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
                        <a class= "navbar-brand ml2" href= "admin_menu.php?=<?php echo $_SESSION['id']; ?>"> AC | Agriculture Record Management</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="alert alert-danger">
                    <div class="row">
                        <div class="col-md">
                            <h4>Farmer Population</h4>
                        </div>
                        <div class="col-md">
                            <form method="POST" class="form-inline my-2 my-lg-0">
                                <input class="form-control" id="Search" type="search" name="Search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table">
                    <thead class="thead bg-danger text-white">
                        <tr>
                            <th colspan="5">Barangay</th>
                            <th>Farmer Population</th>
                        </tr>
                    </thead>
                    <tbody id="searchBarRes">
                        
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
<script src="source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            load_data();
            function load_data(query){
                $.ajax({
                    url:"php/BarangayCount.php",
                    method:"post",
                    data:{searchB:query},
                    success:function(data){
                        $("#searchBarRes").html(data);
                    }
                });
            }
            $('#Search').keyup(function(){
                var searchData1 = $(this).val();

                if(searchData1 != ''){
                    load_data(searchData1);
                }else{
                    load_data();
                }
            });
        });
    </script>
</html>