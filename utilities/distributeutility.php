<?php
    require_once("../php/session.php");
    require_once "../php/utildistribution.php";
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }
    $IDN1 = $_GET['id'];

    $fetchutil =mysqli_query($connect_db,"SELECT * FROM utilities WHERE utility_id = '$IDN1'");
    $fetchres = mysqli_fetch_array($fetchutil);

    $UtilD = mysqli_query($connect_db,"SELECT utility_name,availability FROM utilities WHERE utility_id = $IDN1");
    while($utilityD = mysqli_fetch_array($UtilD)){
        $utilityCounter = $utilityD['availability'];
        $utilityname = $utilityD['utility_name'];
    }
    echo json_encode($utilityCounter);
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
    <title>Distribute Utility</title>


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

            $( "#searchUtil" ).autocomplete({
                source: '../php/distsearch2.php',
                select: function( event, ui ) {
                    event.preventDefault();
                    $("#idutil").val(ui.item.id);
                    $(this).val(ui.item.value);
                },
                response: function(event, ui){
                    if (ui.content.length === 0) {
                        $("#noutil").text("No results found");
                    } else {
                        $("#noutil").empty();
                    }
                }
            });

            $(function(){
                $("#btn-dist").prop("disabled", true);
                var Countutility = "<?php echo $utilityCounter ?>";
                var nameutility = "<?php echo $utilityname ?>";
                console.log(Countutility);
                $("#Utcount").on('keyup',function(){
                    if($(this).val().trim()!==""){
                        if(/^[0-9]+$/.test($(this).val())){
                            if(Number($("#Utcount").val()) > Number(Countutility) || Number($("#Utcount").val())===0){
                                $(".Error2").text("");
                                $(".ErrorCount").text("Input shall not be exceeded to the available agricultural equipment, The available count is "+Countutility);
                                $(".ErrorCount").css("color","#d9534f");
                                $("#btn-dist").prop("disabled", true);
                            }else{
                                var utdec = Number($("#Utcount").val()) - Number(Countutility);
                                var futdec = Math.abs(utdec);
                                $(this).css("border-color","#5cb85c");
                                $(".Error2").text("");
                                $(".ErrorCount").css("color","#5cb85c");
                                $(".ErrorCount").text("Sufficient! you only have "+futdec+" "+nameutility+" after distribution");
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
                <h4>Distribute to</h4>
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
                        <input type="text" id="Utcount" name="Count" class="form-control" placeholder="Enter Utility count">
                        <p class="Error2"></p>
                        <p class="ErrorCount"></p>
                    </div>
                    <input type="hidden" name="utilid" value="<?php echo $IDN1?>">
                    <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="utillities.php?=<?php echo $_SESSION['id']; ?>">Back</a>
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
                                <h4>Distribute this Utility?</h4><br>
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
<script src="../js/FarmerRegValidation.js"></script>
</html>