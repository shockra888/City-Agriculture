<?php
    include_once("php/session.php");
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
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="css/Bfcount.css">
    <title>Farmers Count</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
        <img class="Alogo" src="css/Assets/images/logo.png" alt="Logo">
        <a class= "navbar-brand ml2" href= "admin_menu.php?=<?php echo $_SESSION['id']; ?>" > AC | Agriculture Record Management </a>
    </nav><br>

    <div class="container-fluid" id="conts">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Farmers Population</h2>
                </div>
                <div class="col-sm">
                    <form method="POST" class="form-inline my-2 my-lg-0">
                        <!--<select id="Search" type="search" name="Search" class="form-control select2">
                            <option class="opselect">Select Barangay</option> 
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
                        </select>-->
                        <input class="form-control" id="Search" type="search" name="Search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
                <div class="col-sm">
                    <a href="admin_menu.php?=<?php echo $_SESSION['id']; ?>" class="btn btn-danger text-white" type="button" id="buttoni">Back</a>
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

    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
    </nav>
</body>
<script src="js/cdn-jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $('.select2').select2();

    $(document).ready(function(){
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