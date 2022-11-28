<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript" src="JS/navbar.js"></script>
    <link rel="stylesheet" href="CSS/navbarNelson.css">

    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <title>Restaurants</title>

</head>
<body>
    <?php include("templates/navbarNelson.php"); ?>
    <?php require_once("phpMethods.php"); ?>
    <br><br>
    <div class="restaurants">
        <h1> <?php $lName=$_GET["lName"]; echo $lName; ?></h1><!--LocationName-->
        <h1>Select Restaurant</h1>
    </div>
    <br><br>
    <section class="exclusive_item_part blog_item_section">
        <div class="container">
            <div class="row">

            <?php 
              $locationID=$_GET["lID"];
              $sql_Select="SELECT * FROM tbl_restaurant WHERE locationID='$locationID';";//Get Restaurants
              $data=getData($sql_Select);
           
             if($data!=0){
                 for($i=0;$i<count($data);$i++){
                $restaurantID=$data[$i]["restaurantID"];
                $restaurantName=$data[$i]["restaurantName"];
                $restaurantImage=$data[$i]["restaurantImage"];
        ?>

                <div class="col-sm-6 col-lg-4 mb-5">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="images/<?php echo $restaurantImage; ?>" alt="" width="250" height="250">
                        </div>
                        <div class="single_blog_text shadow">
                            <h3><?php echo $restaurantName; ?></h3>
                            <a href="menu.php?restID=<?php echo $restaurantID;?>&rName=<?php echo $restaurantName;?>" class="btn_3">See More <img src="img/icon/left_2.svg" alt=""></a>
                        </div>
                    </div>
                </div>
          
<?php }?>
<div style="width: 100%; height: 10%;">
 <button class="btn" style="background: #8AC800; width: 10%; height: 10%;"><a href="locations.php" style="text-decoration: none;">Back</a></button>
                </div>
    <?php }
    else{
            echo "No locations found";
        }
          ?>

            </div>
        </div>
    </section>
    </body>
    </html>
