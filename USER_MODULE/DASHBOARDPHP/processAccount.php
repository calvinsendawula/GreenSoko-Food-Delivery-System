<?php
session_start();
require_once("../PHP/phpMethods.php");

$varUserID = $_SESSION['userID'];

$varEmail = $_POST['email'];
$varPhone = $_POST['phoneNo'];

if(!empty($_POST['email']) && !empty($_POST['phoneNo'])){
  $sql="SELECT * FROM tbl_user where userID = '".$varUserID."'";
  $result = getData($sql);
    if(!empty($result)){
      $sql_update = "UPDATE tbl_user SET email = '$varEmail', phone = '$varPhone' WHERE userID = '$varUserID'";
			setData($sql_update);

      $var1 = 1;
      $var0 = 0;
      $subscribed = 0;

    	if(isset($_POST['flexCheckChecked0'])){
        $sql_update2 = "UPDATE tbl_user_notifications SET newDeals = '$var1' WHERE userID = '$varUserID'";
  			setData($sql_update2);
        $subscribed++;
    	} else{
        $sql_update2 = "UPDATE tbl_user_notifications SET newDeals = '$var0' WHERE userID = '$varUserID'";
  			setData($sql_update2);
      }
      if(isset($_POST['flexCheckChecked1'])){
        $sql_update2 = "UPDATE tbl_user_notifications SET newRestaurants = '$var1' WHERE userID = '$varUserID'";
  			setData($sql_update2);
        $subscribed++;
    	} else{
        $sql_update2 = "UPDATE tbl_user_notifications SET newRestaurants = '$var0' WHERE userID = '$varUserID'";
  			setData($sql_update2);
      }
      if(isset($_POST['flexCheckChecked2'])){
        $sql_update2 = "UPDATE tbl_user_notifications SET orderStatuses = '$var1' WHERE userID = '$varUserID'";
  			setData($sql_update2);
        $subscribed++;
    	} else{
        $sql_update2 = "UPDATE tbl_user_notifications SET orderStatuses = '$var0' WHERE userID = '$varUserID'";
  			setData($sql_update2);
      }
      if(isset($_POST['flexCheckChecked3'])){
        $sql_update2 = "UPDATE tbl_user_notifications SET passwordChanges = '$var1' WHERE userID = '$varUserID'";
  			setData($sql_update2);
        $subscribed++;
    	} else{
        $sql_update2 = "UPDATE tbl_user_notifications SET passwordChanges = '$var0' WHERE userID = '$varUserID'";
  			setData($sql_update2);
      }
      if(isset($_POST['flexCheckChecked4'])){
        $sql_update2 = "UPDATE tbl_user_notifications SET specialOffers = '$var1' WHERE userID = '$varUserID'";
  			setData($sql_update2);
        $subscribed++;
    	} else{
        $sql_update2 = "UPDATE tbl_user_notifications SET specialOffers = '$var0' WHERE userID = '$varUserID'";
  			setData($sql_update2);
      }
      if(isset($_POST['flexCheckChecked5'])){
        $sql_update2 = "UPDATE tbl_user_notifications SET newsLetter = '$var1' WHERE userID = '$varUserID'";
  			setData($sql_update2);
        $subscribed++;
    	} else{
        $sql_update2 = "UPDATE tbl_user_notifications SET newsLetter = '$var0' WHERE userID = '$varUserID'";
  			setData($sql_update2);
      }
      if($subscribed == 0){
        echo("<script>
          window.location.href='../DASHBOARD/account.php';
          alert('You have unsubscribed to all email notifications.');
          </script>");
      } else{
        echo("<script>
          window.location.href='../DASHBOARD/account.php';
          alert('User details updated successfully.');
          </script>");
      }
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
