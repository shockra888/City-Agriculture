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
    <link rel="stylesheet" href="source/fullcalendar-3.10.2/fullcalendar.min.css">
    <link rel="stylesheet" href="source/toastr-50092cc/build/toastr.min.css">
     <link rel="stylesheet" type="text/css" href="css/menunew.css">
    <title>Menu</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="shadow rounded">
            <div class="sidebar-header">
                <center>
                <img class="imgbar" src="css/logo.png">
                </center>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a name="text" id="farmertxt" class="tlink"href="farmer/farmerrecord.php?=<?php echo $_SESSION['id'];?>">Farmers</a>
                    <a class="tlink" id="seedtxt" href= "seed/seeds.php?=<?php echo $_SESSION['id']; ?>" >Available Seeds</a>
                    <a class="tlink" id="ferttxt" href= "fertilizer/fertilizer.php?=<?php echo $_SESSION['id']; ?>">Available Fertilizers</a>
                    <a class="tlink" id="utiltxt" href= "utilities/utillities.php?=<?php echo $_SESSION['id']; ?>" >Equipments</a>
                    <div class="dropdown-divider"></div>
                    <a class="tlink" id="archtxt" href="Data_Bin/bins.php?=<?php echo $_SESSION['id'];?>">Archives</a>
                    <a class="tlink" id="disttxt" href="distributions/disthistory.php?=<?php echo $_SESSION['id']; ?>">Distributions</a>
                    <a class="tlink" id="syslogtxt" href="sys_log.php?=<?php echo $_SESSION['id']; ?>">System Logs</a>
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
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <h3 class="ml16">Dashboard</h3>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="jumbotron counts shadow bg-white rounded">
                            <center>
                                <img class="farmerimg" src="css/farmer.png">
                                <h4 class="text"><?php echo $FarmerCount['COUNT(u_id)']; ?></h4>
                                <h6><a class="linker" id="poptxt" href="Bfarmerscount.php?=<?php echo $_SESSION['id'];?>" data-toggle="tooltip" data-placement="top" title="Click to open">Farmers Population</a></h6>
                            </center>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="jumbotron counts shadow bg-white rounded">
                            <center>
                            <img class="seedimg" src="css/seed.png">
                            <h4 class="text"><?php echo $SeedCount['COUNT(seed_id)']; ?></h4>
                            <h6>Seeds in Record</h6>
                            </center>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="jumbotron counts shadow bg-white rounded">
                            <center>
                            <img class="fertimg" src="css/fert.png">
                            <h4 class="text"><?php echo $FertilCount['COUNT(fertilizer_id)']; ?></h4>
                            <h6>Fertilizers in Record</h6>
                            </center>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="jumbotron counts shadow bg-white rounded">
                            <center>
                            <img class="utilimg" src="css/util.png">
                            <h4 class="text"><?php echo $utcount['COUNT(utility_id)']; ?></h4>
                            <h6>Agricultural Equipments</h6>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid calcont">
                <div class="jumbotron shadow bg-white rounded">
                    <div class="row">
                        <div class="col-md">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h3>Calendar Events</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Event</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                    $calevents = mysqli_query($connect_db,"SELECT * FROM tbl_events");
                                                    while ($eventC = mysqli_fetch_array($calevents)){
                                                        $evdate = date($eventC['start']);
                                                        $evdate1 = date($eventC['end']);
                                                        $oldf_timestamp = strtotime($evdate);
                                                        $start = date("l, F-j-Y", $oldf_timestamp);

                                                        $oldf_timestamp1 = strtotime($evdate1);
                                                        $end = date("l, F-j-Y", $oldf_timestamp1);
                                                        echo "<tr>";
                                                            echo "<td>".$eventC['title']."</td>";
                                                            echo "<td>".$start."</td>";
                                                            echo "<td>".$end."</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <span class="border-left"></span>
                        <div class="col-md">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="source/fullcalendar-3.10.2/lib/moment.min.js"></script>
<script src="source/fullcalendar-3.10.2/fullcalendar.min.js"></script>
<script src="source/toastr-50092cc/build/toastr.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
    });

    var calendar = $('#calendar').fullCalendar({
    editable: true,
    events: "php/fetch-event.php",
    displayEventTime: false,
    eventRender: function (event, element, view) {
        if (event.allDay === 'true') {
            event.allDay = true;
        } else {
            event.allDay = false;
        }
    },
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
    var title = prompt('Event Title:');

        if (title) {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

            $.ajax({
                url: 'php/add-event.php',
                data: 'title=' + title + '&start=' + start + '&end=' + end,
                type: "POST",
                success: function (data) {
                    displayMessage("Added Successfully");
                }
            });
            calendar.fullCalendar('renderEvent',
                {
                    title: title,
                    start: start,
                    end: end,
                    allDay: allDay
                },
                true
            );
            }
            calendar.fullCalendar('unselect');
            },
            
            editable: true,
            eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: 'php/edit-event.php',
                            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function (response) {
                                displayMessage("Updated Successfully");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: "php/delete-event.php",
                        data: "&id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            }

        });

        $(function(){
            $("#farmertxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "php/log_process.php",
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
                    url: "php/log_process.php",
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
                    url: "php/log_process.php",
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
                    url: "php/log_process.php",
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
                    url: "php/log_process.php",
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
                    url: "php/log_process.php",
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
                    url: "php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        syslogtxt: $(this).text()
                    }
                })
            });

            $("#poptxt").on('click',function(){
                var txt = $(this).text();             
                console.log(txt);
                $.ajax({
                    url: "php/log_process.php",
                    type: "POST",
                    dataType: "html",
                    data:{
                        poptxt: $(this).text()
                    }
                })
            });

        });

    });
        function displayMessage(message) {
            $(".response").html("<div class='success'>"+message+"</div>");
            setInterval(function() { $(".success").fadeOut(); }, 1000);
        }
    </script>
</html>