<?php
    include_once("../php/session.php");
    include_once("../php/farmerProfile.php");

    $IDN = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/printfarmer.css" type="text/css">
    <title>Print Preview</title>
</head>
<body>
<nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
<a class="btn btn-secondary btn-back" href="viewFarmer.php?id=<?=$IDN?>">Back</a>
<button class="btn btn-success" id="printfprofile" onclick="printDiv('printThis')">Print</button>
</nav><br>
    <div id="printThis">
        <div class="container-fluid conti">
        <h5><?php echo $RefNo; ?></h5>
            <div class="row romin">
                <div class="col-md-2">
                
                    <center>
                    <div class="imgplat">
                        <img class="profile" alt="Profile" src="../farmer_image/<?php echo $resRecord['image']; ?>"><br>
                    </div><br>
                    </center>
                    <h4 class="deta"><b><?php echo $Surname." "; echo $Firstname." "; echo $Middlename;?></b></h4>
                </div>
                <div class="col-md-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead bg-danger text-white">
                                <tr>
                                    <th id="htext" colspan="2" scope="col">Farmer Information</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td>Municipality/City:</td>
                                    <td><?php echo $MC;?></td>
                                </tr>
                                <tr>
                                    <td>Main Livelihood</td>
                                    <td id="livelihood1"><?php echo $Livelihood; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead bg-danger text-white">
                                <tr>
                                    <th id="Htext" colspan="2" scope="col">Farm Land Description</th>
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
                                </tr>
                                <tr>
                                    <td>Ownership DocumentNo:</td>
                                    <td><?php echo $OwnerDocNo;?></td>
                                </tr>
                                <tr>
                                    <td>Ownership:</td>
                                    <td><?php echo $Ownership;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="container-fluid conti">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-5 border-right">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead class="thead bg-danger text-white">
                            </thead>
                            <tbody>
                                <tr id="farmer1">
                                    <td>Type of Farming Activity:</td>
                                    <td id="fact"><?php echo $FarmingACT;?></td>
                                </tr>
                                <tr id="ofarmer1">
                                    <td>Othercrops (if specified):</td>
                                    <td><?php echo $OthercropSpec;?></td>
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
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="thead bg-danger text-white">
                        </thead>
                        <tbody>
                            <tr id="farmworker1">
                                <td>Kind Of work:</td>
                                <td id="kiw"><?php echo $kindOfwork;?></td>
                            </tr>
                            <tr id="ofarmworker1">
                                <td>Others (if specified):</td>
                                <td><?php echo $SpecKOW;?></td>
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
            <div class="col-md-2">
                <h5>Land Parcels</h5>
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Land Count</th>
                            <th scope="col">Crop Commodity</th>
                            <th id="othtab" scope="col">Others</th>
                            <th scope="col">Size(Square Meter)</th>
                            <th scope="col">Farm Type</th>
                            <th scope="col">Organic Practitioner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            $Fdata = mysqli_query($connect_db,"SELECT * FROM land_parcel WHERE u_id = $IDN");
                            while ($res = mysqli_fetch_array($Fdata)) {
                                echo "<tr>";
                                echo "<td><b>".$i."</b></td>";
                                echo "<td>Crop/Commodity</td>";
                                echo "<td id='otherscr'></td>";
                                echo "<td class='td1'>" . $res['size_ha'] .' Square Meter'. "</td>";
                                echo "<td class='td1'>" . $res['farm_type'] . "</td>";
                                echo "<td class='td1'>" . $res['organic_practitioner'] . "</td>";
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/farmer_profile.js"></script>
<script>
    $(document).ready(function(){
        $("#htext").css("color","white");
        $("#Htext").css("color","white");

        $("#printfprofile").on('click',function(){
            var txt = $(this).text();             
            console.log(txt);
            $.ajax({
                url: "../php/log_process.php",
                type: "POST",
                dataType: "html",
                data:{           
                    printfprofile: $(this).text()
                }
            })
        });
    });
    function printDiv(printThis){
        $("#htext").css("color","black");
        $("#Htext").css("color","black");
        var printContents = document.getElementById("printThis").innerHTML;
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;

        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
</html>