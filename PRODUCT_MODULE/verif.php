<?php
include_once('../USER_MODULE/PHP/phpMethods.php');

$db = mysqli_connect('localhost', 'root', '', 'green_soko');
$sql='SELECT * FROM tbl_order';
$result = mysqli_query($db, $sql);
$converted = 1;
$convertedNot = 0;
$deliveryFee = 200;

foreach($result as $individualOrder){
    //var_dump($individualOrder);
    $orderID = $individualOrder['orderID'];
    $userID = $individualOrder['userID'];

    //Convert the JSON object to PHP array
    $orderDetailsJSON = $individualOrder["orderDetails"];
    $orderDetailsArray = json_decode(preg_replace('/[[:^print:]]/', '', $orderDetailsJSON),true);

    $totalPrice = $orderDetailsArray['totalPrice'];
    $createdAt = $individualOrder['createdAt'];
    $updatedOn = $individualOrder['updatedOn'];
    $isDeleted = $individualOrder['isDeleted'];

    //Access individual order items
    foreach($orderDetailsArray['cartItems'] as $singleOrderItem){
        $orderItems = $singleOrderItem;
        $itemID = $singleOrderItem['itemId'];
        $itemQuantity = $singleOrderItem['quantity'];

        $sql="SELECT * FROM tbl_product where productID = '".$itemID."'";
        $result = getData($sql);
        if(!empty($result)){
          $restaurantID = $result['restaurantID'];
          $productName = $result['productName'];
          $sql2="SELECT * FROM tbl_restaurant where restaurantID = '".$restaurantID."'";
          $result2 = getData($sql2);
          if(!empty($result2)){
            $restaurantName = $result2['restaurantName'];
          }
        }

        $sql3="SELECT * FROM tbl_user_order where userOrderID = '".$orderID."'";
        $result3 = getData($sql3);
        if(!empty($result3)){
          //echo("There is an order with this ID<br/><br/>");
          $sql_insert = "INSERT INTO tbl_user_order_item(userOrderID,userID,itemOrderedName,itemOrderedQty) VALUES('$orderID','$userID','$productName','$itemQuantity')";
          setData($sql_insert);
          $sql_update = "UPDATE tbl_order SET converted = '$converted' WHERE orderID = '$orderID'";
          setData($sql_update);
        } else{
          //echo("There is no order with this ID<br/><br/>");
          $sql_insert = "INSERT INTO tbl_user_order(userID,restaurantName,deliveryFee,orderTotal) VALUES('$userID','$restaurantName','$deliveryFee','$totalPrice')";
          setData($sql_insert);
          $sql_insert2 = "INSERT INTO tbl_user_order_item(userOrderID,userID,itemOrderedName,itemOrderedQty) VALUES('$orderID','$userID','$productName','$itemQuantity')";
          setData($sql_insert2);
          $sql_update = "UPDATE tbl_order SET converted = '$converted' WHERE orderID = '$orderID'";
          setData($sql_update);
        }

        /*if(!empty($_POST['mpesa-code']) && !empty($_POST['phone-number'])){
          $mpesa_code = $_POST['mpesa-code'];
          $phone_num = $_POST['phone-number'];

          //Verification code
          $sql_verif = "INSERT INTO `tbl_order_verification`(`user_id`,`phone_number`,`order_mpesa_code`) VALUES ('$userID','$phone_num','$mpesa_code')";

          $res_verif = setData($sql_verif);
        }*/

        echo("<script>
          window.location.href='locations.php';
          </script>");
    }
}

?>
