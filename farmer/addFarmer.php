<?php
    require_once("../php/session.php");
    $Uresult = mysqli_query($connect_db, "SELECT * FROM admin_account where admin_id='$_SESSION[id]'");
    $Ures = mysqli_fetch_array($Uresult);
    //this is where we get the session and compare it to identify the user is
    //logged in if not it will be redirected to the homepage
    $_SESSION['id'] = $Ures['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:../index.php");
        exit();
    }
    include "../php/RegisterFarmer.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../source/bootstrap-4.3.1/dist/css/bootstrap-grid.min.css">  
    <link href="../source/gijgo-combined-1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/addFarmer.css">
    <title>Add Farmer</title>
</head>
<body>
    <nav class= "navbar navbar-expand-lg navbar-light bg-danger fixed-top" >
    </nav><br>

    <div class="container Cform">
        <div class="card shadow bg-white rounded">
            <div class="card-header bg-danger text-white">
                <h6 style="text-align:center;">Ani at Kita RSBA Enrollment Form</h6>
            </div>
            <div class="card-body">
                <p class="errorM"><?php echo $field_error; ?></p>
                <form role="form" autocomplete="off" id="registration" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data"> 
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="RefNo">Reference/Control No.</label>
                            <input type="text" id="RefNo" name="RefNo" class="form-control" placeholder="Reference/Control No." value="<?php echo isset($_POST['RefNo']) ? $_POST['RefNo'] : '';?>">
                            <span class="RefNo-msg"></span>
                            <p class="RefError"></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlFile1">2X2 Picture (Photo taken within 6 months)</label>
                            <input type="file" name="farmer_img" class="form-control-file" onchange="readURL(this);" id="exampleFormControlFile1">
                            <p class="errorM"><?php echo $errorimg; ?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <img id="Previmage" src="#" alt="Image Preview">
                        </div>
                    </div>
                    <hr>
                    <h5>Part I: Personal Information</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <h6>Surname</h6>
                            <input type="text" id="Surname" name="SurName" class="form-control" placeholder="Surname" value="<?php echo isset($_POST['SurName']) ? $_POST['SurName'] : '';?>">
                            <p class="SurError"></p>
                        </div>
                        <div class="form-group col-md-6">
                        <h6>First Name</h6>
                            <input type="text" id="Firstname" name="FirstName" class="form-control" placeholder="First Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '';?>">
                            <p class="FirstError"></p>
                        </div>
                        <div class="form-group col-md-6">
                        <h6>Middle Name</h6>
                            <input type="text" id="Middlename" name="MiddleName" class="form-control" placeholder="Middle Name" value="<?php echo isset($_POST['MiddleName']) ? $_POST['MiddleName'] : '';?>">
                            <p class="MiddleError"></p>
                        </div>
                        <div class="form-group col-md-2">
                        <h6>Extension Name</h6>
                            <input type="text" id="Extensionname" name="ExtensionName" class="form-control" placeholder="Extension Name" value="<?php echo isset($_POST['ExtensionName']) ? $_POST['ExtensionName'] : '';?>">
                            <p class="ExtError"></p>
                        </div>
                        <div class="form-group col-md-3">
                        <h6 class="sex">'Sex' Select one of these</h6>    
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="Sex" name="Sex" type="radio" value="Male" >
                                <label class="form-check-label sex1" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="Sex" name="Sex" type="radio" value="Female" >
                                <label class="form-check-label sex2" for="inlineRadio2">Female</label>
                            </div>
                            <p class="errorM"><?php echo $error41; ?></p>
                        </div>
                    </div>
                    <div class="alert alert-danger"></div>
                    <h5>Address</h5>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <h6>House/Lot/BLDGNo.</h6>
                            <input type="text" id="HLB" name="HLB" class="form-control" placeholder="House/Lot/BLDG.NO" value="<?php echo isset($_POST['HLB']) ? $_POST['HLB'] : '';?>">
                            <p class="HLBError"></p>
                        </div>
                        <div class="form-group col-md-4">
                        <h6>Street/Sitio/SUBDV</h6>
                            <input type="text" id="SSS" name="SSS" class="form-control" placeholder="Street/Sitio/SUBDV" value="<?php echo isset($_POST['SSS']) ? $_POST['SSS'] : '';?>">
                            <p class="SSSError"></p>
                        </div>
                        <div class="form-group col-md-4">
                        <h6>Barangay</h6>
                            <input type="text" id="Barangay" name="Barangay" class="form-control" placeholder="Barangay" value="<?php echo isset($_POST['Barangay']) ? $_POST['Barangay'] : '';?>">
                            <p class="BarangayError"></p>
                        </div>
                        <div class="form-group col-md-4">
                        <h6>Municipality</h6>
                            <input type="text" id="MC" name="MC" class="form-control" placeholder="Municipality/City" value="Alaminos City">
                            <p class="MCError"></p>
                        </div>
                        <div class="form-group col-md-4">
                        <h6>Province</h6>
                            <input type="text" id="Province" name="Province" class="form-control" placeholder="Province" value="Pangasinan">
                            <p class="ProvinceError"></p>
                        </div>
                        <div class="form-group col-md-4">
                        <h6>Region</h6>
                            <input type="text" id="Region" name="Region" class="form-control" placeholder="Region" value="1">
                            <p class="RegionError"></p>
                        </div>
                    </div>
                    <div class="alert alert-danger"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                            <h6>Contact Number</h6>
                                <input type="text" id="Contactno" name="ContactNo" class="form-control" placeholder="Contact Number" value="+639<?php echo isset($_POST['ContactNo']) ? $_POST['ContactNo'] : '';?>"> 
                                <p class="ContactError"></p>
                            </div>
                             <div class="form-group col-md-3">
                             <h6>Date of Birth</h6>
                                 <div class="input-group date">
                                    <input type="text" id="Birthdate" name="Birthdate" class="form-control">
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                                 <p class="BirthdateError"></p>
                            </div>
                            <div class="form-group col-md-3">
                            <h6>Birth Place</h6>
                                <input type="text" id="Birthplace" name="BirthPlace" class="form-control" placeholder="Place of Birth" value="<?php echo isset($_POST['BirthPlace']) ? $_POST['BirthPlace'] : '';?>">
                                <p class="BirthplaceError"></p>
                            </div>
                             <div class="form-group col-md-3">
                             <h6>Religion</h6>
                                <input type="text" id="Religion" name="Religion" class="form-control" placeholder="Religion" value="<?php echo isset($_POST['Religion']) ? $_POST['Religion'] : '';?>">
                                <p class="ReligionError"></p>
                            </div>
                            <div class="form-group col-md-9">
                                <div class="form-check form-check-inline">
                                <h6>'Civil Status' Select one of these</h6><p class="sel"></p>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="Stat" name="stat" type="radio" value="Single" >
                                    <label class="form-check-label" for="inlineRadio1">Single</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="Stat" name="stat" type="radio"  value="Married" >
                                    <label class="form-check-label" for="inlineRadio2">Married</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="Stat" name="stat" type="radio" value="Widowed" >
                                    <label class="form-check-label" for="inlineRadio2">Widowed</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="Stat" name="stat" type="radio"  value="Separated" >
                                    <label class="form-check-label" for="inlineRadio2">Separated</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6 class="splab">Spouse Name (if Married)</h6>
                                <input type="text" id="spousename" name="SpouseName" class="form-control" placeholder="Name of Spouse if Married" value="<?php echo isset($_POST['SpouseName']) ? $_POST['SpouseName'] : '';?>">
                                <p class="spouseError"><?php echo $error15; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6>Mother's Maiden Name</h6>
                                <input type="text" id="Maidenname" name="MotherMaidenName" class="form-control" placeholder="Mother's Maiden Name" value="<?php echo isset($_POST['MotherMaidenName']) ? $_POST['MotherMaidenName'] : '';?>">
                                <p class="MaidennameError"></p>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    <h6>Household head?: </h6>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="Househead" name="Householdhead" type="radio" value="Yes" >
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="Househead" name="Householdhead" type="radio" value="No" >
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6 class="hlab">Household Name (if not Householdhead)</h6>
                                <input type="text" id="Hname" name="HouseHoldName" class="form-control" placeholder="If no. Name of Household head" value="<?php echo isset($_POST['HouseHoldName']) ? $_POST['HouseHoldName'] : '';?>">
                                <p class="HnameError"><?php echo $error17; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6 class="Relab">Relationship (if not Householdhead)</h6>
                                <input type="text" id="Relationship" name="Relationship" class="form-control" placeholder="Relationship" value="<?php echo isset($_POST['Relationship']) ? $_POST['Relationship'] : '';?>">
                                <p class="RelationshipError"></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6>Number of House Members</h6>
                                <input type="text" id="Housemem" name="NoOfHouseMem" class="form-control" placeholder="No. of living household members" value="<?php echo isset($_POST['NoOfHouseMem']) ? $_POST['NoOfHouseMem'] : '';?>">
                                <p class="HousememError"></p>
                            </div>
                            <div class="form-group col-md-3">
                            <h6>Number of Male</h6>
                                <input type="text" id="Maleno" name="NoofMale" class="form-control" placeholder="No of male" value="<?php echo isset($_POST['NoofMale']) ? $_POST['NoofMale'] : '';?>">
                                <p class="MalenoError"></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6>Number of Female</h6>
                                <input type="text" id="Femaleno" name="NoofFemale" class="form-control" placeholder="No of female" value="<?php echo isset($_POST['NoofFemale']) ? $_POST['NoofFemale'] : '';?>">
                                <p class="FemalenoError"></p>
                            </div>
                        </div>
                        <div class="alert alert-danger"></div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <div class="form-check form-check-inline">
                                <h6>Highest Educational Attainment</h6>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="education" type="radio" id="inlineRadio1" value="None" >
                                    <label class="form-check-label" for="inlineRadio1">None</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="education" type="radio" id="inlineRadio2" value="Elementary" >
                                    <label class="form-check-label" for="inlineRadio2">Elementary</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="education" type="radio" id="inlineRadio2" value="High School" >
                                    <label class="form-check-label" for="inlineRadio2">High School</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="education" type="radio" id="inlineRadio2" value="Vocational" >
                                    <label class="form-check-label" for="inlineRadio2">Vocational</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="education" type="radio" id="inlineRadio2" value="College" >
                                    <label class="form-check-label" for="inlineRadio2">College</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="education" type="radio" id="inlineRadio2" value="Post Graduate" >
                                    <label class="form-check-label" for="inlineRadio2">Post Graduate</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                        </div>
                         <hr>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <div class="form-check form-check-inline">
                                    <h6>Person with disability (PWD)? </h6>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="PWD" type="radio" id="inlineRadio1" value="Yes" >
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="PWD" type="radio" id="inlineRadio2" value="No" >
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <div class="form-check form-check-inline">
                                    <h6>4P's Beneficiary? </h6>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="4PS" type="radio" id="inlineRadio1" value="Yes" >
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="4PS" type="radio" id="inlineRadio2" value="No" >
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <div class="form-check form-check-inline">
                                    <h6>Member of an Indigenous group? </h6>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="Indigenous" type="radio" value="Yes" >
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="Indigenous" type="radio" id="inlineRadio2" value="No" >
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6 id="Indilab">if yes (Specification)</h6>
                                <input type="text" id="Indi" name="IndiMember" class="form-control" placeholder="if yes, specify" value="<?php echo isset($_POST['IndiMember']) ? $_POST['IndiMember'] : '';?>">
                                <p class="IndiError"><?php echo $error22; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <div class="form-check form-check-inline">
                                    <h6>With Government ID? </h6>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="GovID" type="radio" id="inlineRadio1" value="Yes" >
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="GovID" type="radio" id="inlineRadio2" value="No" >
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6 id="govlab">if yes (Specification)</h6>
                                <input type="text" id="govid" name="SpecGovID" class="form-control" placeholder="if yes, specify" value="<?php echo isset($_POST['SpecGovID']) ? $_POST['SpecGovID'] : '';?>">
                                <p class="govidError"><?php echo $error23; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check form-check-inline">
                                    <h6>Member of any Farmers Association/Cooperative? </h6>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="MemFAC" type="radio" value="Yes" >
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="MemFAC" type="radio" value="No" > 
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6 id="Flab">if yes (Specification)</h6>
                                <input type="text" id="FAC" name="SpecFAC" class="form-control" placeholder="if yes, specify" value="<?php echo isset($_POST['SpecFAC']) ? $_POST['SpecFAC'] : '';?>">
                                <p class="FACError"><?php echo $error24; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <h6>Person to notify in case of emergency</h6>
                                <input type="text" id="Persontonotif" name="PersontoNotif" class="form-control" placeholder="Person to notify in case of emergency" value="<?php echo isset($_POST['PersontoNotif']) ? $_POST['PersontoNotif'] : '';?>">
                                <p class="PersontonotifError"><?php echo $error25; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                            <h6>Notifier Contact Number</h6>
                                <input type="text" id="notcontact" name="NotifierContactNo" class="form-control" placeholder="Contact Number" value="<?php echo isset($_POST['NotifierContactNo']) ? $_POST['NotifierContactNo'] : '';?>">
                                <p class="notcontactError"><?php echo $error26; ?></p>
                            </div>
                        </div>
                        <div class="alert alert-danger"></div>
                        <h5>Part II: Farm Profile</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check form-check-inline">
                                    <h5>Main Livelihood: </h5>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="livelihood" type="radio" value="Farmer" >
                                    <label class="form-check-label" for="inlineRadio1">Farmer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="livelihood" type="radio" value="Farmworker" >
                                    <label class="form-check-label" for="inlineRadio2">Farmworker/Laborer</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                        </div>
                        <hr>
                            <h5 id="farmerlab">(For Farmers)</h5>
                            <h5 id="farmerlab1">Type of Farming Activity</h5>
                        <div class="form-row" id="Fmer">
                            <div class="form-group col-md-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="FarmingACT" type="radio" value="Rice" >
                                    <label class="form-check-label" for="defaultCheck1">Rice</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="FarmingACT" type="radio" value="Corn" >
                                    <label class="form-check-label" for="defaultCheck1">Corn</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="FarmingACT" type="radio" value="Othercrops" >
                                    <label class="form-check-label" for="defaultCheck1">Othercrops</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" id="otherC" name="OthercropSpec" class="form-control" placeholder="if Othercrops, please specify" value="<?php echo isset($_POST['OthercropSpec']) ? $_POST['OthercropSpec'] : '';?>">
                                <p class="otherCError"><?php echo $error27; ?></p>
                            </div>
                            <p class="errorM"><?php echo $error41; ?></p>
                        </div>
                        <hr>
                            <h5 id="farmworkerlab">(For Farmworkers)</h5>
                            <h5 id="farmworkerlab1">Kind of Work</h5>
                            <div class="form-row" id="Fwork">
                            <div class="form-group col-md-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kindOfwork" type="radio" value="Land_Preparation" >
                                    <label class="form-check-label" for="defaultCheck1">Land Preparation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kindOfwork" type="radio" value="Planting/Transplanting" >
                                    <label class="form-check-label" for="defaultCheck1">Planting/Transplanting</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kindOfwork" type="radio" value="Cultivation" >
                                    <label class="form-check-label" for="defaultCheck1">Cultivation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kindOfwork" type="radio" value="Harvesting" >
                                    <label class="form-check-label" for="defaultCheck1">Harvesting</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kindOfwork" type="radio" value="Others" >
                                    <label class="form-check-label" for="defaultCheck1">Others</label>
                                </div>
                                <p class="errorM"><?php echo $error41; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" id="cropspec" name="SpecKOW" class="form-control" placeholder="if Others, please specify" value="<?php echo isset($_POST['SpecKOW']) ? $_POST['SpecKOW'] : '';?>">
                                <p class="cropspecError"><?php echo $error28; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <h5>Gross Annual Income Last Year: </h5>
                            </div>
                            <div class="form-group col-md-3">
                            <h6>Farming</h6>
                                <input type="text" id="IncomeFarm" name="IncomeFarming" class="form-control" placeholder="Farming" value="<?php echo isset($_POST['IncomeFarming']) ? $_POST['IncomeFarming'] : '';?>">
                                <p class="IncomeFarmError"><?php echo $error29; ?></p>
                            </div>
                            <div class="form-group col-md-3">
                            <h6>Non-Farming</h6>
                                <input type="text" id="IncomenonFarm" name="IncomenonFarming" class="form-control" placeholder="Non-Farming" value="<?php echo isset($_POST['IncomenonFarming']) ? $_POST['IncomenonFarming'] : '';?>">
                                <p class="IncomenonFarmError"><?php echo $error30; ?></p>
                            </div>                  
                        </div>
                        <div class="alert alert-danger"></div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h5>Agrarian Reform Beneficiary (ARB):</h5>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ARB" type="radio" id="inlineRadio1" value="Yes" >
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ARB" type="radio" id="inlineRadio2" value="No" >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>  
                            </div>
                            <p class="errorM"><?php echo $error41; ?></p>
                        </div>
                        <hr>
                        <h5>Farm Land Description</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" id="landloc" name="LandLocation" class="form-control" placeholder="Location (Barangay & Municipality)" value="<?php echo isset($_POST['LandLocation']) ? $_POST['LandLocation'] : '';?>">
                                <p class="landlocError"><?php echo $error31; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                    <select class="form-control" id="docno" name="OwnerDocNo">
                                    <option selected disabled>Ownership Document Number</option>
                                    <option value="1">Certificate Of Land Transfer</option>
                                    <option value="2">Emancipation Patent</option>
                                    <option value="3">Individual Certificate of Land Ownership Award (CLOA)</option>
                                    <option value="4">Collective CLOA</option>
                                    <option value="5">Co-Ownership CLOA</option>
                                    <option value="6">Agricultural Salespatent</option>
                                    <option value="7">Homestead Patent</option>
                                    <option value="8">Free Patent</option>
                                    <option value="9">Certificate of Title or Regular Title</option>
                                    <option value="10">Certificate of Ancestral Domain Title</option>
                                    <option value="11">Certificate of Ancestral Land Title</option>
                                    <option value="12">Tax Declaration</option>
                                </select>
                                <p class="docnoError"></p>
                            </div>
                        </div>
                        <hr>
                        <h5>Ownership</h5>
                        <div class="form-row">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ownership" type="radio" value="Registered_Owner" >
                                <label class="form-check-label" for="inlineRadio1">Registered owner</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ownership" type="radio" value="Tenant" >
                                <label class="form-check-label" for="inlineRadio2">Tenant</label>
                            </div>
                            <div class="form-group col-md-3">
                                <h6>If Tenant</h6>
                                <input type="text" id="Tenant" name="TenantownerName" class="form-control" placeholder=" if Tenant Name of Land Owner" value="<?php echo isset($_POST['TenantownerName']) ? $_POST['TenantownerName'] : '';?>">
                                <p class="TenantError"><?php echo $error34; ?></p>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ownership" type="radio" value="Lessee" >
                                <label class="form-check-label" for="inlineRadio2">Lessee</label>
                            </div>
                            <div class="form-group col-md-3">
                            <h6>If Lessee</h6>
                                <input type="text" id="Lessee" name="LesseeownerName" class="form-control" placeholder="if Lessee Name of Land Owner" value="<?php echo isset($_POST['LesseeownerName']) ? $_POST['LesseeownerName'] : '';?>">
                                <p class="LesseeError"><?php echo $error35; ?></p>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ownership" type="radio" value="OtherOwner" >
                                <label class="form-check-label" for="inlineRadio2">Other Owner</label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" id="otherowner" name="OtherOwnership" class="form-control" placeholder="others" value="<?php echo isset($_POST['OtherOwnership']) ? $_POST['OtherOwnership'] : '';?>">
                                <p class="OtherError"><?php echo $error36; ?></p>
                            </div>
                            <p class="errorM"><?php echo $error41; ?></p>
                        </div>
                        <hr>
                        <div class="alert alert-danger"></div>
                        <div class="form-row">
                            

                            <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Registration</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Register this Farmer</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" id="submit" class="btn btn-danger">Register</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-danger">
                <div class="row">
                    <div class="col-md-1">
                    <a class="btn btn-secondary btn-back" href="farmerrecord.php?=<?php echo $_SESSION['id']; ?>">Back</a>
                    </div>
                    <div class="col-md-1">
                    <button href="#" id="btn-confirm" class="btn btn-secondary btn-up" data-toggle="modal" data-target="#RegModal" disabled>Register</button>
                    </div>
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
                            <option>Certificate Of Land Transfer</li>
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
<script src="../source/gijgo-combined-1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="../js/FarmerRegValidation.js"></script>
<script>
    $(document).ready(function(){
        $("#Birthdate").datepicker({
            uiLibrary: 'bootstrap4',
        }).on('change',function(){
            if(/^\d{2}\/\d{2}\/\d{4}$/.test($("#Birthdate").val())){
                $('#Birthdate').css("border-color","#5cb85c");
                $(".BirthdateError").text("Valid");
                $(".BirthdateError").css("color","#5cb85c");
            }
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#Previmage')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</html>