<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">-->
<!---->
<!--</head>-->
<!--<body>-->
<!--The Navigation bar at the top-->
<nav class="main-nav w-100">
    <div class="row justify-content-between nav body-head">
        <!--Logo icon holder -->
        <div class="col-sm w-25  h-25 logo-box">
            <a href="dir"><img onmouseover="setNewImage()" onmouseout="setOgImage()" id="logo" src="images/GSL1.PNG" class="logo-image" alt="Logo"></a>
        </div>
        <!--fontawesome icons-->
        <script src="https://kit.fontawesome.com/db540a34d6.js" crossorigin="anonymous"></script>
        <!--Options holder -->
        <div class="col-4 justify-content-center">
            <div class="navbar navbar-expand-md h-100 w-100 ml-0 justify-content-end nav-options" id="nav-options">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-end w-100 ul_s" id="c-change">
                        <li class="nav-item p-2">
                            <button class="btn btn-outline-dark"><i class="fa-solid fa-house-user"></i>Home </button>
                        </li>
                        <li class="nav-item p-2">
                            <button class="btn btn-outline-dark  app c-change">
                                <i class="fa-solid fa-location-dot"></i>
                                Location
                            </button>
                        </li>
                        <li class="nav-item p-2">
                            <button class="btn btn-outline-dark">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Cart
                            </button>
                        </li>
                    </ul>
                </div>
                <!--Collapsible nav with a button theat appears after the screen shrinks beyond a certain point -->
                <span class="navbar-toggler ellipsis" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <button class="btn btn-success" id="nav-toggle">
                         <i class="fa-solid fa-bars" id="barsIcon"></i>
                     </button>
                 </span>
            </div>
        </div>
    </div>
</nav>
</body>