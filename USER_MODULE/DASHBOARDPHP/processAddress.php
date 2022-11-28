<?php
session_start();
require_once("../PHP/phpMethods.php");

$varUserID = $_SESSION['userID'];

//$varFormattedAddress = $_POST['addressSelected'];
$varDropOffInstructions = $_POST['dropOffInstructions'];

if(!empty($_POST['dropOffInstructions'])){
  $sql="SELECT * FROM tbl_user_address where userID = '".$varUserID."'";
  $result = getData($sql);
    if(!empty($result)){
      $sql_update = "UPDATE tbl_user_address SET dropOffInstructions = '$varDropOffInstructions' WHERE userID = '$varUserID'";
			setData($sql_update);
      echo("<script>
        window.location.href='../DASHBOARD/address.php';
        alert('Location details updated successfully.');
        </script>");
    } else{
      echo("<script>
        alert('Error in form submission.');
        </script>");
    }
} else{
    echo("<script>
      alert('Please fill out all fields to proceed.');
      </script>");
    }
 ?>
