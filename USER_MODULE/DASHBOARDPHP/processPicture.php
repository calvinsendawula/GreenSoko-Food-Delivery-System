<?php
session_start();
require_once("../PHP/phpMethods.php");

$varUserID = $_SESSION['userID'];

if(isset($_POST['saveChanges'])){
	$file=$_FILES['userProfilePicture'];
	print_r($file);
	$file_path="../asset/";
	$original_file_name=$_FILES['userProfilePicture']['name'];
	$file_tmp_location=$_FILES['userProfilePicture']['tmp_name'];
	if(move_uploaded_file($file_tmp_location, $file_path.$original_file_name)){

    $combined = $file_path.$original_file_name;
    $sql_update = "UPDATE tbl_user_settings SET userImagePath = '$combined' WHERE userID = '$varUserID'";
    setData($sql_update);
    echo("<script>
      window.location.href='../DASHBOARD/account.php';
      alert('Profile picture updated successfully.');
      </script>");
	}
} else{
  echo("<script>
    window.location.href='../DASHBOARD/account.php';
    alert('No profile picture found.');
    </script>");
}
 ?>
