<?php
 session_start();

 if(isset($_POST['submit_btn'])) {
   $firstname = filter_input(INPUT_POST, 'firstname');
       $lastname = filter_input(INPUT_POST, 'lastname');
       $password = filter_input(INPUT_POST, 'password');
     $hashedPass = password_hash($password,PASSWORD_DEFAULT);
     $gender = $_POST['gender'];

         if(empty($firstname)) {
             $fnameError = "Please insert your firstname";
             header("location: ../Interfaces/signup.php");

         }
         if(empty($lastname)) {
             $lnameError = "Please insert your lastname";
             header("location: ../Interfaces/signup.php");
         }

         if(empty($password)) {
             $passError = "Please insert your password";
             header("location: ../Interfaces/signup.php");
         }elseif (strlen($password) <6) {
             $passError = "Your password needs to have a minimum length of 6";
             header("location: ../Interfaces/signup.php");
         }

         $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO tbl_admin(firstName, lastName,password, gender,createdAt)VALUES ('$firstname', '$lastname','$hashedPass','$gender','$date')";
            $db = mysqli_connect('localhost', 'root', '','green_soko');
            $result = mysqli_query($db, $sql);

     if($result == TRUE) {
         echo "New record inserted successfully";
           header("location: ../Interfaces/dashboard.php");
     }else {
         echo "Error: ".$sql."<br>".mysqli_error();
         header("location: ../Interfaces/signin.php");
     }
 }
 include ("signup.php");
