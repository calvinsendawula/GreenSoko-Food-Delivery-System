<?php
session_start();
require_once("../PHP/phpMethods.php");

$varUserID = $_SESSION['userID'];

$otp = $_POST['otp'];

if(!empty($otp)){
  $sql="SELECT * FROM tbl_user_settings where userID = '".$varUserID."'";
  $result = getData($sql);
  if(!empty($result)){
    if(!empty($result['otp'])){
      $userOTP = $result['otp'];
      if($otp == $userOTP){
        echo("<script>
          window.location.href='../DASHBOARD/resetPassword.php';
          alert('Please reset your password on the next page. DO NOT REFRESH THIS PAGE.');
          </script>");
      } else{
        echo("<script>
          window.location.href='../DASHBOARD/enterOTP.php';
          alert('OTP mismatch. Please try again.');
          </script>");
      }
    } else{
      echo("<script>
        window.location.href='../DASHBOARD/enterOTP.php';
        alert('No OTP was found. Please try again.');
        </script>");
    }
  } else{
    echo("<script>
      window.location.href='../FRONT/login.php';
      alert('Session Expired. Please login again.');
      </script>");
  }
} else{
  echo("<script>
    window.location.href='../DASHBOARD/enterOTP.php';
    alert('Please type in the OTP sent to you via your registered email.');
    </script>");
}
 ?>
