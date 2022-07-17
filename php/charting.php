<?php
require_once "config.php";
$req1 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Alos%'");
    $req2 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Amandiego%'");
    $req3 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Amangbangan%'");
    $req4 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Balangobong%'");
    $req5 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Balayang%'");
    $req6 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Bisocol%'");
    $req7 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Bolaney%'");
    $req8 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Baleyadaan%'");
    $req9 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Bued%'");
    $req10 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Cabatuan%'");
    $req11 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Cayucay%'");
    $req12 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Dulacac%'");
    $req13 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Inerangan%'");
    $req14 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Landoc%'");
    $req15 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Linmansangan%'");
    $req16 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Lucap%'");
    $req17 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Maawi%'");
    $req18 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Macatiw%'");
    $req19 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Magsaysay%'");
    $req20 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Mona%'");
    $req21 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Palamis%'");
    $req22 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Pandan%'");
    $req23 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Pangapisan%'");
    $req24 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Poblacion%'");
    $req25 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Pocal-Pocal%'");
    $req26 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Pogo%'");
    $req27 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Polo%'");
    $req28 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Quibuar%'");
    $req29 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Sabangan%'");
    $req30 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%San Antonio%'");
    $req31 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%San Jose%'");
    $req32 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%San Roque%'");
    $req33 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%San Vicente%'");
    $req34 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Santa Maria%'");
    $req35 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Tanaytay%'");
    $req36 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Tangcarang%'");
    $req37 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Tawintawin%'");
    $req38 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Telbang%'");
    $req39 = mysqli_query($connect_db,"SELECT Barangay,COUNT(Barangay) FROM farmer_data WHERE Barangay LIKE '%Victoria%'");

    if(mysqli_num_rows($req1) > 0){

        while($row1 = mysqli_fetch_array($req1)){

            if($row1['COUNT(Barangay)'] == 0){
                $output1 = 0;
            }else{
                $output1 = (100 / 100) * $row1['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req2) > 0){

        while($row2 = mysqli_fetch_array($req2)){

            if($row2['COUNT(Barangay)'] == 0){
                $output2 = 0;
            }else{
                $output2 = (100 / 100) * $row2['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req3) > 0){

        while($row3 = mysqli_fetch_array($req3)){

            if($row3['COUNT(Barangay)'] == 0){
                $output3 = 0;
            }else{
                $output3 = (100 / 100) * $row3['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req4) > 0){

        while($row4 = mysqli_fetch_array($req4)){

            if($row4['COUNT(Barangay)'] == 0){
                $output4 = 0;
            }else{
                $output4 = (100 / 100) * $row4['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req5) > 0){

        while($row5 = mysqli_fetch_array($req5)){

            if($row5['COUNT(Barangay)'] == 0){
                $output5 = 0;
            }else{
                $output5 = (100 / 100) * $row5['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req6) > 0){

        while($row6 = mysqli_fetch_array($req6)){

            if($row6['COUNT(Barangay)'] == 0){
                $output6 = 0;
            }else{
                $output6 = (100 / 100) * $row6['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req7) > 0){

        while($row7 = mysqli_fetch_array($req7)){

            if($row7['COUNT(Barangay)'] == 0){
                $output7 = 0;
            }else{
                $output7 = (100 / 100) * $row7['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req8) > 0){

        while($row8= mysqli_fetch_array($req8)){

            if($row8['COUNT(Barangay)'] == 0){
                $output8 = 0;
            }else{
                $output8 = (100 / 100) * $row8['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req9) > 0){

        while($row9 = mysqli_fetch_array($req9)){

            if($row9['COUNT(Barangay)'] == 0){
                $output9 = 0;
            }else{
                $output9 = (100 / 100) * $row9['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req10) > 0){

        while($row10 = mysqli_fetch_array($req10)){

            if($row10['COUNT(Barangay)'] == 0){
                $output10 = 0;
            }else{
                $output10 = (100 / 100) * $row10['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req11) > 0){

        while($row11 = mysqli_fetch_array($req11)){

            if($row11['COUNT(Barangay)'] == 0){
                $output11 = 0;
            }else{
                $output11 = (100 / 100) * $row11['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req12) > 0){

        while($row12 = mysqli_fetch_array($req12)){

            if($row12['COUNT(Barangay)'] == 0){
                $output12 = 0;
            }else{
                $output12 = (100 / 100) * $row12['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req13) > 0){

        while($row13 = mysqli_fetch_array($req13)){

            if($row13['COUNT(Barangay)'] == 0){
                $output13 = 0;
            }else{
                $output13 = (100 / 100) * $row13['COUNT(Barangay)'];
        }
    }

    if(mysqli_num_rows($req14) > 0){

        while($row14 = mysqli_fetch_array($req14)){

            if($row14['COUNT(Barangay)'] == 0){
                $output14 = 0;
            }else{
                $output14 = (100 / 100) * $row14['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req15) > 0){

        while($row15 = mysqli_fetch_array($req15)){

            if($row15['COUNT(Barangay)'] == 0){
                $output15 = 0;
            }else{
                $output15 = (100 / 100) * $row15['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req16) > 0){

        while($row16 = mysqli_fetch_array($req16)){

            if($row16['COUNT(Barangay)'] == 0){
                $output16 = 0;
            }else{
                $output16 = (100 / 100) * $row16['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req17) > 0){

        while($row17 = mysqli_fetch_array($req17)){

            if($row17['COUNT(Barangay)'] == 0){
                $output17 = 0;
            }else{
                $output17 = (100 / 100) * $row17['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req18) > 0){

        while($row18 = mysqli_fetch_array($req18)){

            if($row18['COUNT(Barangay)'] == 0){
                $output18 = 0;
            }else{
                $output18 = (100 / 100) * $row18['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req19) > 0){

        while($row19 = mysqli_fetch_array($req19)){

            if($row19['COUNT(Barangay)'] == 0){
                $output19 = 0;
            }else{
                $output19 = (100 / 100) * $row19['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req20) > 0){

        while($row20 = mysqli_fetch_array($req20)){

            if($row20['COUNT(Barangay)'] == 0){
                $output20 = 0;
            }else{
                $output20 = (100 / 100) * $row20['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req21) > 0){

        while($row21 = mysqli_fetch_array($req21)){

            if($row21['COUNT(Barangay)'] == 0){
                $output21 = 0;
            }else{
                $output21 = (100 / 100) * $row21['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req22) > 0){

        while($row22 = mysqli_fetch_array($req22)){

            if($row22['COUNT(Barangay)'] == 0){
                $output22 = 0;
            }else{
                $output22 = (100 / 100) * $row22['COUNT(Barangay)'];
            }
        }
    }
    
    if(mysqli_num_rows($req23) > 0){

        while($row23 = mysqli_fetch_array($req23)){

            if($row23['COUNT(Barangay)'] == 0){
                $output23 = 0;
            }else{
                $output23 = (100 / 100) * $row23['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req24) > 0){

        while($row24 = mysqli_fetch_array($req24)){

            if($row24['COUNT(Barangay)'] == 0){
                $output24 = 0;
            }else{
                $output24 = (100 / 100) * $row24['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req25) > 0){

        while($row25 = mysqli_fetch_array($req25)){

            if($row25['COUNT(Barangay)'] == 0){
                $output25 = 0;
            }else{
                $output25 = (100 / 100) * $row25['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req26) > 0){

        while($row26 = mysqli_fetch_array($req26)){

            if($row26['COUNT(Barangay)'] == 0){
                $output26 = 0;
            }else{
                $output26 = (100 / 100) * $row26['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req27) > 0){

        while($row27 = mysqli_fetch_array($req27)){

            if($row27['COUNT(Barangay)'] == 0){
                $output27 = 0;
            }else{
                $output27 = (100 / 100) * $row27['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req28) > 0){

        while($row28 = mysqli_fetch_array($req28)){

            if($row28['COUNT(Barangay)'] == 0){
                $output28 = 0;
            }else{
                $output28 = (100 / 100) * $row28['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req29) > 0){

        while($row29 = mysqli_fetch_array($req29)){

            if($row29['COUNT(Barangay)'] == 0){
                $output29 = 0;
            }else{
                $output29 = (100 / 100) * $row29['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req30) > 0){

        while($row30 = mysqli_fetch_array($req30)){

            if($row30['COUNT(Barangay)'] == 0){
                $output30 = 0;
            }else{
                $output30 = (100 / 100) * $row30['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req31) > 0){

        while($row31 = mysqli_fetch_array($req31)){

            if($row31['COUNT(Barangay)'] == 0){
                $output31 =0;
            }else{
                $output31 = (100 / 100) * $row31['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req32) > 0){

        while($row32 = mysqli_fetch_array($req32)){

            if($row32['COUNT(Barangay)'] == 0){
                $output32 = 0;
            }else{
                $output32 = (100 / 100) * $row32['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req33) > 0){

        while($row33 = mysqli_fetch_array($req33)){

            if($row33['COUNT(Barangay)'] == 0){
                $output33 = 0;
            }else{
                $output33 = (100 / 100) * $row33['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req34) > 0){

        while($row34 = mysqli_fetch_array($req34)){

            if($row34['COUNT(Barangay)'] == 0){
                $output34 = 0;
            }else{
                $output34 = (100 / 100) * $row34['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req35) > 0){

        while($row35 = mysqli_fetch_array($req35)){

            if($row35['COUNT(Barangay)'] == 0){
                $output35 = 0;
            }else{
                $output35 = (100 / 100) * $row35['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req36) > 0){

        while($row36 = mysqli_fetch_array($req36)){

            if($row36['COUNT(Barangay)'] == 0){
                $output36 = 0;
            }else{
                $output36 = (100 / 100) * $row36['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req37) > 0){

        while($row37 = mysqli_fetch_array($req37)){

            if($row37['COUNT(Barangay)'] == 0){
                $output37 = 0;
            }else{
                $output37 = (100 / 100) * $row37['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req38) > 0){

        while($row38 = mysqli_fetch_array($req38)){

            if($row38['COUNT(Barangay)'] == 0){
                $output38 = 0;
            }else{
                $output38 = (100 / 100) * $row38['COUNT(Barangay)'];
            }
        }
    }

    if(mysqli_num_rows($req39) > 0){

        while($row39 = mysqli_fetch_array($req39)){

            if($row39['COUNT(Barangay)'] == 0){
                $output39 =0;
            }else{
                $output39 = (100 / 100) * $row39['COUNT(Barangay)'];
            }
        }
    }

    $barangay = array(
        $output1,
        $output2,
        $output3,
        $output4,
        $output6,
        $output7,
        $output8,
        $output9,
        $output10,
        $output11,
        $output12,
        $output13,
        $output14,
        $output15,
        $output16,
        $output18,
        $output29,
        $output20,
        $output21,
        $output22,
        $output23,
        $output24,
        $output25,
        $output26,
        $output27,
        $output28,
        $output29,
        $output30,
        $output31,
        $output32,
        $output33,
        $output34,
        $output35,
        $output36,
        $output37,
        $output38,
        $output39,
    );
    echo json_encode($barangay);
}
?>