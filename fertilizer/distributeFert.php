<?php
    require_once("../php/session.php");
    require_once "../php/fertdistribution.php";
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    //this is where we get the session and compare it to identify the user is
    //logged in if not it will be redirected to the homepage
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }
    $IDN3 = $_GET['id'];

    $fertD = mysqli_query($connect_db,"SELECT fertilizer_name,available FROM fertilizers WHERE fertilizer_id = $IDN3");
    while($fertilD = mysqli_fetch_array($fertD)){
        $fertCounter = $fertilD['available'];
        $fertname = $fertilD['fertilizer_name'];
    }
    echo json_encode($fertCounter);
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
    <script src="../js/FarmerRegValidation.js"></script>
     <link rel="stylesheet" type="text/css" href="../css/distribution.css">
    <title>Distribute Fertilizer</title>
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

            $( "#searchFert" ).autocomplete({
                source: '../php/distsearch3.php',
                select: function( event, ui ) {
                    event.preventDefault();
                    $("#idfert").val(ui.item.id);
                    $(this).val(ui.item.value);
                },
                response: function(event, ui){
                    if (ui.content.length === 0) {
                        $("#nofert").text("No results found");
                    } else {
                        $("#nofert").empty();
                    }
                }
            });

            $(function(){
                $("#btn-dist").prop("disabled", true);
                var Countfert = "<?php echo $fertCounter ?>";
                var namefert = "<?php echo $fertname ?>";
                console.log(Countfert);
                $("#Fercount").on('keyup',function(){
                    if($(this).val().trim()!==""){
                        if(/^[0-9]+$/.test($(this).val())){
                            if(Number($("#Fercount").val()) > Number(Countfert) || Number($("#Fercount").val())===0){
                                $(".Error2").text("");
                                $(".ErrorCount").text("Input shall not be exceeded to the available fertilizers, The available count is "+Countfert);
                                $(".ErrorCount").css("color","#d9534f");
                                $("#btn-dist").prop("disabled", true);
                            }else{
                                var ferdec = Number($("#Fercount").val()) - Number(Countfert);
                                var fferdec = Math.abs(ferdec);
                                $(this).css("border-color","#5cb85c");
                                $(".ErrorCount").css("color","#5cb85c");
                                $(".Error2").text("");
                                $(".ErrorCount").text("Sufficient! you only have "+fferdec+" "+namefert+" after distribution");
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
    </nav>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
                <h4>Distribute Fertilizer to</h4>
            </div>
            <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registration" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <div class="ui-widget">
                            <input type="text" name="farmername" id="searchFarmer" placeholder="Farmer Name" class="form-control">
                            <input type="hidden" name="farmerid" id="idfarmer">
                            <p id="nofarmer"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Ucount" id="Fercount" class="form-control" placeholder="Enter Fertilizer count">
                        <p class="Error2"><?php echo $errorcount ?></p>
                        <p class="ErrorCount"></p>
                        <input type="hidden" name="fertid" value="<?php echo $IDN3?>">
                        <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="../fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Back</a>
                    <button type="button" data-toggle="modal" id="btn-dist" data-target="#DistModal" class="btn btn-danger">Distribute</button>
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
                            <h4>Distribute this Fertilizer?</h4>
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
    </nav>

</body>
</html>