<?php
$db = mysqli_connect('localhost', 'root', '', 'green_soko');
session_start();
    if(!isset($_SESSION['adminID'])) {
        echo '<script>
					alert("Kindly login");
					</script>';
        header("location: ../Interfaces/signin.php");
    }

		?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../CSS/dashboardstyle.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard Page</title>

   </head>
<body>

  <div class="sidebar">k
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
  <section class="home-section">
      <div class="text">Dashboard</div>
      <div class="user">
        <!-- <h3>Welcome,</h3> -->
    <img src="../images/adminphoto.jpg">
      </div>
      <div class="cardBox">
        <div style="box-shadow: 0 4px 8px 0 lightgreen;"class="card">
          <div>
              <div class="numbers">

                  <?php
                  $query1 = "SELECT adminID FROM tbl_admin ORDER BY adminID";
                  $query_run = mysqli_query($db, $query1);

                  $row1 = mysqli_num_rows($query_run);

                  $query2 = "SELECT userID FROM tbl_user ORDER BY userID";
                  $query_run = mysqli_query($db, $query2);

                  $row2 = mysqli_num_rows($query_run);
                  $row = $row1 + $row2;
                  echo "$row";

                  ?>
              </div>
   <a style="text-decoration: none;" href="accounts.php" class="cardName">ACCOUNTS</a>
    </div>
        <div class="iconBox">
<ion-icon name="people-outline"></ion-icon>
  </div>
  </div>
  <div style="box-shadow: 0 4px 8px 0 lightgreen;"class="card">
    <div>
  <div class="numbers">
	  <?php
      $query = "SELECT orderID FROM tbl_order ORDER BY orderID";
      $query_run = mysqli_query($db, $query);

      $row = mysqli_num_rows($query_run);
      echo " $row";
      ?>
</div>
     <a style="text-decoration: none;" href="orders.php" class="cardName">ORDERS</a>
  </div>
  <div class="iconBox">
<ion-icon name="cart-outline"></ion-icon>
  </div>
  </div>
  <div style="box-shadow: 0 4px 8px 0 lightgreen;"class="card">
    <div>
  <div class="numbers">
    <?php
    $query = "SELECT restaurantID FROM tbl_restaurant ORDER BY restaurantID";
    $query_run = mysqli_query($db, $query);

    $row = mysqli_num_rows($query_run);
    echo "$row";
    ?>
  </div>
     <a style="text-decoration: none;" href="restaurant.php" class="cardName">RESTAURANTS</a>
  </div>
  <div class="iconBox">
<ion-icon name="restaurant-outline"></ion-icon>
  </div>
  </div>
  <div style="box-shadow: 0 4px 8px 0 lightgreen;"class="card">
    <div>
  <div class="numbers">
    <?php
    $query = "SELECT locationID FROM tbl_location ORDER BY locationID";
    $query_run = mysqli_query($db, $query);

    $row = mysqli_num_rows($query_run);
    echo " $row";
    ?>
  </div>
 <a style="text-decoration: none;" href="location.php" class="cardName">LOCATIONS</a>
  </div>
  <div class="iconBox">
<ion-icon name="location-outline"></ion-icon>
  </div>
  </div>
  <div style="box-shadow: 0 4px 8px 0 lightgreen;"class="card">
    <div>
  <div class="numbers">
    <?php
  $db = mysqli_connect("localhost", "root", "", "green_soko");
  $query = "SELECT availability FROM tbl_product ORDER BY availability";
  $query_run = mysqli_query($db, $query);
  $row = mysqli_num_rows($query_run);
  echo " $row ";
  ?>
</div>
     <a style="text-decoration: none;" href="fooditems.php" class="cardName">FOOD ITEMS</a>
  </div>
  <div class="iconBox">
<ion-icon name="fast-food-outline"></ion-icon>
  </div>
  </div>
  <div style="box-shadow: 0 4px 8px 0 lightgreen;"class="card">
    <div>
  <div class="numbers"></div>
     <a style="text-decoration: none;" href="customercare.php" class="cardName">CUSTOMER CARE</a>
  </div>
  <div class="iconBox">
<ion-icon name="logo-wechat"></ion-icon>  </div>
  </div>

  </div>
  </section>

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
