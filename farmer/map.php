<?php
    require_once("../php/session.php");
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    //this is where we get the session and compare it to identify the user is
    //logged in if not it will be redirected to the homepage
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:index.php");
        exit();
    }
    $fid = $_GET['id'];
    $Mid = $_GET['mid'];
    $Mapdata = mysqli_query($connect_db,"SELECT *,latitude,longitude FROM land_parcel WHERE id = $Mid");
    $resM = mysqli_fetch_array($Mapdata);
        $lat = $resM['latitude'];
        $long = $resM['longitude'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="../source/leaflet-1.7.1/leaflet.css">
    <link rel="stylesheet" href="../css/map.css" type="text/css">
    <title>Maps</title>
</head>
<body>
<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
</nav>
    <div class="container Cform">
        <center>
        <div class="card">
            <div class="card-img-top" id="map"></div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <div class="rowi">
                    <a href="viewFarmer.php?id=<?php echo $fid; ?>" class="btn btn-danger bbtn">Back</a>
                    <button class="btn btn-secondary" onClick="Refresh()" id="btnRefresh">Refresh map</button>
                </div>
            </div>
        </div>
</center>
    </div>

</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/leaflet-1.7.1/leaflet.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script>
            var map = L.map('map').setView([<?php echo $lat; ?>,<?php echo $long; ?>],13);
            L.tileLayer('https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}.jpg?key=xW4dciMUTSBQYvAb79sh', {
            attribution: '<a href="<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
            tileSize: 512,
            zoomOffset: -1,
            }).addTo(map)
            var marker = L.marker([<?php echo $lat; ?>,<?php echo $long; ?>]).bindPopup("Land Plot").addTo(map)
            setTimeout(function() {
                map.invalidateSize();
            }, 100);

            function Refresh(){
                map.flyTo([<?php echo $lat; ?>,<?php echo $long; ?>],13,{
                    animate: true,
                    duration: 2
                });
            }
        </script>
</html>