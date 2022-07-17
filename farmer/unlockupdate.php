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
     <link rel="stylesheet" type="text/css" href="../css/menunew.css">
    <title>Farmer Record</title>
</head>
<body>
<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
</nav><br>
        <div class="container-fluid upti">
                <div class="alert alert-danger">
                <div class="row">
                        <div class="col-sm-4">
                            <h4>Farmers need to update</h4>
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
                            <a href="farmerrecord.php?=<?php echo $_SESSION['id']; ?>" class="btn btn-danger text-white" type="button" id="buttoni">Back</a>
                        </div>
                    </div>
                </div>
                <div id="printThis">
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
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
        function confirmDelete(self) {
            var id = self.getAttribute("data-id");
            document.getElementById("delete-farmer").id.value = id;
            $("#MyModal").modal("show");
        }

        $(document).ready(function () {
            $(".thead").css("color","white");

            load_data();
            function load_data(query){
                $.ajax({
                    url:"../php/needtoupt.php",
                    method:"post",
                    data:{search:query},
                    success:function(data){
                        $("#searchResult").html(data);
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

            $('#Search1').on('click',function(){
                var searchData = $(this).val();

                if(searchData != ''){
                    load_data(searchData);
                }else{
                    load_data();
                }
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
        });
    </script>
</html>