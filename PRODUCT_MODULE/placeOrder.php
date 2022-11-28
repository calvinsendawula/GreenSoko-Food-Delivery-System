<?php
session_start();
require_once("phpMethods.php");

// Create an array to store the id and quantity of a product
$cartItemsArray= array();
foreach($_SESSION['cart'] as $cartItem){
    $itemId = $cartItem['itemId'];
    $quantity = $cartItem['qty'];
    $cartItem=["itemId"=>$itemId,"quantity"=>$quantity];
    array_push($cartItemsArray,$cartItem);
}

//store the total price of the purchased products in a var
$totalPrice = $_SESSION["totals"]["totalPrice"];


//Add the cart items and the total price to an array
$cartArray = array(
    "cartItems"=> $cartItemsArray,
    "totalPrice"=> $totalPrice
);

//convert the cart array into JSON
$cartJSON = json_encode($cartArray);

$userSessionID = $_SESSION["userID"];
//$userSessionID = $_SESSION['userID'];

//Formulate the query with the JSON array
$sql = "INSERT INTO `tbl_order`(`userID`, `orderDetails`) VALUES ('$userSessionID', '$cartJSON')";
$Result = insertQuery($sql);

//Unset the cart variables to empty cart
if($Result == 1){
    /*session_unset($_SESSION['cart']);
    session_unset($_SESSION['totals']);*/
    $_SESSION['order'] = 'complete';
    echo "success";
}
else{
    echo "fail";
}
?>
