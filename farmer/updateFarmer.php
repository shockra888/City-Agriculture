<?php
    include_once("../php/session.php");
    include_once "../php/UpdateFarmer.php";
    include_once "../php/farmerProfile.php";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="../css/addFarmer.css">
    <title>Update Farmer</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav><br>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
            </div>
            <div class="card-body">
                <p class="errorM"><?php echo $field_error; ?></p>
                <form role="form" method="POST" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="FormValidation" enctype="multipart/form-data"> 
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <h5>Reference/Control No.</h5>
                            <input type="text" name="RefNo" class="form-control" placeholder="Reference/Control No." value="<?php echo $RefNo;?>">
                            <p class="errorM"><?php echo $error; ?></p>
                        </div>
                    </div>
                    <hr>
                    <h5>Part I: Personal Information</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6>Surname</h6>
                            <input type="text" name="SurName" class="form-control" placeholder="Surname" value="<?php echo $Surname; ?>">
                            <p class="errorM"><?php echo $error1; ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <h6>First Name</h6>
                            <input type="text" name="FirstName" class="form-control" placeholder="First Name" value="<?php echo $Firstname?>">
                            <p class="errorM"><?php echo $error2; ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <h6>Middle Name</h6>
                            <input type="text" name="MiddleName" class="form-control" placeholder="Middle Name" value="<?php echo $Middlename; ?>">
                            <p class="errorM"><?php echo $error3; ?></p>
                        </div>
                        <div class="form-group col-md-2">
                            <h6>Extension Name</h6>
                            <input type="text" name="ExtensionName" class="form-control" placeholder="Extension Name" value="<?php echo $Extensionname;?>">
                            <p class="errorM"><?php echo $error4; ?></p>
                        </div>
                        <div class="form-group col-md-3">
                            <h6>Sex</h6>                            
                            <input type="text" name="Sex" class="form-control" placeholder="Sex" value="<?php echo $Sex;?>">
                            <p class="errorM"><?php echo $Uerror2; ?></p>
                        </div>
                    </div>
                    <div class="alert alert-danger"></div>
                    <h5>Address</h5>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h6>House/Lot/BLDGNo.</h6>
                            <input type="text" name="HLB" class="form-control" placeholder="House/Lot/BLDG.NO" value="<?php echo $HLB;?>">
                            <p class="errorM"><?php echo $error5; ?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <h6>Street/Sitio/SUBDV</h6>
                            <input type="text" name="SSS" class="form-control" placeholder="Street/Sitio/SUBDV" value="<?php echo $SSS; ?>">
                            <p class="errorM"><?php echo $error6; ?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <h6>Barangay</h6>
                            <input type="text" name="Barangay" class="form-control" placeholder="Barangay" value="<?php echo $Barangay;?>">
                            <p class="errorM"><?php echo $error7; ?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <h6>Municipality</h6>
                            <input type="text" name="MC" class="form-control" placeholder="Municipality/City" value="<?php echo $MC;?>">
                            <p class="errorM"><?php echo $error8; ?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <h6>Province</h6>
                            <input type="text" name="Province" class="form-control" placeholder="Province" value="<?php echo $Province;?>">
                            <p class="errorM"><?php echo $error9; ?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <h6>Region</h6>
                            <input type="text" name="Region" class="form-control" placeholder="Region" value="<?php echo $Region;?>">
                            <p class="errorM"><?php echo $error10; ?></p>
                        </div>
                    </div>
                    <div class="alert alert-danger"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h6>Contact Number</h6>
                                <input type="text" name="ContactNo" class="form-control" placeholder="Contact Number" value="<?php echo $ContactNo;?>"> 
                                <p class="errorM"><?php echo $error11; ?></p>
                            </div>
                             <div class="form-group col-md-3">
                                 <h6>Date of Birth</h6>
                                <input type="text" name="Birthdate" class="form-control" placeholder="Date of Birth (MM/DD/YY)" value="<?php echo $Birthdate; ?>">
                                <p class="errorM"><?php echo $error12; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Birth Place</h6>
                                <input type="text" name="BirthPlace" class="form-control" placeholder="Place of Birth" value="<?php echo $BirthPlace;?>">
                                <p class="errorM"><?php echo $error13; ?></p>
                            </div>
                             <div class="form-group col-md-3">
                                 <h6>Religion</h6>
                                <input type="text" name="Religion" class="form-control" placeholder="Religion" value="<?php echo $Religion;?>">
                                <p class="errorM"><?php echo $error14; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Civil Status</h6>
                                <input type="text" name="stat" class="form-control" placeholder="Civil Status" value="<?php echo $Status;?>">
                                <p class="errorM"><?php echo $Uerror; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Spouse Name (if Married)</h6>
                                <input type="text" name="SpouseName" class="form-control" placeholder="Name of Spouse if Married" value="<?php echo $Spousename;?>">
                                <p class="errorM"><?php echo $error15; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Mother's Maiden Name</h6>
                                <input type="text" name="MotherMaidenName" class="form-control" placeholder="Mother's Maiden Name" value="<?php echo $MotherMaidenName;?>">
                                <p class="errorM"><?php echo $error16; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Household head</h6>
                                    <input type="text" name="Householdhead" class="form-control" placeholder="Household Head" value="<?php echo $Householdhead;?>">
                                <p class="errorM"><?php echo $Uerror4; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Household Name (if not Householdhead)</h6>
                                <input type="text" name="HouseHoldName" class="form-control" placeholder="If no. Name of Household head" value="<?php echo $HouseHoldname;?>">
                                <p class="errorM"><?php echo $error17; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Relationship (if not Householdhead)</h6>
                                <input type="text" name="Relationship" class="form-control" placeholder="Relationship" value="<?php echo $Relationship;?>">
                                <p class="errorM"><?php echo $error18; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Number of House Members</h6>
                                <input type="text" name="NoOfHouseMem" class="form-control" placeholder="No. of living household members" value="<?php echo $NoOfHouseMem;?>">
                                <p class="errorM"><?php echo $error19; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Number of Male</h6>
                                <input type="text" name="NoofMale" class="form-control" placeholder="No of male" value="<?php echo $NoofMale;?>">
                                <p class="errorM"><?php echo $error20; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Number of Female</h6>
                                <input type="text" name="NoofFemale" class="form-control" placeholder="No of female" value="<?php echo $NoofFemale;?>">
                                <p class="errorM"><?php echo $error21; ?></p>
                            </div>
                        </div>
                        <div class="alert alert-danger"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h6>Highest Educational Attainment</h6>
                                <input type="text" name="education" class="form-control" placeholder="Education" value="<?php echo $Education;?>">
                                <p class="errorM"><?php echo $Uerror1; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Person With Disability?</h6>
                                <input type="text" name="PWD" class="form-control" placeholder="Person with disability" value="<?php echo $PWD;?>">
                                <p class="errorM"><?php echo $Uerror9; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>4P's Beneficiary</h6>
                                <input type="text" name="4PS" class="form-control" placeholder="4P's Beneficiary" value="<?php echo $FourPs;?>">
                                <p class="errorM"><?php echo $Uerror10; ?></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h6>Member of Indigenous group?</h6>
                                <input type="text" name="Indigenous" class="form-control" placeholder="Member of Indigenous Group" value="<?php echo $Indigenous;?>">
                                <p class="errorM"><?php echo $Uerror5; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>if yes (Specification)</h6>
                                <input type="text" name="IndiMember" class="form-control" placeholder="if yes, specify" value="<?php echo $IndiMember;?>">
                                <p class="errorM"><?php echo $error22; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h6>With Government ID?</h6>
                                <input type="text" name="GovID" class="form-control" placeholder="With GovernmentID" value="<?php echo $GovID;?>">
                                <p class="errorM"><?php echo $Uerror7; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>if yes (Specification)</h6>
                                <input type="text" name="SpecGovID" class="form-control" placeholder="if yes, specify" value="<?php echo $SpecGovID;?>">
                                <p class="errorM"><?php echo $error23; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h6>Member of any Farmers Association/Cooperative?</h6>
                                <input type="text" name="MemFAC" class="form-control" placeholder="Member of any Farmers Association/Cooperative" value="<?php echo $MemFAC;?>">
                                <p class="errorM"><?php echo $Uerror8; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>if yes (Specification)</h6>
                                <input type="text" name="SpecFAC" class="form-control" placeholder="if yes, specify" value="<?php echo $SpecFAC;?>">
                                <p class="errorM"><?php echo $error24; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h6>Person to notify in case of emergency</h6>
                                <input type="text" name="PersontoNotif" class="form-control" placeholder="Person to notify in case of emergency" value="<?php echo $PersontoNotif;?>">
                                <p class="errorM"><?php echo $error25; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Notifier Contact Number</h6>
                                <input type="text" name="NotifierContactNo" class="form-control" placeholder="Contact Number" value="<?php echo $NotifierContactNo;?>">
                                <p class="errorM"><?php echo $error26; ?></p>
                            </div>
                        </div>
                        <div class="alert alert-danger"></div>
                        <h5>Part II: Farm Profile</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="form-check form-check-inline">
                                    <h5>Main Livelihood: </h5>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" id="lhood" name="livelihood" class="form-control" placeholder="Main Livelihood" value="<?php echo $Livelihood;?>">
                                <p class="errorM"><?php echo $Uerror3; ?></p>
                                <p class="lhood1"></p>
                            </div>
                        </div>
                        <hr>
                            <h5 id="farlab">(For Farmers)</h5>
                            <h5 id="farlab1">Type of Farming Activity</h5>
                        <div class="form-row" id="farlab2">
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <input type="text" name="FarmingACT" class="form-control" placeholder="Type of Farming Activity" value="<?php echo $FarmingACT;?>">
                                    <p class="errorM"><?php echo $Uerror12; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="OthercropSpec" class="form-control" placeholder="if Othercrops, (Specification)" value="<?php echo $OthercropSpec;?>">
                                <p class="errorM"><?php echo $error27; ?></p>
                            </div>
                        </div>
                        <hr>
                        <h5 id="flab">(For Farmworkers)</h5>
                            <h5 id="flab1">Kind of Work</h5>
                        <div class="form-row" id="flab2">
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <input type="text" name="kindOfwork" class="form-control" placeholder="Kind of work" value="<?php echo $kindOfwork;?>">
                                    <p class="errorM"><?php echo $error41; ?></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="SpecKOW" class="form-control" placeholder="if Others, (Specification)" value="<?php echo $SpecKOW;?>">
                                <p class="errorM"><?php echo $error28; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h5>Gross Annual Income Last Year: </h5>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Farming</h6>
                                <input type="text" name="IncomeFarming" class="form-control" placeholder="Farming" value="<?php echo $IncomeFarming;?>">
                                <p class="errorM"><?php echo $error29; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>Non-Farming</h6>
                                <input type="text" name="IncomenonFarming" class="form-control" placeholder="Non-Farming" value="<?php echo $IncomenonFarming;?>">
                                <p class="errorM"><?php echo $error30; ?></p>
                                <input type="hidden" name="Id" value="<?php echo $IDN; ?>">
                            </div>                  
                        </div>
                        <div class="alert alert-danger"></div>
                        <div class="form-row">

                            <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Update this Farmer Profile</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">*Update</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-1">
                        <a class="btn btn-secondary btn-back" href="viewFarmer.php?id=<?=$id?>">Back</a>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-up" onclick="confirmReg()" data-toggle="modal" data-target="#RegModal">Update</button>
                    </div>
                </div>
            </div>
         </div>

    <div class="modal fade" id="DocModal" tabindex="-1" role="dialog" aria-labelledby="DocumentsNo" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Document Numbers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <ol>
                            <li>Certificate Of Land Transfer</li>
                            <li>Emancipation Patent</li>
                            <li>Individual Certificate of Land Ownership Award (CLOA)</li>
                            <li>Collective CLOA</li>
                            <li>Co-Ownership CLOA</li>
                            <li>Agricultural Salespatent</li>
                            <li>Homestead Patent</li>
                            <li>Free Patent</li>
                            <li>Certificate of Title or Regular Title</li>
                            <li>Certificate of Ancestral Domain Title</li>
                            <li>Certificate of Ancestral Land Title</li>
                            <li>Tax Declaration</li>
                        </ol>
                    </div>
                </div>
                <div class="modal-footer bg-danger">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-bottom" >
        <p class="errorM"><?php echo $errorinsert;?></p>
    </nav>
</body>
<script src="../source/jquery-3.6.0/cdn-jquery.js"></script>
<script src="../source/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="../js/FarmerRegValidation.js"></script>
</html>