<?php
    require_once("config.php");
    $result = mysqli_query($connect_db, "SELECT * FROM admin_account ORDER BY admin_id Asc");
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] = $res['admin_id'];
    if ($_SESSION['id'] != $_SESSION['id']) {
        header("Location:index.php");
        exit();
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $landcount = mysqli_query($connect_db,"SELECT SUM(NoofFarmParcel),SUM(size_ha) FROM land_parcel WHERE u_id = $id;");
    $Cland = mysqli_fetch_array($landcount);
    $landfarm = mysqli_query($connect_db,"SELECT * FROM farm_land WHERE u_id = $id");
    $LandFarm  = mysqli_fetch_array($landfarm);

    $resultRecord = mysqli_query($connect_db, "SELECT farmer_data.ReferenceControlNo,farmer_data.Surname,farmer_data.Firstname,farmer_data.Middlename,farmer_data.Extensionname,farmer_data.Sex,farmer_data.House_Lot_BLDGNo,farmer_data.Street_Sitio_SUBDV,
    farmer_data.Barangay,farmer_data.Municipality_City,farmer_data.Province,farmer_data.Region,farmer_data.Contact_number,farmer_data.Birthdate,farmer_data.Place_of_Birth,farmer_data.Religion,farmer_data.Civil_status,farmer_data.Name_of_Spouse,farmer_data.Mother_maidenname,farmer_data.householded,
    farmer_data.name_ofhouseholdhead,farmer_data.Relationship,farmer_data.no_oflivinghouse_members,farmer_data.no_ofMale,farmer_data.no_ofFemale,farmer_data.Education_attainment,farmer_data.person_with_disability,farmer_data.FourPs_beneficiary,farmer_data.memberof_indigengroup,
    farmer_data.specify_if_yes,farmer_data.with_governmentID,farmer_data.specify_if_yes1,farmer_data.memberof_FAC,farmer_data.specify_if_yes2,farmer_data.person_tonotify,farmer_data.person_contactNo,farmer_data.image,farmer_data.Date_created,farm_profile.u_id,farm_profile.Main_Livelihood,
    farm_profile.type_ofFarmingAct,farm_profile.othercrops_specify,farm_profile.kind_ofwork,farm_profile.other_specify,farm_profile.farming_income,farm_profile.non_farming FROM farmer_data,farm_profile WHERE farmer_data.u_id = $id AND farm_profile.u_id = $id");

        $resRecord = mysqli_fetch_array($resultRecord, MYSQLI_ASSOC);
      
        $RefNo = $resRecord['ReferenceControlNo']; $Surname = $resRecord['Surname']; $Firstname = $resRecord['Firstname']; $Middlename = $resRecord['Middlename']; $Extensionname = $resRecord['Extensionname']; $Sex = $resRecord['Sex']; $HLB = $resRecord['House_Lot_BLDGNo']; $SSS = $resRecord['Street_Sitio_SUBDV'];
        $Barangay = $resRecord['Barangay']; $MC = $resRecord['Municipality_City']; $Province = $resRecord['Province']; $Region = $resRecord['Region']; $ContactNo = $resRecord['Contact_number']; $BirthPlace = $resRecord['Place_of_Birth']; $Religion = $resRecord['Religion'];
        $Status = $resRecord['Civil_status']; $Spousename = $resRecord['Name_of_Spouse']; $MotherMaidenName = $resRecord['Mother_maidenname']; $Householdhead = $resRecord['householded'];$HouseHoldname = $resRecord['name_ofhouseholdhead']; $Relationship = $resRecord['Relationship'];
        $NoOfHouseMem = $resRecord['no_oflivinghouse_members']; $NoofMale = $resRecord['no_ofMale']; $NoofFemale = $resRecord['no_ofFemale']; $Education = $resRecord['Education_attainment']; $PWD = $resRecord['person_with_disability']; $FourPs = $resRecord['FourPs_beneficiary']; $Indigenous = $resRecord['memberof_indigengroup'];
        $IndiMember = $resRecord['specify_if_yes']; $GovID = $resRecord['with_governmentID']; $SpecGovID = $resRecord['specify_if_yes1']; $MemFAC = $resRecord['memberof_FAC']; $SpecFAC = $resRecord['specify_if_yes2']; $PersontoNotif = $resRecord['person_tonotify']; $NotifierContactNo = $resRecord['person_contactNo']; $Livelihood = $resRecord['Main_Livelihood'];
        $FarmingACT = $resRecord['type_ofFarmingAct']; $OthercropSpec = $resRecord['othercrops_specify']; $kindOfwork = $resRecord['kind_ofwork']; $SpecKOW = $resRecord['other_specify']; $IncomeFarming = $resRecord['farming_income']; $IncomenonFarming = $resRecord['non_farming'];

        $rec_birthdate = date($resRecord['Birthdate']);
        $oldB_timestamp = strtotime($rec_birthdate);
        $Birthdate = date("l, F-j-Y", $oldB_timestamp);

        $FID = $LandFarm['id']; $ARB = $LandFarm['ARB']; $LandLocation = $LandFarm['location']; $TotalArea = $LandFarm['tot_farm_area']; 
        $Ownership = $LandFarm['Ownership']; $TenantownerName = $LandFarm['tenant_landOwnname']; $LesseeownerName = $LandFarm['lessee_landOwnername'];
        $OtherOwner = $LandFarm['otherowner']; $docno = $LandFarm['ownership_docNo'];

        switch($LandFarm['ownership_docNo']){
            case 1:
                $OwnerDocNo = "1. Certificate Of Land Transfer";
                break;
            case 2:
                $OwnerDocNo = "2. Emancipation Patent";
                break;
            case 3:
                $OwnerDocNo = "3. Individual Certificate of Land Ownership Award (CLOA)";
                break;
            case 4:
                $OwnerDocNo = "4. Collective CLOA";
                break;
            case 5:
                $OwnerDocNo = "5. Co-Ownership CLOA";
                break;
            case 6:
                $OwnerDocNo = "6. Agricultural Salespatent";
                break;
            case 7:
                $OwnerDocNo = "7. Homestead Patent";
                break;
            case 8:
                $OwnerDocNo = "8. Free Patent";
                break;
            case 9:
                $OwnerDocNo = "9. Certificate of Title or Regular Title";
                break;
            case 10:
                $OwnerDocNo = "10. Certificate of Ancestral Domain Title";
                break;
            case 11:
                $OwnerDocNo = "11. ertificate of Ancestral Land Title";
                break;
            case 12:
                $OwnerDocNo = "12. Tax Declaration";
                break;
        }

    }else{
        ?>
       <script lang="javascript" type="text/javascript">
            $(document).ready(function () {
                $('#modalError').modal('show');
            });
        </script>
    <?php
    }

?>