<?php
require '../Controller/DBConnection.php';

if (isset($_POST['uploadfooditem'])) {
    $id = $_POST['productID'];
    $productName =$_POST['productName'] ;
    $productImage = $_FILES['productImage']['tmp_name'];
    $productPrice = $_POST['productPrice'];
    $availableQty = $_POST['availableQty'];

    $filePath = "images/";

    $originalFileName = $_FILES['productImage']['name'];
    if (move_uploaded_file($productImage, $filePath.$originalFileName)) {
        $sql = "UPDATE `tbl_product` SET `productName`= '$productName', `productImage` = '$originalFileName', `productPrice` = '$productPrice', `availableQty`='$availableQty' WHERE `productID` = '$id'";
        $db = mysqli_connect('localhost', 'root', '', 'green_soko');
        $result = mysqli_query($db, $sql);

        if ($result == TRUE) {

            echo '<script>
					alert("Record updated successfully");
					</script>';

        }else {
            echo "Error: ". $sql . "<br>". mysqli_error();
        }

    }else {
        echo "Edit failed!";
    }
}
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = mysqli_connect('localhost', 'root', '', 'green_soko');
    $sql = "SELECT * FROM `tbl_product` WHERE `productID` = $id ";
    $result = mysqli_query($db, $sql);


        if (mysqli_num_rows($result) >0) {
            while( $row = mysqli_fetch_assoc($result)) {
                $id = $row['productID'] ;
                $foodName = $row['productName'] ;
                $foodImage = $row['productImage'] ;
                $price = $row['productPrice'] ;
                $availableQty = $row['availableQty'];
            }




?>
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

<script src="../js/register.js"></script>

  <title>Add Food Item Page</title>
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
<i class="bx bx-restaurant"></i>
         <span class="links_name">Add a Restaraunt</span>
       </a>
       <span class="tooltip">Add a Restaraunt</span>
     </li>
     <li>
       <a href="interfaces/addlocation.php">
         <i class='bx bx-pin' ></i>
         <span class="links_name">Add a Location</span>
       </a>
       <span class="tooltip">Add a Location</span>
     </li>
     <li>
       <a href="interfaces/addfooditem.php">
         <i class='bx bx-restaurant' ></i>
         <span class="links_name">Add a Food Item</span>
       </a>
       <span class="tooltip">Add a Food Item</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Customer Care</span>
       </a>
       <span class="tooltip">Customer Care</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-log-out' id="log_out" ></i>
         <span class="links_name">Log Out</span>
       </a>
       <span class="tooltip">Log Out</span>
     </li>
    </ul>

  </div>
</head>
<body>
  <div class="signupFrm">
      <form action="editFood.php" method="POST" enctype="multipart/form-data" class="form">
        <img src="../images/logo.png"alt="Green Soko" style="width: 40%;">
        <a href="dashboard.php">
          <img src="../images/dashboard.png"alt="Green Soko" style="width: 10%;float:right;">
        </a>
        <h1 class="title">Edit Food</h1>


<br>
<div class="inputContainer">
    <input type="text" name="productID" class="input" hidden value="<?php echo $id ?>" required>
    <input type="text" name="productName" class="input" placeholder="Enter the food name" value="<?php echo $foodName ?>" required>
  <label for="" class="label">Enter the food name</label>
</div>




<br>
<div class="inputContainer">
  <input type="text" name="productPrice" class="input" placeholder="Enter the food price" value="<?php echo $price ?>" required>
  <label for="" class="label">Enter the food price</label>
</div>
<br>
<div class="inputContainer">
  <input type="text" name="availableQty" class="input" placeholder="Enter the available quantity" value="<?php echo $availableQty ?>" required>
  <label for="" class="label">Enter the available quantity</label>
</div>
<br>
<div style="text-align:center;">

    <label>Upload Food Image</label><br>
    <img class="images" src="<?php echo "images/".$foodImage; ?>" alt="Image" >
    <input type="file" name="productImage">
<label></label>
</div>


<div class="button">
        <input type="submit" name="uploadfooditem" class="btn" value="Submit">
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

  <style>
      .images{
          border-radius: 7px;
          width: 150px;
          height: 150px;
      }
  </style>

  </body>
  </html>

    <?php
  }else {

     header("location: dashboard.php");
  }

}
    ?>
