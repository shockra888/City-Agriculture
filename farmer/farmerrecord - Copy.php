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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="../css/menunew.css">
    <title>Farmer Record</title>
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
                    <a class="tlink"href="farmerrecord.php?=<?php echo $_SESSION['id'];?>">Farmers</a>
                    <a class="tlink" href= "../seed/seeds.php?=<?php echo $_SESSION['id']; ?>" >Available Seeds</a>
                    <a class="tlink" href= "../fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Available Fertilizers</a>
                    <a class="tlink" href= "../utilities/utillities.php?=<?php echo $_SESSION['id']; ?>" >Equipments</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" href="../Data_Bin/bins.php?=<?php echo $_SESSION['id'];?>">Archives</a>
                    <a class="tlink"href="../distributions/disthistory.php?=<?php echo $_SESSION['id']; ?>">Distributions</a>
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
                        <div class="col-sm2">
                            <form method="post" class="form-inline my-2 my-lg-0">
                                <select id="Search1" type="search" name="Search" class="form-control">
                                    <option disabled>Select Barangay</option> 
                                    <option value="Alos" selected>Alos</option> 
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
                                <input class="form-control" id="Search" type="search" name="Search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                        <div class="col-sm">
                            <a href="addFarmer.php?=<?php echo $_SESSION['id']; ?>" class="btn btn-danger text-white" type="button" id="buttoni">Add Farmer</a>
                        </div>
                        <div class="col-sm">
                            <button class="btn btn-outline-danger" onclick="printDiv('printThis')">Print Record</button>
                        </div>
                        <div class="col-sm">
                            <a href="unlockupdate.php?=<?php echo $_SESSION['id']; ?>" class="btn btn-danger text-white" type="button" id="buttoni">Need update</a>
                        </div>
                    </div>
                </div>
                    <?php
                        $recount = mysqli_query($connect_db,"SELECT * FROM farmer_data");
                        $count = mysqli_num_rows($recount);
                        $a = $count/3;
                                
                        for($b = 1; $b<=$a; $b++){
                            echo '<ul class="pagination" style="display:inline-block;">
                                <li class="page-item"><a class="page-link" href="farmerrecord.php?page='.$b.'"> '.$b.'</a></li>
                                </ul>';        
                        }

                        $pageno = $_GET['page'];
                    ?>
                <div id="printThis">
                    <div class="container printcont">
                        <div class="d-flex flex-wrap justify-content-around" id="header">
                        <img class="doclogo" src="../css/logo.png">
                            <center>
                            <h4>List of Farmers</h4>
                            </center>
                            <img class="doclogo1" src="../css/doa.png">
                        </div>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead bg-danger">
                                <tr>
                                    <th scope="col">Reference/Control No.</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Middle name</th>
                                    <th scope="col">Barangay</th>
                                    <th colspan="2" scope="col"><!--LeaveEmpty--></th>
                                </tr>
                            </thead>
                            <tbody id="searchResult">
                            </tbody>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div id="MyModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Archive Confirmation</h4>
                </div>
                <div class=" modal-body">
                    <h4 class="modal-title">Do you want to Archive this record?</h4>
                </div>
                <form method="GET" action="../php/delete.php" id="delete-farmer">
                    <input type="hidden" name="id">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="delete-farmer" class="btn btn-danger">Hide</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>ry.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
        function confirmDelete(self) {
            var id = self.getAttribute("data-id");
            document.getElementById("delete-farmer").id.value = id;
            $("#MyModal").modal("show");
        }

        function printDiv(printThis){
            $(".btn1").hide();
            $(".printcont").show();
            $(".thead").css("color","black");
            var printContents = document.getElementById("printThis").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            if(window.print()==true){
                location.reload(true);
            }else{
                location.reload(true);
            }
            document.body.innerHTML = originalContents;
        }
        $(document).ready(function () {
            $(".thead").css("color","white");
            $(".printcont").hide();
            $("#Search1").on('click',function(){
                var barangay = $("#Search1").val();
                $("#bar").text(barangay);
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            load_data();
            function load_data(query,pages){
                $.ajax({
                    url:"../php/search.php",
                    method:"post",
                    data:{
                        search:query,
                        page:pages
                    },
                    success:function(data){
                        $("#searchResult").html(data);
                    }
                });
            }
            $('#Search').keyup(function(){
                var searchData = $(this).val();
                var pages = "<?php echo $pageno ?>";
                if(searchData != ''){
                    load_data(searchData,pages);
                }else{
                    load_data();
                }
            });

            $('#Search1').on('click',function(){
                var searchData = $(this).val();
                var pages = "<?php echo $pageno ?>";
                if(searchData != ''){
                    load_data(searchData,pages);
                }else{
                    load_data();
                }
            });
        });
    </script>
</html>