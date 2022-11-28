<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="../CSS/dashboardstyle.css">

<script src="js/register.js"></script>

  <title>Add a Restaurant Page</title>
    <div class="sidebar">
        <div class="logo-details">

            <div class="logo_name">Green Soko</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a href="signup.php">
                    <i class='bx bx-user' ></i>
                    <span class="links_name">Add an Admin</span>
                </a>
                <span class="tooltip">Add an Admin</span>
            </li>
            <li>
                <a href="addrestaraunt.php">
                    <i class="bx bx-store-alt"></i>
                    <span class="links_name">Add a Restaraunt</span>
                </a>
                <span class="tooltip">Add a Restaraunt</span>
            </li>
            <li>
                <a href="../Interfaces/addlocation.php">
                    <i class='bx bx-pin' ></i>
                    <span class="links_name">Add a Location</span>
                </a>
                <span class="tooltip">Add a Location</span>
            </li>
            <li>
                <a href="../Interfaces/addfooditem.php">
                    <i class='bx bx-restaurant' ></i>
                    <span class="links_name">Add a Food Item</span>
                </a>
                <span class="tooltip">Add a Food Item</span>
            </li>
            <li>
                <a href="../Interfaces/customercare.php">
                    <i class='bx bx-chat' ></i>
                    <span class="links_name">Customer Care</span>
                </a>
                <span class="tooltip">Customer Care</span>
            </li>
            <li>
                <a href="../Controller/logout.php">
                    <i class='bx bx-log-out' id="log_out" ></i>
                    <span class="links_name">Log Out</span>
                </a>

                <a href="">
                    <span class="tooltip">Log Out</span>
                </a>
            </li>
        </ul>


    </div>
</head>
<body>
  <div class="signupFrm">
      <form action="../Controller/adminRestaurant.php" method="POST" enctype="multipart/form-data" class="form">
        <img src="../images/logo.png"alt="Green Soko" style="width: 40%;">
        <a href="dashboard.php">
          <img src="../images/dashboard.png"alt="Green Soko" style="width: 10%;float:right;">
        </a>
        <h1 class="title">Add Restaurant</h1>


<br>
<div class="inputContainer">
    <label for="" class="label" style="background-color: black;">Enter the location name</label><br><br>
            <?php
        $db = mysqli_connect('localhost', 'root', '', 'green_soko');
        $sql = mysqli_query($db, "SELECT * FROM tbl_location");

        echo "<select name='locationID' >";
            while ($row = mysqli_fetch_array($sql)) {
                ?>
        <option value="<?php echo$row['locationID']?>"> <?php echo$row['locationName']; ?> </option>
                <?php
            }
            echo "</select>";




            ?>



</div>
<br>
<div class="inputContainer">
  <input type="text" name="restaurantname" class="input" placeholder="Enter the restaurant" required>
  <label for="" class="label">Enter the restaurant name</label>
</div>


<br>
<div style="text-align:center;">
<label>Upload Restaraunt Image</label><br>
  <input type="file"  name="uploadimage" value="" />
</div>
<br>
<div class="button">
        <input type="submit" name="uploadrestaurant" class="btn" value="Submit">
</div>
      </form>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
    });

    searchBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
    });


    function menuBtnChange() {
    if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
    }
    }
    </script>
    </body>
    </html>


