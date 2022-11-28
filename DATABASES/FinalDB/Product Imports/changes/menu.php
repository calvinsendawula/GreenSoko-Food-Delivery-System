<?php
session_start();
require_once("phpMethods.php");


//Adding items to Cart
if(isset($_POST["addToCart"])){
  if (isset($_SESSION["cart"])){
    $productID=$_GET["itemID"];
    $productName=$_POST["productName"];
    $price=$_POST["price"];
    $quantity=$_POST["qty"];
    $item_array_id = array_column($_SESSION["cart"],"itemId");

    if (!in_array($productID,$item_array_id)){
        $count = count($_SESSION["cart"]);
        $item_array = array(
            'itemId' => $productID,
            'productName' => $productName,
            'price' => $price,
            'qty' => $quantity,
            'img' => $_POST['productImg'],
      );
      $_SESSION["cart"][$count] = $item_array;
        if(isset($_SESSION["totals"]["totalQuantity"])){
            $_SESSION["totals"]["totalQuantity"] += $quantity;
            $_SESSION["totals"]["totalPrice"] += ($quantity * $price);
        }
        else{
            $_SESSION["totals"]["totalQuantity"] = $quantity;
            $_SESSION["totals"]["totalPrice"] = ($quantity * $price);
        }
      $_SESSION['restaurantId'] = $_POST["restID"];

      $_SESSION['message'] = 'success';
      //print_r($_SESSION["cart"]);
    }else{
        $_SESSION['message'] = 'failed';
    }

  }else{
    //session_destroy();
    //setting cart variables
    $productID=$_GET["itemID"];
    $productName=$_POST["productName"];
    $price=$_POST["price"];
    $quantity=$_POST["qty"];
    $item_array = array(
        'itemId' => $productID,
        'productName' => $productName,
        'price' => $price,
        'qty' => $quantity,
        'img' => $_POST['productImg'],
      );

    $_SESSION["cart"][0] = $item_array;

    if(isset($_SESSION["totals"]["totalQuantity"])){
        $_SESSION["totals"]["totalQuantity"] += $quantity;
        $_SESSION["totals"]["totalPrice"] += ($quantity * $price);
    }
    else{
        $_SESSION["totals"]["totalQuantity"] = $quantity;
        $_SESSION["totals"]["totalPrice"] = ($quantity * $price);
    }

    $_SESSION['restaurantId'] = $_POST["restID"];

    $_SESSION['message'] = 'success';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="scripts.js"></script>
    <script type="text/javascript" src="JS/navbar.js"></script>

    <!--Font awesome    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script type="text/javascript" src="JS/menu.js"></script>
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/navbarNelson.css">
</head>
<body>

<?php include("templates/navbarNelson.php"); ?>


<section class="menu my-4" id="menu">

    <div class="container">
        <div class="position-relative">
                <?php $restaurantID=$_GET["restID"];
                $rName=$_GET["rName"];?>
                <h1 class="heading"><?php echo $rName;?> <span>Menu</span></h1>
                <div class="topnav">
                    <div class="search-container">
                        <form method="post" action="menu.php?restID=<?php echo $restaurantID;?>&rName=<?php echo $rName;?>">
                            <input type="text" placeholder="Search" id="search" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
        </div>

        <div class="row container justify-content-between">
            <!-- display alerts -->
            <?php if(isset($_SESSION['message'])): ?>
                <?php if($_SESSION['message'] == 'success'): ?>
                    <span class="alert alert-success">
                        Added to cart.
                    </span>
                <?php elseif($_SESSION['message'] == 'failed'): ?>
                    <span class="alert alert-danger">
                        An error has occured. Product may already be in cart. Contact support
                    </span>
                    <?php endif; ?>
            <?php endif; ?>
            <?php unset($_SESSION['message']); ?>
            <div class="col-lg-12" id="menu_list">
                <div class="row text-center">
                <?php
              require_once("phpMethods.php");
              $sql_Select="SELECT * FROM tbl_product WHERE restaurantID='$restaurantID';";//Menu items
              $data=getData($sql_Select);

             if($data!=0){
                 for($i=0;$i<count($data);$i++){
                    $productID=$data[$i]["productID"];
                    $productName=$data[$i]["productName"];
                    $productImage=$data[$i]["productImage"];
                    $productPrice=$data[$i]["productPrice"];
                    $availability=$data[$i]["availability"];
                    $status=$data[$i]["isDeleted"];

                    if($status==0){
        ?>
                    <div class="col-sm-4 col-md-6 col-lg-4 p-5">
                    <form action="menu.php?restID=<?php echo $restaurantID;?>&rName=<?php echo $_GET["rName"];?>&itemID=<?php echo $productID;?>" method="POST">
                        <div class="card" style="width: 22rem;">
                        <?php if($availability==0){ ?>
                            <span class="availability"> Available</span>
                        <?php }else{ ?>
                            <span class="availability">Not Available</span>
                        <?php }?>
                            <img src="images/<?php echo $productImage;?>" class="card-img-top" alt="..." style="object-fit: cover;" width="200" height="350">
                            <input type="hidden" value="<?php echo $productImage; ?>" name="productImg">
                            <input type="hidden" value="<?php echo $restaurantID; ?>" name="restID">
                            <div class="card-body">
                                <h5 class="card-title"><input type="text" name="productName" value="<?php echo $productName;?>" readonly style="background: #e9ecef; text-align: center; width: 100%; "/></h5>
                                <h3>Ksh<input type="number" name="price" value="<?php echo $productPrice;?>" readonly style="background: #e9ecef; text-align: center; width: 40%;"/> </h3>
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="number" value="1" name="qty"/>
                                    <span class="plus">+</span>
                                </div>
                                <input type="submit" name="addToCart" value="Add to Cart" class="btn"/>
                            </div>
                        </div>
                    </form>
                    </div>
                    <?php
                    }
                    else{
                        continue;
                    }
                }
            ?>
  <div style="width: 100%; height: 10%;">
 <button class="btn" style="background: #8AC800; width: 10%; height: 10%;"><a href="locations.php" style="text-decoration: none;">Back</a></button>
                </div>
            <?php
            }else{
                echo '<script>alert("No products found")</script>';
            }
            ?>
                </div>
            </div>
        </div>
</section>
</body>
</html>

<!--Search Handler-->
<?php
require_once("phpMethods.php");
if (isset($_POST['search'])) {
   $Name = $_POST['search'];

   $Query = "SELECT DISTINCT * FROM tbl_product WHERE productName LIKE '%$Name%' AND restaurantID= $restaurantID";

   $Result = getData($Query);
  ?>

   <div class="container">
       <h1><?php echo $Name; ?></h1>
        <div class="row container justify-content-between">
            <div class="col-lg-12" id="searched_list">
                <div class="row text-center">
                <?php //Fetching result from database.
                if($Result>0) {
                    for($i=0;$i<count($Result);$i++){
                        $productID= $Result[$i]["productID"];
                        $restaurantID= $Result[$i]["restaurantID"];
                        $availability= $Result[$i]["availability"];
                        $image= $Result[$i]["productImage"];
                        $productName=  $Result[$i]["productName"];
                        $price=$Result[$i]["productPrice"];
                      ?>
                    <script type="text/javascript">
                    var element = document.getElementById("menu_list");
                    element.style.display = "none";
                    function getLoad() {
                        //makes the original data container visible
                         element.style.display = "flex";
                        //makes the new container with searched data invisible
                        var search_products = document.getElementById("search_data");
                        search_products.style.display = "none";
                    }
                    </script>
                   

                <div class="col-sm-4 col-md-6 col-lg-4 p-5" id="search_data">
                <form action="menu.php?restID=<?php echo $restaurantID;?>&itemID=<?php echo $productID;?>" method="POST">
                         <div class="card" style="width: 22rem;">
                           <?php if($availability==0){ ?>
                               <span class="availability"> Available</span>
                           <?php }else{ ?>
                               <span class="availability">Not Available</span>
                           <?php }?>
                            <img src="images/<?php echo $image;?>" class="card-img-top" alt="..." style="object-fit: cover;" width="200" height="350">
                            <div class="card-body">
                                <h5 class="card-title"><input type="text" name="productName" value="<?php echo $productName;?>" readonly style="background: #e9ecef; text-align: center; width: 100%; "/></h5>
                                <h3>Ksh<input type="number" name="price" value="<?php echo $productPrice;?>" readonly style="background: #e9ecef; text-align: center; width: 40%;"/> </h3>
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="number" value="1" name="qty"/>
                                    <span class="plus">+</span>
                                </div>
                                <input type="submit" name="addToCart" value="Add to Cart" class="btn"/>
                            </div>
                        </div>
                </form>
                           
                </div>
		
   <?php
                    }?>

 <!--Back Button-->
        <div style="width: 100%; height: 10%;">
 <button class="btn" style="background: #8AC800; width: 10%; height: 10%;"><a href="menu.php?restID=<?php echo $restaurantID;?>&rName=<?php echo $rName;?>" style="text-decoration: none;">Back</a></button>
                </div>  <?php 
                }else{
                 echo '<script>alert("No matching item found")</script>';
                }
    }
?>

 </div>
            </div>
       </div>

       </div>
