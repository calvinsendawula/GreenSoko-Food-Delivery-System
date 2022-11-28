<?php
session_start();
require_once("../PHP/phpMethods.php");

$varUserID = $_SESSION['userID'];

$varNewPassword = $_POST['newPassword'];
$varConfirmNewPassword = $_POST['confirmNewPassword'];

if(!empty($_POST['newPassword']) && !empty($_POST['confirmNewPassword'])){
  $sql="SELECT * FROM tbl_user where userID = '".$varUserID."'";
  $result = getData($sql);
  if(!empty($result)){
    $hashedPass = $result['password'];
    if($varNewPassword == $varConfirmNewPassword){
      $verify = password_verify($varNewPassword, $hashedPass);
      if($verify){
        echo("<script>
          window.location.href='../DASHBOARD/resetPassword.php';
          alert('New password cannot be the same as the old password. Please use another password.');
          </script>");
      } else{
        $hashedNewPass = password_hash($varNewPassword,PASSWORD_DEFAULT);
        $sql_update = "UPDATE tbl_user SET password = '$hashedNewPass' WHERE userID = '$varUserID'";
        setData($sql_update);
        $sql_update2 = "UPDATE tbl_user_settings SET otp = NULL WHERE userID = '$varUserID'";
        setData($sql_update2);
        echo("<script>
          window.location.href='../DASHBOARD/security.php';
          alert('Password reset successfully. Please use your new password for your next login.');
          </script>");
      }
    } else{
      echo("<script>
        window.location.href='../DASHBOARD/resetPassword.php';
        alert('New password and confirm password do not match. Please try again');
        </script>");
    }
  } else{
      echo("<script>
    		window.location.href='../FRONT/login.php';
    		alert('Your session has expired. Please log in again.');
    		</script>");
  }
} else{
  echo("<script>
    window.location.href='../DASHBOARD/resetPassword.php';
    alert('Fill in all fields to proceed.');
    </script>");
}
 ?>
