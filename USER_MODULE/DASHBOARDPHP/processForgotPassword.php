<?php
session_start();
require_once("../PHP/phpMethods.php");

$varUserID = $_SESSION['userID'];

$otp = rand(500000,999999);

if(isset($_POST['sendOTP'])){
  $sql="SELECT * FROM tbl_user_settings where userID = '".$varUserID."'";
  $result = getData($sql);
  if(!empty($result)){
    $sql_update = "UPDATE tbl_user_settings SET otp = '$otp' WHERE userID = '$varUserID'";
    setData($sql_update);
    echo("<script>
      window.location.href='../DASHBOARD/enterOTP.php';
      alert('OTP sent. Check your email.');
      </script>");
  } else{
    echo("<script>
      window.location.href='../FRONT/login.php';
      alert('Session Expired. Please login again.');
      </script>");
  }
} else{
  echo("<script>
    window.location.href='../DASHBOARD/forgotPassword.php';
    alert('OTP not sent. Please try again.');
    </script>");
}
 ?>
