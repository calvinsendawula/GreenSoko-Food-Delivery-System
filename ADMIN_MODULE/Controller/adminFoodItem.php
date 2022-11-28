<?php
// require ("app.php");
// require("DBConnection.php");
session_start();
if (isset($_POST["uploadfooditem"])) {

    $filePath = "images/";

    $originalFileName = $_FILES['uploadimage']['name'];
    $fileTempLocation = $_FILES['uploadimage']['tmp_name'];
    $db = mysqli_connect("localhost", "root", "", "green_soko");
    $restaurantID = $_POST['restaurantID'];

    $date = date('Y-m-d H:i:s');
    $sql ="INSERT INTO tbl_product(restaurantID,productName, productImage, productPrice, availability, addedAt) VALUES ('$restaurantID', '".$_POST[ 'productname']."' , '$originalFileName','".$_POST[ 'price']."' , '".$_POST[ 'quantity']."' , '$date' )";
    mysqli_query($db, $sql);

    if (move_uploaded_file($fileTempLocation, $filePath.$originalFileName)) {
        header("location: ../Interfaces/dashboard.php");
    }
}
