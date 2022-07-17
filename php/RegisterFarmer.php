<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function Reg_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $FarmParcel = 1;
    date_default_timezone_set('Asia/Manila');
    $Date = date("Y-m-d");
    $Time = date("H:i:s");

        $Sex = Reg_Input($_POST['Sex']);
        $Status = Reg_Input($_POST['stat']);
        $Householdhead = Reg_Input($_POST['Householdhead']);
        $Education = Reg_Input($_POST['education']);
        $PWD = Reg_Input($_POST['PWD']);
        $FourPs = Reg_Input($_POST['4PS']);
        $Indigenous = Reg_Input(($_POST['Indigenous']));
        $GovID = Reg_Input($_POST['GovID']);
        $MemFAC = Reg_Input($_POST['MemFAC']);
        $Livelihood = Reg_Input($_POST['livelihood']);
        $FarmingACT = Reg_Input($_POST['FarmingACT']);
        $kindOfwork = Reg_Input($_POST['kindOfwork']);
        $ARB = Reg_Input($_POST['ARB']);
        $Ownership = Reg_Input($_POST['ownership']);

    $Date = date("Y-m-d");
    $fsDate = date('Y-m-d', strtotime("+6 months", strtotime($Date))); 
    
    if(!empty($_FILES['farmer_img'])){
        $targetDir = "../farmer_image/";
        $fileName = basename($_FILES["farmer_img"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','gif','jfif');
        if(in_array($fileType, $allowTypes)){
            move_uploaded_file($_FILES["farmer_img"]["tmp_name"], $targetFilePath);
        }
    }

    if (empty($_POST['RefNo'])) {
        $error = "Reference/Control Number is required";
    } else {
        if(preg_match('(^[A-Za-z0-9_-]*$)',$_POST['RefNo'])){
            $RefNo = Reg_Input($_POST['RefNo']);
        }else{
            $error = "Invalid Input!";
        }       
    }

    if (empty($_POST['SurName'])) {
        $error1 = "Surname is required";
    } else {
        if(preg_match('(^[a-zA-Z\s_ ]*$)',$_POST['SurName'])){
            $Surname = Reg_Input($_POST['SurName']);
        }else{
            $error1 = "Invalid input! Surname must be letter only";
        }         
    }

    if (empty($_POST['FirstName'])) {
        $error2 = "First Name is required";
    } else {
        if(preg_match("(^[a-zA-Z\s\.'_]*$)",$_POST['FirstName'])){
            $Firstname = Reg_Input($_POST['FirstName']);
        }else{
            $error2 = "Invalid input! First Name must be letter only";
        }
    }
    
    if (empty($_POST['MiddleName'])) {
        $error3 = "Middle Name is required";
    } else {
        if(preg_match('(^[a-zA-Z\s_ ]*$)',$_POST['MiddleName'])){
            $Middlename = Reg_Input($_POST['MiddleName']);
        }else{
            $error3 = "Invalid input! Middle Name must be letter only";
        }        
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
 
    if (empty($_POST['Barangay'])) {
        $error7 = "Barangay is required";
    } else {
        if(preg_match('(^[a-zA-Z\s_ ]*$)',$_POST['Barangay'])){
            $Barangay = Reg_Input($_POST['Barangay']);
        }else{
            $error7 = "Invalid input! Barangay must be letter only";
        }        
    }
    
    if (empty($_POST['MC'])) {
        $error8 = "Municipality/City is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['MC'])){
            $MC = Reg_Input($_POST['MC']);
        }else{
            $error8 = "Invalid input! Municipality/City must be letter only";
        }      
    }

    if (empty($_POST['Province'])) {
        $error9 = "Province is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['Province'])){
            $Province = Reg_Input($_POST['Province']);
        }else{
            $error9 = "Invalid input! Province must be letter only";
        }      
    }

    if (empty($_POST['Region'])) {
        $error10 = "Region is required";
    } else {
        if(preg_match('(^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$)',$_POST['Region'])){
            $Region = Reg_Input($_POST['Region']);
        }else{
            $error10 = "Invalid input! Region must be letter or Number only";
        }      
    }

    if (empty($_POST['ContactNo'])) {
        $error11 = "Contact Number is required";
    }else{
        if(preg_match('(^(\+)(\d){12}$)',$_POST['ContactNo'])){
            $ContactNo = Reg_Input($_POST['ContactNo']);
        }else{
            $error11 = "Invalid Input for Contact Number use +639XXX format";
        }       
    }

    if (empty($_POST['Birthdate'])) {
        $error12 = "Birthdate is required";
    } else {
        if(preg_match('(^\d{2}\/\d{2}\/\d{4}$)',$_POST['Birthdate'])){
            $Birthdate = Reg_Input($_POST['Birthdate']);
        }else{
            $error12 = "Invalid Format! Birthdate format: MM/DD/YYYY";
        }      
    }

    if (empty($_POST['BirthPlace'])) {
        $error13 = "Place of Birth is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['BirthPlace'])){
            $BirthPlace = Reg_Input($_POST['BirthPlace']);
        }else{
            $error13 = "Invalid input! Birth Place must be letter only";
        }       
    }

    if (empty($_POST['Religion'])) {
        $error14 = "Religion is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['Religion'])){
            $Religion = Reg_Input($_POST['Religion']);
        }else{
            $error14 = "Invalid input! Religion must be letter only";
        }        
    }

    if($Status === "Married"){
        if (empty($_POST['SpouseName'])) {
            $error15 = "Spouse Name is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['SpouseName'])){
                $Spousename = Reg_Input($_POST['SpouseName']);
            }else{
                $error15 = "Invalid input! Spouse Name must be letter only";
            }            
        }
    }

    if (empty($_POST['MotherMaidenName'])) {
        $error16 = "Mother's Maiden name is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['MotherMaidenName'])){
            $MotherMaidenName = Reg_Input($_POST['MotherMaidenName']);
        }else{
            $error16 = "Invalid input! Mother's Maiden Name must be letter only";
        }        
    }

    if($Householdhead === "No"){
        if (empty($_POST['HouseHoldName'])) {
            $error17 = "HouseHold Name is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['HouseHoldName'])){
                $HouseHoldname = Reg_Input($_POST['HouseHoldName']);
            }else{
                $error17 = "Invalid input! HouseHold Name must be letter only";
            }           
        }
    }
    if (empty($_POST['Relationship'])) {
        $error18 = "Relationship is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['Relationship'])){
            $Relationship = Reg_Input($_POST['Relationship']);
        }else{
            $error18 = "Invalid input! Relationship must be letter only";
        }       
    }

    if (empty($_POST['NoOfHouseMem'])) {
        $error19 = "Number of Living Household Members is required";
    } else {
        if(preg_match('(^[0-9]*$)',$_POST['NoOfHouseMem'])){
            $NoOfHouseMem = Reg_Input($_POST['NoOfHouseMem']);
        }else{
            $error19 = "No. of House Member must be numbers only";
        }      
    }

    if (empty($_POST['NoofMale'])) {
        $error20 = "Number of Male is required";
    } else {
        if(preg_match('(^[0-9]*$)',$_POST['NoofMale'])){
            $NoofMale = Reg_Input($_POST['NoofMale']);
        }else{
            $error20 = "No. of Male must be numbers only";
        }      
    }

    if (empty($_POST['NoofFemale'])) {
        $error21 = "Number of Female is required";
    } else {
        if(preg_match('(^[0-9]*$)',$_POST['NoofFemale'])){
            $NoofFemale = Reg_Input($_POST['NoofFemale']);
        }else{
            $error21 = "No. of Female must be numbers only";
        }       
    }

    if($Indigenous === "Yes"){
        if (empty($_POST['IndiMember'])) {
            $error22 = "Indegenous Member is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['IndiMember'])){
                $IndiMember = Reg_Input($_POST['IndiMember']);
            }else{
                $error22 = "Invalid input! Indigenous Member must be letter only";
            }           
        }
    }

    if($GovID === "Yes"){
        if (empty($_POST['SpecGovID'])) {
            $error23 = "Government ID specification is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['SpecGovID'])){
                $SpecGovID = Reg_Input($_POST['SpecGovID']);
            }else{
                $error23 = "Invalid input! ID specification must be letter only";
            }           
        }
    }

    if($MemFAC === "Yes"){
        if (empty($_POST['SpecFAC'])) {
            $error24 = "Specification is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['SpecFAC'])){
                $SpecFAC = Reg_Input($_POST['SpecFAC']);
            }else{
                $error24 = "Invalid input! Specification must be letter only";
            }            
        }
    }

    if (empty($_POST['PersontoNotif'])) {
        $error25 = "Person to Notify is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['PersontoNotif'])){
            $PersontoNotif = Reg_Input($_POST['PersontoNotif']);
        }else{
            $error25 = "Invalid input! Person to Notify must be letter only";
        }       
    }

    if (empty($_POST['NotifierContactNo'])) {
        $error26 = "Contact Number is required";
    }else{
        if(preg_match('(^(\+)(\d){12}$)',$_POST['NotifierContactNo'])){
            $NotifierContactNo = Reg_Input($_POST['NotifierContactNo']);
        }else{
            $error26 = "Invalid Input for Contact Number use +639XXX format";
        }       
    }

    if($Livelihood === "Farmer"){
        if($FarmingACT === "Othercrops"){
            if (empty($_POST['OthercropSpec'])) {
                $error27 = "Specification is required";
            } else {
                if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['OthercropSpec'])){
                    $OthercropSpec = Reg_Input($_POST['OthercropSpec']);
                }else{
                    $error27 = "Invalid input! Specifications must be letter only";
                }               
            }
        }
    }else if($Livelihood === "Farmworker"){
        if($kindOfwork === "Others"){
            if (empty($_POST['SpecKOW'])) {
                $error28 = "Specification is required";
            } else {
                if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['SpecKOW'])){
                    $SpecKOW = Reg_Input($_POST['SpecKOW']);
                }else{
                    $error28 = "Invalid input! Specification must be letter only";
                }
                
            }
        }
    }

    if (empty($_POST['IncomeFarming'])) {
        $error29 = "Farming Income is required";
    } else {
        if(preg_match('(^[0-9]*$)',$_POST['IncomeFarming'])){
            $IncomeFarming = Reg_Input($_POST['IncomeFarming']);
        }else{
            $error29 = "Farming Income must be numbers only";
        }        
    }

    if (empty($_POST['IncomenonFarming'])) {
        $error30 = "Non-farming Income is required";
    } else {
        if(preg_match('(^[0-9]*$)',$_POST['IncomenonFarming'])){
            $IncomenonFarming = Reg_Input($_POST['IncomenonFarming']);
        }else{
            $error30 = "Non-farming Income must be numbers only";
        }       
    }

    if (empty($_POST['LandLocation'])) {
        $error31 = "Land Location is required";
    } else {
        if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['LandLocation'])){
            $LandLocation = Reg_Input($_POST['LandLocation']);
        }else{
            $error31 = "Invalid input! Land Location must be letter only";
        }       
    }

    if (empty($_POST['TotalArea'])) {
        $error32 = "Total Area is required";
    } else {
        if(preg_match('(^[0-9]*$)',$_POST['TotalArea'])){
            $TotalArea = Reg_Input($_POST['TotalArea']);
        }else{
            $error32 = "Total Area must be numbers only";
        }       
    }

    if (empty($_POST['OwnerDocNo'])) {
        $error33 = "Owner Document No. is required";
    } else {
        if(preg_match('(^[0-9]*$)',$_POST['OwnerDocNo'])){
            $OwnerDocNo = Reg_Input($_POST['OwnerDocNo']);
        }else{
            $error33 = "Owner Document No. must be numbers only";
        }       
    }

    if($Ownership === "Tenant"){
        if (empty($_POST['TenantownerName'])) {
            $error34 = "Tenant owner name is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['TenantownerName'])){
                $TenantownerName = Reg_Input($_POST['TenantownerName']);
            }else{
                $error34 = "Invalid input! Tenant owner name must be letter only";
            }           
        }
    }else if($Ownership === "Lessee"){
        if (empty($_POST['LesseeownerName'])) {
            $error35 = "Lessee Owner Name is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['LesseeownerName'])){
                $LesseeownerName = Reg_Input($_POST['LesseeownerName']);
            }else{
                $error35 = "Invalid input! Lessee owner name must be letter only";
            }            
        }
    }else if($Ownership === "OtherOwner"){
        if (empty($_POST['OtherOwnership'])) {
            $error36 = "Other Ownership is required";
        } else {
            if(preg_match('(^[a-zA-Z\s ]*$)',$_POST['OtherOwnership'])){
                $OtherOwnership = Reg_Input($_POST['OtherOwnership']);
            }else{
                $error36 = "Invalid input! Other ownership must be letter only";
            }           
        }
    }

    if (empty($_POST['RefNo']) && empty($_POST['SurName']) && empty($_POST['FirstName']) && empty($_POST['MiddleName']) && empty($_POST['ExtensionName']) && empty($_POST['HLB']) && empty($_POST['SSS'])
    && empty($_POST['Barangay']) && empty($_POST['MC']) && empty($_POST['Province']) && empty($_POST['Region']) && empty($_POST['ContactNo']) && empty($_POST['Birthdate']) && empty($_POST['BirthPlace'])
    && empty($_POST['Religion']) && empty($_POST['SpouseName']) && empty($_POST['MotherMaidenName']) && empty($_POST['Relationship'])
    && empty($_POST['NoOfHouseMem']) && empty($_POST['NoofMale']) && empty($_POST['NoofFemale']) && empty($_POST['PersontoNotif']) && empty($_POST['NotifierContactNo'])
    && empty($_POST['OthercropSpec']) && empty($_POST['SpecKOW']) && empty($_POST['IncomeFarming']) && empty($_POST['IncomenonFarming']) && empty($_POST['LandLocation']) && empty($_POST['TotalArea']) && empty($_POST['OwnerDocNo'])
    && empty($_POST['TenantownerName']) && empty($_POST['LesseeownerName'])){
        $error41 = "This field is required";
    }else{
        $InsertFarmData = ("INSERT into farmer_data(ReferenceControlNo,Surname,Firstname,Middlename,Extensionname,Sex,House_Lot_BLDGNo,Street_Sitio_SUBDV,
        Barangay,Municipality_City,Province,Region,Contact_number,Birthdate,Place_of_Birth,Religion,Civil_status,Name_of_Spouse,Mother_maidenname,householded,
        name_ofhouseholdhead,Relationship,no_oflivinghouse_members,no_ofMale,no_ofFemale,Education_attainment,person_with_disability,FourPs_beneficiary,memberof_indigengroup,
        specify_if_yes,with_governmentID,specify_if_yes1,memberof_FAC,specify_if_yes2,person_tonotify,person_contactNo,image,Date_created,update_sched)
        VALUES ('{$RefNo}','{$Surname}','{$Firstname}','{$Middlename}','{$Extensionname}','{$Sex}','{$HLB}','{$SSS}','{$Barangay}','{$MC}','{$Province}',
        '{$Region}','{$ContactNo}','{$Birthdate}','{$BirthPlace}','{$Religion}','{$Status}','{$Spousename}','{$MotherMaidenName}','{$Householdhead}',
        '{$HouseHoldname}','{$Relationship}','{$NoOfHouseMem}','{$NoofMale}','{$NoofFemale}','{$Education}','{$PWD}','{$FourPs}','{$Indigenous}',
        '{$IndiMember}','{$GovID}','{$SpecGovID}','{$MemFAC}','{$SpecFAC}','{$PersontoNotif}','{$NotifierContactNo}','{$fileName}','{$Date}','{$fsDate}')");

        $Find = mysqli_query($connect_db,"SELECT * From farmer_data Where ReferenceControlNo = '{$RefNo}'");

        if(mysqli_num_rows($Find) > 0){
            $field_error = "This Farmer is already exist";
        }else{

            if ($connect_db->query($InsertFarmData) === TRUE){
                $Insertuid = $connect_db->insert_id;
                $InsertFarmProfile = "INSERT into farm_profile(u_id,Main_Livelihood,type_ofFarmingAct,othercrops_specify,kind_ofwork,other_specify,
                farming_income,non_farming) VALUES ('{$Insertuid}','{$Livelihood}','{$FarmingACT}','{$OthercropSpec}','{$kindOfwork}','$SpecKOW',
                '$IncomeFarming','$IncomenonFarming')";

                if ($connect_db->query($InsertFarmProfile) === TRUE){
                    $InsertFarmLand = "INSERT into farm_land(u_id,ARB,location,tot_farm_area,ownership_docNo,Ownership,tenant_landOwnname,lessee_landOwnername,otherowner) VALUES ('{$Insertuid}','{$ARB}','{$LandLocation}','{$TotalArea}','{$OwnerDocNo}','{$Ownership}','{$TenantownerName}','{$LesseeownerName}','$OtherOwnership')";

                    if ($connect_db->query($InsertFarmLand) === TRUE){
                        mysqli_query($connect_db,"INSERT INTO transaction_logs(t_activity,t_time,t_date) VALUES ('Farmer is added to record','{$Time}','{$Date}')");
                        header("Location:farmerrecord.php?Farmer Added Succesfully");
                    }else{
                        $errorinsert = "Error Inserting 3rd set of data".mysqli_error($connect_db);
                    }
                }else{
                    $errorinsert = "Error Inserting 2nd set of data";
                }
            }else{
                $errorinsert = mysqli_error($connect_db);
            }
        }
    }

}
?>