<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function Reg_Input($data)
    {
        $data = trim($data); 
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    date_default_timezone_set('Asia/Manila');
$Date = date("Y-m-d");
$Time = date("H:i:s");
    $Id = $_POST['Id'];
    $extname = Reg_Input($_POST['ExtensionName']);
    $Educ = Reg_Input($_POST['education']);

    if (!empty($_POST['RefNo'])) {
        if(preg_match('(^[A-Za-z0-9_-]*$)',$_POST['RefNo'])){
            $RefNo = Reg_Input($_POST['RefNo']);
        }else{
            $error = "Invalid Input!";
        }
    } else {
        $error = "Reference/Control Number is required";
    }

    if (!empty($_POST['SurName'])) {
        if(preg_match('(^[a-zA-Z\/s_ ]*$)',$_POST['SurName'])){
            $Surname = Reg_Input($_POST['SurName']);
        }else{
            $error1 = "Invalid input! Surname must be letter only";
        }        
    } else {
        $error1 = "Surname is required";
    }

    if (!empty($_POST['FirstName'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['FirstName'])){
            $Firstname = Reg_Input($_POST['FirstName']);
        }else{
            $error2 = "Invalid input! First Name must be letter only";
        }
    } else {
        $error2 = "First Name is required";
    }
    
    if (!empty($_POST['MiddleName'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['MiddleName'])){
            $Middlename = Reg_Input($_POST['MiddleName']);
        }else{
            $error3 = "Invalid input! Middle Name must be letter only";
        }
    } else {
        $error3 = "Middle Name is required";
    }

    if (empty($_POST['HLB'])) {
        $error5 = "House/Lot/BLDG.No is required";
    } else {
        $HLB = Reg_Input($_POST['HLB']);
    }

    if (empty($_POST['SSS'])) {
        $error6 = "Street/Sitio/Subdivision is required";
    } else {
        $SSS = Reg_Input($_POST['SSS']);
    }
 
    if (!empty($_POST['Barangay'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['Barangay'])){
            $Brgy = Reg_Input($_POST['Barangay']);
        }else{
            $error7 = "Invalid input! Barangay must be letter only";
        }
    } else {
        $error7 = "Barangay is required";
    }
    
    if (!empty($_POST['MC'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['MC'])){
            $MuniC = Reg_Input($_POST['MC']);
        }else{
            $error8 = "Invalid input! Municipality/City must be letter only";
        }
    } else {
        $error8 = "Municipality/City is required";
    }

    if (!empty($_POST['Province'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['Province'])){
            $Province = Reg_Input($_POST['Province']);
        }else{
            $error9 = "Invalid input! Province must be letter only";
        }
    } else {
        $error9 = "Province is required";
    }

    if (!empty($_POST['Region'])) {
        if(preg_match('(^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$)',$_POST['Region'])){
            $Region = Reg_Input($_POST['Region']);
        }else{
            $error10 = "Invalid input! Region must be letter or Number only";
        }
    } else {
        $error10 = "Region is required";
    }

    if (!empty($_POST['ContactNo'])) {
        if(preg_match('(^(\+)(\d){12}$)',$_POST['ContactNo'])){
            $ContactNo = Reg_Input($_POST['ContactNo']);
        }else{
            $error11 = "Invalid Input for Contact Number use +639XXX format";
        }
    }else{
        $error11 = "Contact Number is required";
    }

    if (!empty($_POST['Birthdate'])) {
        if(preg_match('(^\d{2}\/\d{2}\/\d{4}$)',$_POST['Birthdate'])){
            $Birthdate = Reg_Input($_POST['Birthdate']);
        }else{
            $error12 = "Invalid Format! Birthdate format: MM/DD/YYYY";
        }
    } else {
        $error12 = "Birthdate is required";
    }

    if (!empty($_POST['BirthPlace'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['BirthPlace'])){
            $BirthP = Reg_Input($_POST['BirthPlace']);
        }else{
            $error13 = "Invalid input! Birth Place must be letter only";
        }
    } else {
        $error13 = "Place of Birth is required";
    }

    if (!empty($_POST['Religion'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['Religion'])){
            $Religion = Reg_Input($_POST['Religion']);
        }else{
            $error14 = "Invalid input! Religion must be letter only";
        }
    } else {
        $error14 = "Religion is required";
    }

    if(!empty($_POST['stat'])){
        if(strcasecmp($_POST['stat'],'Married') == 0|| strcasecmp($_POST['stat'],'married') == 0){
            if (!empty($_POST['SpouseName'])) {
                if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['SpouseName'])){
                    $Spousename = Reg_Input($_POST['SpouseName']);
                }else{
                    $error15 = "Invalid input! Spouse Name must be letter only";
                }
            } else {
                $error15 = "Spouse Name is required";
            }
        }else{
            $Status = Reg_Input($_POST['stat']);
        }
    }else{
        $Uerror = "Input is Required";
    }

    if (!empty($_POST['MotherMaidenName'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['MotherMaidenName'])){
            $MotherMaidenName = Reg_Input($_POST['MotherMaidenName']);
        }else{
            $error16 = "Invalid input! Mother's Maiden Name must be letter only";
        }
    } else {
        $error16 = "Mother's Maiden name is required";
    }

    if(!empty($_POST['Householdhead'])){
        if(strcasecmp($_POST['Householdhead'], 'No')==0){
            if (!empty($_POST['HouseHoldName'])) {
                if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['HouseHoldName'])){
                    $HouseHoldname = Reg_Input($_POST['HouseHoldName']);
                    $Householdhead = Reg_Input($_POST['Householdhead']);
                }else{
                    $error17 = "Invalid input! HouseHold Name must be letter only";
                }
            } else {
                $error17 = "HouseHold Name is required";
            }
        }else{
            $Householdhead = Reg_Input($_POST['Householdhead']);
        }
    }else{
        $Uerror4 = "Input is Required";
    }
    if (!empty($_POST['Relationship'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['Relationship'])){
            $Relationship = Reg_Input($_POST['Relationship']);
        }else{
            $error18 = "Invalid input! Relationship must be letter only";
        }
    } else {
        $error18 = "Relationship is required";
    }

    if (!empty($_POST['NoOfHouseMem'])) {
        if(preg_match('(^[0-9]*$)',$_POST['NoOfHouseMem'])){
            $NoOfHouseMem = Reg_Input($_POST['NoOfHouseMem']);
        }else{
            $error19 = "No. of House Member must be numbers only";
        }
    } else {
        $error19 = "Number of Living Household Members is required";
    }

    if (!empty($_POST['NoofMale'])) {
        if(preg_match('(^[0-9]*$)',$_POST['NoofMale'])){
            $NoofMale = Reg_Input($_POST['NoofMale']);
        }else{
            $error20 = "No. of Male must be numbers only";
        }
    } else {
        $error20 = "Number of Male is required";
    }

    if (!empty($_POST['NoofFemale'])) {
        if(preg_match('(^[0-9]*$)',$_POST['NoofFemale'])){
            $NoofFemale = Reg_Input($_POST['NoofFemale']);
        }else{
            $error21 = "No. of Female must be numbers only";
        }
    } else {
        $error21 = "Number of Female is required";
    }

    if(!empty($_POST['4PS'])){
        if(strcasecmp($_POST['4PS'],'Yes') == 0 || strcasecmp($_POST['4PS'],'yes') == 0){
            $FourPs = Reg_Input($_POST['4PS']);
        }else{
            $FourPs = "No";
        }
    }else{
        $Uerror10 = "This field is required";
    }

    if(!empty($_POST['PWD'])){
        if(strcasecmp($_POST['PWD'],'Yes') == 0 || strcasecmp($_POST['PWD'],'yes') == 0){
            $PWD = Reg_Input($_POST['PWD']);
        }else{
            $PWD = "No";
        }
    }else{
        $Uerror9 = "This field is required";
    }

    if(!empty($_POST['Indigenous'])){
        if(strcasecmp($_POST['Indigenous'],'Yes') == 0 || strcasecmp($_POST['Indigenous'],'yes') == 0){
            if (!empty($_POST['IndiMember'])) {
                if(preg_match('(^[a-zA-Z\/s]*$)',$_POST['IndiMember'])){
                    $IndiMember = Reg_Input($_POST['IndiMember']);
                    $Indigenous = Reg_Input($_POST['Indigenous']);
                }else{
                    $error22 = "Invalid input! Indigenous Member must be letter only";
                }
            } else {
                $error22 = "Indegenous Member is required";
            }
        }else{
            $Indigenous = "No";
            $IndiMember = "N/A";
        }
    }else{
        $Uerror5 = "Input is Required";
    }

    if(!empty($_POST['GovID'])){
        if(strcasecmp($_POST['GovID'],'Yes') == 0 || strcasecmp($_POST['GovID'],'yes') == 0){
            if (!empty($_POST['SpecGovID'])) {
                if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['SpecGovID'])){
                    $SpecGovID = Reg_Input($_POST['SpecGovID']);
                    $GovID = Reg_Input($_POST['GovID']);
                }else{
                    $error23 = "Invalid input! ID specification must be letter only";
                }
            } else {
                $error23 = "Government ID specification is required";
            }
        }else{
            $GovID ='No';
            $SpecGovID = "N/A";
        }
    }else{
        $Uerror7 = "This field is required";

    }
    if(!empty($_POST['MemFAC'])){
        if(strcasecmp($_POST['MemFAC'],'Yes') == 0 || strcasecmp($_POST['MemFAC'],'yes') == 0){
            if (!empty($_POST['SpecFAC'])) {
                if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['SpecFAC'])){
                    $SpecFAC = Reg_Input($_POST['SpecFAC']);
                    $MemFAC = Reg_Input($_POST['MemFAC']);
                }else{
                    $error24 = "Invalid input! Specification must be letter only";
                }
            } else {
                $error24 = "Specification is required";
            }
        }else{
            $MemFAC = "No";
            $SpecFAC = "N/A";
        }
    }else{
        $Uerror8 = "This field is required";
    }

    if (!empty($_POST['PersontoNotif'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['PersontoNotif'])){
            $PersontoNotif = Reg_Input($_POST['PersontoNotif']);
        }else{
            $error25 = "Invalid input! Person to Notify must be letter only";
        }
    } else {
        $error25 = "Person to Notify is required";
    }

    if (!empty($_POST['NotifierContactNo'])) {
        if(preg_match('(^(\+)(\d){12}$)',$_POST['NotifierContactNo'])){
            $NotifierContactNo = Reg_Input($_POST['NotifierContactNo']);
        }else{
            $error26 = "Invalid Input for Contact Number use +639XXX format";
        }
    }else{
        $error26 = "Contact Number is required";
    }

    if(!empty($_POST['livelihood'])){
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['livelihood'])){
            $Livelihoods = Reg_Input($_POST['livelihood']);
        }
    }
    if(strcasecmp($_POST['livelihood'], 'Farmer') == 0){
        if(strcasecmp($_POST['FarmingACT'],'Rice') == 0 || strcasecmp($_POST['FarmingACT'],'Corn') == 0){
            $FarmingACTs = Reg_Input($_POST['FarmingACT']);
        }else if(strcasecmp($_POST['FarmingACT'],'Others') == 0){
            $FarmingACTs = Reg_Input($_POST['FarmingACT']);
            if(empty($_POST['OthercropSpec'])){
                $error27 = "if Others this field is required";
            }else{
                $OthercropSpecs = Reg_Input($_POST['OthercropSpec']);
            }

        }else{
            $Uerror12 = "Input must be Rice, Corn or Others";
        }
    }else if(strcasecmp($_POST['livelihood'], 'Farmworker/Laborer') == 0 || strcasecmp($_POST['livelihood'], 'Farmworker') == 0 || strcasecmp($_POST['livelihood'], 'Laborer') == 0){
        $kindOfworks = Reg_Input($_POST['kindOfwork']);
        if(strcasecmp($_POST['kindOfwork'],'Others') == 0){
            if(empty($_POST['SpecKOW'])){
                $error28 = "if Others this field is required";
            }else{
                $SpecKOWs = Reg_Input($_POST['SpecKOW']);
            }
        }
    }else{
        $Uerror12 = "Input mut be Farmer or Farmworker/Laborer either Farmworker or Laborer";
    }

    if (!empty($_POST['IncomeFarming'])) {
        if(preg_match('(^[0-9]*$)',$_POST['IncomeFarming'])){
            $IncomeFarming = Reg_Input($_POST['IncomeFarming']);
        }else{
            $error29 = "Farming Income must be numbers only";
        }
    } else {
        $error29 = "Farming Income is required";
    }

    if (!empty($_POST['IncomenonFarming'])) {
        if(preg_match('(^[0-9]*$)',$_POST['IncomenonFarming'])){
            $IncomenonFarming = Reg_Input($_POST['IncomenonFarming']);
        }else{
            $error30 = "Non-farming Income must be numbers only";
        }
    } else {
        $error30 = "Non-farming Income is required";
    }

    if (!empty($_POST['education'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['education'])){
            $Education = Reg_Input($_POST['education']);
        }else{
            $Uerror1 = "Invalid input! Input must be letter only";
        }
    } else {
        $Uerror1 = "Input is required";
    }

    if (!empty($_POST['Sex'])) {
        if(preg_match('(^[a-zA-Z\/s ]+$)',$_POST['Sex'])){
            $Sex = Reg_Input($_POST['Sex']);
        }else{
            $Uerror2 = "Invalid input! Input must be letter only";
        }
    } else {
        $Uerror2 = "Input is required";
    }
    
    $UpdateFarmData = mysqli_query($connect_db,"UPDATE farmer_data SET ReferenceControlNo = '$RefNo',Surname = '$Surname',Firstname = '$Firstname',Middlename = '$Middlename',Extensionname = '$extname',Sex = '$Sex',House_Lot_BLDGNo = '$HLB',Street_Sitio_SUBDV = '$SSS',
    Barangay = '$Brgy',Municipality_City = '$MuniC',Province = '$Province', Region = '$Region',Contact_number = '$ContactNo',Birthdate = '$Birthdate',Place_of_Birth = '$BirthP',Religion = '$Religion',Civil_status = '$Status',Name_of_Spouse = '$Spousename',Mother_maidenname = '$MotherMaidenName',householded = '$Householdhead',
    name_ofhouseholdhead = '$HouseHoldname',Relationship = '$Relationship',no_oflivinghouse_members = '$NoOfHouseMem',no_ofMale = '$NoofMale',no_ofFemale = '$NoofFemale',Education_attainment = '$Educ',person_with_disability = '$PWD',FourPs_beneficiary = '$FourPs',memberof_indigengroup = '$Indigenous',
    specify_if_yes = '$IndiMember',with_governmentID = '$GovID',specify_if_yes1 = '$SpecGovID',memberof_FAC = '$MemFAC',specify_if_yes2 = '$SpecFAC',person_tonotify = '$PersontoNotif',person_contactNo = '$NotifierContactNo'  WHERE u_id = '$Id'");

    $UpdateFarmProfile = mysqli_query($connect_db,"UPDATE farm_profile SET Main_Livelihood = '$Livelihoods',type_ofFarmingAct = '$FarmingACTs',othercrops_specify = '$OthercropSpecs',kind_ofwork = '$kindOfworks',other_specify = '$SpecKOWs',
    farming_income = '$IncomeFarming',non_farming = '$IncomenonFarming' WHERE u_id = '{$Id}'");

    if ($UpdateFarmData === TRUE && $UpdateFarmProfile === TRUE){

        if($UpdateFarmProfile === TRUE){
            mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Farmer profile has been modified','{$Time}','{$Date}')");
            header("Location:viewFarmer.php?id=$Id");
        }else{
            $errorinsert = "Error 2".mysqli_error($connect_db);
        }
    }else{
        $errorinsert = "Error 1".mysqli_error($connect_db);
    }
}
?>