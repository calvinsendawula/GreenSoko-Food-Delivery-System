<?php
// require ("app.php");
 // require("DBConnection.php");
session_start();
if (isset($_POST["uploadrestaurant"])) {

    $filePath = "restaurant/";

    $originalFileName = $_FILES['uploadimage']['name'];
    $fileTempLocation = $_FILES['uploadimage']['tmp_name'];
    $db = mysqli_connect("localhost", "root", "", "green_soko");
    $locationID = $_POST['locationID'];


    $date = date('Y-m-d H:i:s');
    $sql ="INSERT INTO tbl_restaurant(locationID, restaurantName, restaurantImage, addedAt, updatedAt) VALUES ('$locationID', '".$_POST[ 'restaurantname']."' , '$originalFileName', '$date', '$date')";
      mysqli_query($db, $sql);

      if (move_uploaded_file($fileTempLocation, $filePath.$originalFileName)) {
          echo '<script>
					alert("Inserted Successfully");
					</script>';
        }


    }
