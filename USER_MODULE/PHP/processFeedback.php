<?php
session_start();
require_once("phpMethods.php");

$varFName = $_POST['fname'];
$varLName = $_POST['lname'];
$varEmail = $_POST['email'];
$varMessage = $_POST['message'];

if(!empty($_POST['email']) && !empty($_POST['email']) && !empty($_POST['email']) && !empty($_POST['email'])){
  $sql="SELECT * FROM tbl_user where email = '".$varEmail."'";
  $result = getData($sql);
    if(!empty($result)){
      $varUserID = $result["userID"];
      $sql_insert1 = "INSERT INTO tbl_user_feedback(userID,fname,lname,email,message) VALUES('$varUserID','$varFName','$varLName','$varEmail','$varMessage')";
      setData($sql_insert1);
      echo("<script>
        window.location.href='../../index.php';
        alert('Thank you for your feedback. We will get back to you through your email.');
        </script>");
    } else{
      echo("<script>
        window.location.href='../FRONT/login.php';
        alert('To submit your feedback, please login to your account first.');
        </script>");
    }
} else{
    echo("<script>
      alert('Please fill out all fields to proceed.');
      </script>");
    }
 ?>
