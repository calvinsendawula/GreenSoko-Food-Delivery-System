<?php
session_start();

  if(isset($_SESSION["order"])){
    if($_SESSION["order"] == 'complete'){
      unset($_SESSION["cart"]);
      $_SESSION["totals"]['totalPrice'] = 0;
      $_SESSION["totals"]['totalQuantity'] = 0;
      unset($_SESSION["order"]);
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--importing boostrap css and js-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--    Link Swiper's CSS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="CSS/locations.css" type="text/css">

    <script type="text/javascript" src="JS/navbar.js"></script>
    <link rel="stylesheet" href="CSS/navbarNelson.css">

    <title>Locations</title>

</head>
<body>
    <?php require_once("phpMethods.php"); ?>
    <?php include("templates/navbarNelson.php"); ?>
    <br><br>
    <div class="locations">
        <h1>Our Top Locations</h1>
    </div>
    <br><br>

    <!-- locations section starts  -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
<?php

    $sql_Select ="SELECT * FROM tbl_location;";//Obtaining available locations
    $data=getData($sql_Select);
    if($data!=0){

        for($i=0;$i<count($data);$i++){
            $locationID=$data[$i]["locationID"];
            $locationName=$data[$i]["locationName"];
            $locationImage=$data[$i]["locationImage"];
        ?>

            <div class="swiper-slide card" >
                <img src="images/<?php echo $locationImage; ?>">
                <div class="info">
                    <h1><?php echo $locationName;
                    $_SESSION["locationName"]= $locationName;
                    $Lname=$_SESSION["locationName"];
                    unset($_SESSION["locationName"]);?></h1>
                    <a href="restaurants.php?lID=<?php echo $locationID; ?>&lName=<?php echo $Lname; ?>" class="btn">See More</a>
                </div>
            </div>
<?php

}

    }
    else{
            echo "No locations found";
        }
          ?>

        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>


</body>
</html>
