<?php
    require_once("../php/session.php");
    require_once "../php/seeddistribution.php";
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    //this is where we get the session and compare it to identify the user is
    //logged in if not it will be redirected to the homepage
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }
    $IDN = $_GET['id'];

    $seedS = mysqli_query($connect_db,"SELECT plant_name,available FROM seeds WHERE seed_id = $IDN");
    while($seedC = mysqli_fetch_array($seedS)){
        $seedCounter = $seedC['available'];
        $seedname = $seedC['plant_name'];
    }
    echo json_encode($seedCounter);
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
     <link href="../source/select2-4.0.1/dist/css/select2.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../source/jquery-1.12.1/jquery-ui.min.css">
     <script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
    <script src="../source/jquery-1.12.1/jquery-ui.min.js"></script>
    <script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="../css/distribution.css">
    <title>Distribute Seed</title>


    <script>
        $(function(){
            $( "#searchFarmer" ).autocomplete({
                source: '../php/distsearch.php',
                select: function( event, ui ) {
                    event.preventDefault();
                    $("#idfarmer").val(ui.item.id);
                    $(this).val(ui.item.value);
                },
                response: function(event, ui){
                    if (ui.content.length === 0) {
                        $("#nofarmer").text("No results found");
                    } else {
                        $("#nofarmer").empty();
                    }
                }
            });

            $( "#searchSeed" ).autocomplete({
                source: '../php/distsearch1.php',
                select: function( event, ui ) {
                    event.preventDefault();
                    $("#idSeed").val(ui.item.id);
                    $(this).val(ui.item.value);
                },
                response: function(event, ui){
                    if (ui.content.length === 0) {
                        $("#noseed").text("No results found");
                    } else {
                        $("#noseed").empty();
                    }
                }
            });
            $(function(){
                $("#btn-dist").prop("disabled", true);
                var Countseed = "<?php echo $seedCounter ?>";
                var nameseed = "<?php echo $seedname ?>";
                console.log(Countseed);
                $("#Scount").on('keyup',function(){
                    if($(this).val().trim()!==""){
                        if(/^[0-9]+$/.test($(this).val())){
                            if(Number($("#Scount").val()) > Number(Countseed) || Number($("#Scount").val())=== 0){
                                $(".Error2").text("");
                                $(".ErrorCount").text("Input shall not be exceeded to the available seed, The available count is "+Countseed);
                                $(".ErrorCount").css("color","#d9534f");
                                $("#btn-dist").prop("disabled", true);
                            }else{
                                var dec = Number($("#Scount").val()) - Number(Countseed);
                                var fdec = Math.abs(dec);
                                $(this).css("border-color","#5cb85c");
                                $(".Error2").text("");
                                $(".ErrorCount").css("color","#5cb85c");
                                $(".ErrorCount").text("Sufficient! you only have "+fdec+" "+nameseed+" after distribution");
                                $("#btn-dist").removeAttr("disabled");
                            }
                        }else{
                            $(this).css("border-color","#d9534f");
                            $(".Error2").text("Input must be Number");
                            $(".Error2").css("color","#d9534f");
                            $("#btn-dist").prop("disabled", true);
                        }
                    }else{
                        $(this).css("border-color","#d9534f");
                        $(".ErrorCount").text("");
                        $(".ErrorCount").css("color","#d9534f");
                        $("#btn-dist").prop("disabled", true);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav><br>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
                <h4>Distribute Seed to</h4>
            </div>
            <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registration" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <div class="ui-widget">
                            <input type="text" name="farmername" id="searchFarmer" placeholder="Farmer Name" class="form-control">
                            <input type="hidden" name="farmerid" id="idfarmer">
                            <p id="nofarmer"></p>
                            <p class="Error"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Scount" id="Scount" placeholder="Enter Seed count">
                        <p class="Error2"><p class="ErrorCount"></p></p>
                    </div>
                    <div class="form-group">
                        <div class="input-group addon">
                            <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
                            <input type="hidden" name="seedid" value="<?php echo $IDN?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="seeds.php?=<?php echo $_SESSION['id']; ?>">Back</a>
                    <button type="button" data-toggle="modal" data-target="#DistModal" id="btn-dist" class="btn btn-danger">Distribute</button>
                </div>
            <div class="modal fade" id="DistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Distribute</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Distribute this Seed?</h4>
                        </div>
                        <div class="modal-footer">        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-danger">Distribute</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
         </div>
    </div>
    
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
        <p><?php echo $disterror; ?></p>
    </nav>

</body>
<script src="../js/FarmerRegValidation.js"></script>
</html>