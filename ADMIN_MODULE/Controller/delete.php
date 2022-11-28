<?php
require 'DBConnection.php';

if (isset($_GET['restaurantID'])) {
    $id = $_GET['restaurantID'];

    $sql = "DELETE FROM `tbl_restaurant` WHERE `restaurantID` = '$id' ";
    $db = mysqli_connect('localhost', 'root', '', 'green_soko');
    $result = mysqli_query($db, $sql);
    if ($result == TRUE) {
        echo '<script>
					alert("Deleted Successfully");
					</script>';
    }else {
        echo "Error: ". $sql . "<br>". mysqli_error();
    }
}

if (isset($_GET['locationID'])) {
    $id = $_GET['locationID'];

    $sql2 = "DELETE FROM `tbl_location` WHERE `locationID` = '$id' ";
    $db = mysqli_connect('localhost', 'root', '', 'green_soko');
    $result = mysqli_query($db, $sql2);
    if ($result == TRUE) {
        echo "Record deleted successfully ";
    }else {
        echo "Error: ". $sql . "<br>". mysqli_error();
    }
}

if (isset($_GET['productID'])) {
    $id = $_GET['productID'];

    $sql3 = "DELETE FROM `tbl_product` WHERE `productID` = '$id' ";
    $db = mysqli_connect('localhost', 'root', '', 'green_soko');
    $result = mysqli_query($db, $sql3);
    if ($result == TRUE) {
        echo "Record deleted successfully ";
    }else {
        echo "Error: ". $sql . "<br>". mysqli_error();
    }
}
?>
