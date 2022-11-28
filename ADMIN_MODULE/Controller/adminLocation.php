
<?php
$msg = "";
session_start();
if (isset($_POST['uploadlocation'])) {

    $filename = $_FILES["locationimage"]["name"];
    $tempname = $_FILES["locationimage"]["tmp_name"];
    $folder = "location/".$filename;

    $db = mysqli_connect("localhost", "root", "", "green_soko");

    $sql = "INSERT INTO tbl_location(locationName, locationImage) VALUES ('".$_POST[ 'locationname']."' , '$filename')";
    mysqli_query($db, $sql);

    if (move_uploaded_file( $tempname,$folder)) {
        $msg = "Image uploaded successfully";
        header("location: ../Interfaces/dashboard.php");

    }else{
        $msg = "Failed to upload location";
        header("location: ../Interfaces/addfooditem.php");
    }
}
