<?php
session_start();
require_once("../PHP/phpMethods.php");

$varUserID = $_SESSION['userID'];

$varAlternateEmail = $_POST['alternateEmail'];
$var2FA = 1;

if(!empty($_POST['alternateEmail'])){
  $sql="SELECT * FROM tbl_user where userID = '".$varUserID."'";
  $result = getData($sql);
    if(!empty($result)){
      $sql_update = "UPDATE tbl_user_settings SET twoFAEnabled = '$var2FA', alternateEmail = '$varAlternateEmail' WHERE userID = '$varUserID'";
			setData($sql_update);

      echo("<script>
        window.location.href='../DASHBOARD/security.php';
        alert('Two Factor Authentication Enabled.');
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
