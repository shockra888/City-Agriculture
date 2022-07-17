<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function Reg_Input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $Id = $_POST['Id'];

    $targetDir = "../farmer_image/";
    $fileName = basename($_FILES["farmer_img"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $allowTypes = array('jpg','png','jpeg','gif','JPG','jfif');
    if(in_array($fileType, $allowTypes)){
        move_uploaded_file($_FILES["farmer_img"]["tmp_name"], $targetFilePath);
    }

    $upimg = mysqli_query($connect_db,"UPDATE farmer_data SET image  = '$fileName' WHERE u_id = $Id");

    if($upimg === TRUE){
        header("Location:viewFarmer.php?id=$Id");
    }else{
        ?>
        <script lang="javascript" type="text/javascript">
             $(document).ready(function () {
                 $('#modalError').modal('show');
             });
         </script>
     <?php
    }
}
?>