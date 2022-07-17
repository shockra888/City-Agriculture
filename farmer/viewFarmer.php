<?php
    include_once("../php/session.php");
    include_once("../php/farmerProfile.php");
    include_once("../php/updateimg.php");
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
     <link rel="stylesheet" type="text/css" href="../css/viewFarmer.css">
    <title>view</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav><br>

   <div class="container-fluid Cform">
       <div class="jumbotron shadow bg-white rounded">
            <div class="row">
                <div class="col-sm-3 centI">
                <div class="container">
                        <?php
                            $seesched = mysqli_query($connect_db,"SELECT update_sched FROM farmer_data WHERE u_id = $id");
                            $sched = mysqli_fetch_array($seesched);

                            $sched_date = date($sched['update_sched']);
                            $oldsched_timestamp = strtotime($sched_date);
                            $formatsched = date("l, F-j-Y", $oldsched_timestamp);

                            echo "<h5> Date to Update: ".$formatsched."</h5>"
                        ?>
                    </div>
                    <div class="imgplat">
                        <img class="profile" alt="Profile" src="../farmer_image/<?php echo $resRecord['image']; ?>"><br>
                        <button class="btnedit" data-toggle="modal" data-target="#EImgModal"><i class="fa fa-edit"></i></button>
                    </div><br>
                    <span>
                        <h4 class="deta"><b><?php echo $Surname." "; echo $Firstname." "; echo $Middlename." "; echo $Extensionname?></b></h4>
                    </span>
                    <a href="farmerrecord.php?=<?php echo $_SESSION['id']; ?>" id="farmertxt" class="btn btn-secondary text-white">Back</a>
                    <a href= "updateFarmer.php?id=<?=$id?>" id="editftxt" class="btn btn-danger text-white buttonics">Edit</a>
                    <a href= "printfarmer.php?id=<?=$id?>" id="printfptxt" class="btn btn-danger text-white buttonics">Print</a>
                </div>
                <div class="col-sm">
                     <div class="table-responsive">
                        <table class="table">
                            <thead class="thead bg-danger text-white">
                                <tr>
                                    <th colspan="2" scope="col">Farmer Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Reference/ControlNo:</td>
                                    <td><?php echo $RefNo; ?></td>
                                </tr>
                                <tr id="extplat">
                                    <td>Extension Name:</td>
                                    <td id="ext"><?php echo $Extensionname; ?></td>
                                </tr>
                                <tr>
                                    <td>Sex:</td>
                                    <td><?php echo $Sex;?></td>
                                </tr>
                                <tr>
                                    <td>HOUSE/LOT/BLDG.No:</td>
                                    <td><?php echo $HLB;?></td>
                                </tr>
                                <tr>
                                    <td>STREET/SITIO/SUBDV:</td>
                                    <td><?php echo $SSS;?></td>
                                </tr>
                                <tr>
                                    <td>Barangay:</td>
                                    <td><?php echo $Barangay; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InfoModal">
                                        More Information
                                    </button></td>
                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#FarmModal">
                                        Farm Profile
                                    </button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead bg-danger text-white">
                                    <tr>
                                    <th colspan="1" scope="col">Farm Land Description</th>
                                    <td> <a href= "UpLandDes.php?id=<?=$id?>&Fid=<?=$FID?>" id="fldestxt" class="btn btn-outline-warning btn-sm text-white buttonics">Update Land Description</a></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Agrarian Reform Beneficiary (ARB):</td>
                                        <td><?php echo $ARB; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. of Farm Parcels:</td>
                                        <td><?php echo $Cland['SUM(NoofFarmParcel)'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Location Barangay & Municipality:</td>
                                        <td><?php echo $LandLocation;?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Farm Area:</td>
                                        <td><?php echo $Cland['SUM(size_ha)'];?> Square Meter</td>
                                        <?php
                                            $tot = $Cland['SUM(size_ha)'];
                                            $instot = mysqli_query($connect_db,"UPDATE farm_land SET tot_farm_area = '$tot' WHERE u_id = '$id'");

                                            if($instot === TRUE){

                                            }else{
                                                mysqli_error($connect_db);
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Ownership DocumentNo:</td>
                                        <td><?php echo $OwnerDocNo;?></td>
                                    </tr>
                                    <tr>
                                        <td>Ownership:</td>
                                        <td><?php echo $Ownership;?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#LParcelModal">
                                                View Land Parcels
                                            </button>
                                        </td>
                                        <td>
                                             <a href= "AddParcel.php?id=<?=$id?>" id="addparceltxt" class="btn btn-danger text-white buttonics">Add Land Parcel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
   </div> 

   <div class="container-fluid table1">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-5">
                    <button class="btn btn-success" id="printhist" onclick="printDiv('printThis')">Print</button>
                </div>
            </div>
            <div id="printThis">
                <div class="table-responsive">
                    <table class="table">
                        <center><h4>Distribution History</h4></center>
                        <br>
                    <h4 class="deta">Name: <b><?php echo $Surname." "; echo $Firstname." "; echo $Middlename;?><br></b>Total Farm land size: <b><?php echo $Cland['SUM(size_ha)'];?></b> Square Meter</h4>
                        <thead id="thd" class="thead bg-danger text-white">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Count</th>
                                <th id="acth" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dfert = mysqli_query($connect_db,"SELECT * FROM distribute_fertilizer WHERE farmer_id = $id ORDER BY date_distributed DESC");
                            $dseed = mysqli_query($connect_db,"SELECT * FROM distribute_seed WHERE farmer_id = $id ORDER BY date_distributed DESC");
                            $dutil = mysqli_query($connect_db,"SELECT * FROM distribute_utility WHERE farmer_id = $id ORDER BY date_distributed DESC");

                                while($distfert  = mysqli_fetch_array($dfert)){
                                    $distf_date = date($distfert['date_distributed']);
                                    $oldf_timestamp = strtotime($distf_date);
                                    $distdate = date("l, F-j-Y", $oldf_timestamp);
                                    echo "<tr>";
                                        echo "<td>".$distdate."</td>";
                                        echo "<td>Fertilizer</td>";
                                        echo "<td>".$distfert['fertilizer_name']."</td>";
                                        echo "<td>".$distfert['fertilizer_count']." Pcs</td>";
                                        echo "<td class='td1'><a class='btn btn-danger' id='distferttxt' href=\"viewDistfert.php?id=$distfert[distribution_id]&amp;fid=$id\">View</a></td>";
                                    echo "</tr>";
                                }

                                while($distseed  = mysqli_fetch_array($dseed)){
                                    $distS_date = date($distseed['date_distributed']);
                                    $oldS_timestamp = strtotime($distS_date);
                                    $distdate1 = date("l, F-j-Y", $oldS_timestamp);
                                    echo "<tr>";
                                        echo "<td>".$distdate1."</td>";
                                        echo "<td>Seed</td>";
                                        echo "<td>".$distseed['plant_name']."</td>";
                                        echo "<td>".$distseed['seed_count']." Pcs</td>";
                                        echo "<td class='td1'><a class='btn btn-danger' id='distseedtxt' href=\"viewDistseed.php?id=$distseed[distribution_id]&amp;fid=$id\">View</a></td>";
                                    echo "</tr>";
                                }

                                while($distutil  = mysqli_fetch_array($dutil)){
                                    $distU_date = date($distutil['date_distributed']);
                                    $oldU_timestamp = strtotime($distU_date);
                                    $distdate2 = date("l, F-j-Y", $oldU_timestamp);
                                    echo "<tr>";
                                        echo "<td>".$distdate2."</td>";
                                        echo "<td>Utility</td>";
                                        echo "<td>".$distutil['utility_name']."</td>";
                                        echo "<td>".$distutil['utility_count']." Pcs</td>";
                                        echo "<td class='td1'><a class='btn btn-danger' id='distutiltxt' href=\"viewDistutil.php?id=$distutil[distribution_id]&amp;fid=$id\">View</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="InfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Additional Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead bg-danger text-white">
                                        <tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Municipality/City:</td>
                                            <td><?php echo $MC;?></td>
                                        </tr>
                                        <tr>
                                            <td>Province:</td>
                                            <td><?php echo $Province;?></td>
                                        </tr>
                                        <tr>
                                            <td>Region</td>
                                            <td><?php echo $Region;?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number:</td>
                                            <td><?php echo $ContactNo;?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth:</td>
                                            <td><?php echo $Birthdate;?></td>
                                        </tr>
                                        <tr>
                                            <td>Place of Birth:</td>
                                            <td><?php echo $BirthPlace;?></td>
                                        </tr>
                                        <tr>
                                            <td>Highest Formal Education:</td>
                                            <td><?php echo $Education;?></td>
                                        </tr>
                                        <tr>
                                            <td>Religion:</td>
                                            <td><?php echo $Religion;?></td>
                                        </tr>
                                        <tr>
                                            <td>Civil Status:</td>
                                            <td id="stat"><?php echo $Status;?></td>
                                        </tr>
                                        <tr class="spousename">
                                            <td>Name of Spouse if Married:</td>
                                            <td><?php echo $Spousename;?></td>
                                        </tr>
                                        <tr>
                                            <td>Mother's Maiden Name:</td>
                                            <td><?php echo $MotherMaidenName;?></td>
                                        </tr>
                                        <tr>
                                            <td>Household head:</td>
                                            <td id="hhead"><?php echo $Householdhead;?></td>
                                        </tr>
                                        <tr id="nohead">
                                            <td>If no. Name of Head:</td>
                                            <td><?php echo $HouseHoldname;?></td>
                                        </tr>
                                        <tr id="nohead1">
                                            <td>Relationship:</td>
                                            <td><?php echo $Relationship;?></td>
                                        </tr>
                                        <tr>
                                            <td>No. of living household members:</td>
                                            <td><?php echo $NoOfHouseMem;?></td>
                                        </tr>
                                        <tr>
                                            <td>No. of Male:</td>
                                            <td><?php echo $NoofMale;?></td>
                                        </tr>
                                        <tr>
                                            <td>No. of Female:</td>
                                            <td><?php echo $NoofFemale;?></td>
                                        </tr>
                                        <tr>
                                            <td>Person with disability (PWD):</td>
                                            <td><?php echo $PWD;?></td>
                                        </tr>
                                        <tr>
                                            <td>4P's Beneficiary:</td>
                                            <td><?php echo $FourPs;?></td>
                                        </tr>
                                        <tr>
                                            <td>Member of an Indigenous Group:</td>
                                            <td id="indi"><?php echo $Indigenous;?></td>
                                        </tr>
                                        <tr id="indi1">
                                            <td>If yes. Specification:</td>
                                            <td><?php echo $IndiMember;?></td>
                                        </tr>
                                        <tr>
                                            <td>With Government ID:</td>
                                            <td id="govid"><?php echo $GovID;?></td>
                                        </tr>
                                        <tr id="govid1">
                                            <td>If yes. Specification:</td>
                                            <td><?php echo $SpecGovID;?></td>
                                        </tr>
                                        <tr>
                                            <td>Member of any farmers Association/Cooperative:</td>
                                            <td id="memfac"><?php echo $MemFAC;?></td>
                                        </tr>
                                        <tr id="memfac1">
                                            <td>If yes. Specification:</td>
                                            <td><?php echo $SpecFAC;?></td>
                                        </tr>
                                        <tr>
                                             <td>Person to notify in case of emergency:</td>
                                             <td><?php echo $PersontoNotif;?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number:</td>
                                            <td><?php echo $NotifierContactNo;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="FarmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Farm Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><strong id="livelihood">Main Livelihood: <?php echo $Livelihood; ?></strong> </h5><br>
                <div class="row" id="farmer">
                    <div class="col-sm-4">
                        <h5><b>For Farmer</b></h5>
                        <h5>Type of Farming Activity:</h5>
                        <h5>Othercrops (if specified):</h5>
                    </div>
                    <div class="col-sm">
                        <h5> |</h5>
                        <h5><?php echo $FarmingACT;?></h5>
                        <h5><?php echo $OthercropSpec;?></h5>
                    </div>
                </div><br>
                <div class="row" id="farmworker">
                    <div class="col-sm-4">
                        <h5><b>For Farmworkers</b></h5>
                        <h5>Kind Of work:</h5>
                        <h5>Others (if specified):</h5>
                    </div>
                    <div class="col-sm">
                        <h5> |</h5>
                        <h5><?php echo $kindOfwork;?></h5>
                        <h5><?php echo $SpecKOW;?></h5>
                    </div>
                </div><br>
                <h5><b>Gross Annual Income Last Year</b></h5>
                <h5>Farming: <?php echo $IncomeFarming;?></h5>
                <h5>Non-Farming: <?php echo $IncomenonFarming;?></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="LParcelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLongTitle">Farm Parcels</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <?php
                            $i = 1;
                            $Fdata = mysqli_query($connect_db,"SELECT * FROM land_parcel WHERE u_id = $id");
                            while ($res = mysqli_fetch_array($Fdata)) {
                                $pId = $res['id'];
                                echo "<tr>";
                                echo "<td><b>Farm Parcel No.</b></td>";
                                echo "<td><b>".$i."</b></td>";
                                echo "</tr>";
                                echo "<tr class='tr2'>";
                                echo "<td>Crop/Commodity</td>";
                                echo "<td class='cropcom'>".$res['Crop_commodity']."</td>";
                                echo "</tr>";

                                echo "<tr class='cropothers'>";
                                echo "<td>Other Crop</td>";
                                echo "<td>" . $res['others'] . "</td>";
                                echo "</tr>";

                                echo "<tr class='tr2'>";
                                echo "<td>Size</td>";
                                echo "<td class='td1'>" . $res['size_ha'] .' Square Meter'. "</td>";
                                echo "</tr>";

                                echo "<tr class='tr2'>";
                                echo "<td>Farm Type</td>";
                                echo "<td class='td1'>" . $res['farm_type'] . "</td>";
                                echo "</tr>";

                                echo "<tr class='tr2'>";
                                echo "<td>Organic Practitioner</td>";
                                echo "<td class='td1'>" . $res['organic_practitioner'] . "</td>";
                                echo "</tr>";

                                echo "<tr class='tr2'>";
                                echo "<td>Land Coordinates</td>";
                                echo "<td class='td1'>" . $res['latitude']." , ". $res['longitude'] . "</td>";
                                echo "</tr>";
                                echo "<tr><td></td><td class='td1'><a class='btn btn-danger' id='parceluptxt' href=\"LandUpdate.php?id=$res[u_id]&oid=$res[id]\">Update</a></td>
                                <td></td><td class='td1'><a class='btn btn-danger' id='maptxt' href=\"map.php?id=$res[u_id]&mid=$res[id]\">Map</a></td>
                                </tr>";
                                echo "<tr><td colspan='2'><div class='alert alert-danger'></div><td></tr>";

                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="EImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="FormValidation" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="farmer_img" class="form-control-file" onchange="readURL(this);" id="exampleFormControlFile1">
                                <input type="hidden" name="Id" value="<?php echo $id; ?>">
                            </div>
                            <center><img id="Previmage" src="#" alt="Image Preview"></center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
</div>

    <div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>There was an error occured</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
</nav>

</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/farmer_profile.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#Previmage')
                    .attr('src', e.target.result)
                    .width(130)
                    .height(130);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
        $("#farmertxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    farmertxt: $(this).text()
                }
            })
        });
        $("#editftxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    editftxt: $(this).text()
                }
            })
        });
        $("#printfptxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    printfptxt: $(this).text()
                }
            })
        });
        $("#fldestxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    fldestxt: $(this).text()
                }
            })
        });
        $("#addparceltxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    addparceltxt: $(this).text()
                }
            })
        });
        $("#distferttxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    distferttxt: $(this).text()
                }
            })
        });
        $("#distseedtxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{
                    distseedtxt: $(this).text()
                }
            })
        });
        $("#distutiltxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{           
                    distutiltxt: $(this).text()
                }
            })
        });
        $("#parceluptxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{           
                    parceluptxt: $(this).text()
                }
            })
        });
        $("#maptxt").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{           
                    maptxt: $(this).text()
                }
            })
        });
    })
    function printDiv(printThis){
        $("#thd").css("color","black");
        $("#acth").hide();
        $("#distferttxt").hide();
        $("#distseedtxt").hide();
        $("#distutiltxt").hide();
        var printContents = document.getElementById("printThis").innerHTML;
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;

        window.print();
        window.location.reload(true);
        document.body.innerHTML = originalContents;
    }
</script>
</html>