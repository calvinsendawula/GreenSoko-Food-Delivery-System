<?php
	session_start();
  require_once("../PHP/phpMethods.php");

	$varUserID = $_SESSION['userID'];

	$sql="SELECT * FROM tbl_user_address where userID = '".$varUserID."'";
	$result = getData($sql);
		if(!empty($result)){
			$varUserLocation = $result["userLocation"];
			$varDropOffInstructions = $result["dropOffInstructions"];
		} else{
			echo("<script>
				alert('Data retrieval failed.');
				</script>");
		}

	$sql2="SELECT * FROM tbl_user_settings where userID = '".$varUserID."'";
	$result = getData($sql2);
		if(!empty($result)){
			$varProfilePicture = $result["userImagePath"];
		} else{
			echo("<script>
				alert('Data retrieval failed.');
				</script>");
		}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/d30f67c531.js" crossorigin="anonymous"></script>

  <!-- Google Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../DASHBOARDCSS/accountCSS.css">
	<link rel="stylesheet" type="text/css" href="../CSS/indexCSS.css">
  <title>User Dashboard</title>
  <style>
    #locationSearchBtn{
      margin-top: -6px;
      /*margin-left: -83.5px;*/
      margin-left: -27px;
      color: #fff;
      background-color: #8ac800;
      border: 1px solid #8ac800;
      height: 45px;
    }

    #locationSearchBtn:hover{
      color: #8ac800;
      background-color: #fff;
    }
  </style>
</head>

<body>
  <!-- This is for the navigation pane -->
	<div class="container">
    <div class="row">
      <div class="col-lg-5">
        <img src="../imageshome/logogreen.png" class="img-fluid my-2" alt="Responsive image" id="big-logo">
        <img src="../imageshome/logogreen.png" class="img-fluid my-2" alt="Responsive image" id="small-logo">
      </div>
      <div class="my-2 col-lg-7">
        <ul class="navlink" id="menu">
          <li><a href="../../index.php">Home</a></li>
          <li><a href="../../PRODUCT_MODULE/locations.php">Restaurants</a></li>
					<button class="icon-box material-symbols-outlined icon-button-nav text-center" onclick="window.location.href='../../PRODUCT_MODULE/cart.php'"
					 id="cart-icon"><p class="icon-middle-nav">local_mall</p></button>
					<li class="cart-icon text-center"><h6><?php echo $_SESSION['totals']['totalQuantity']; ?></h6></li>
					<li class="profile-picture-nav" style="background: url(<?php echo $varProfilePicture; ?>) no-repeat center;"></li>
        </ul>
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="menu-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../imageshome/menu.png" alt="menu">
          </button>
          <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="../../index.php">Home</a>
            <a class="dropdown-item" href="../../PRODUCT_MODULE/locations.php">Restaurants</a>
            <a class="dropdown-item" href="../../PRODUCT_MODULE/cart.php">My cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr id="navbar-line" />

  <div class="container-fluid" id="contact-hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="row">
            <div class="col-12">
              <h4 class="font-weight-bold">Dashboard Settings</h4>
            </div>
          </div>
          <div class="d-grid gap-2 text-center" id="dash-sidebar">
            <button onclick="window.location.href='account.php'" class="btn btn-outline-secondary col-12 my-3" id="icon-button-1" type="button" aria-pressed="true">
              <div class="row container">
                <div class="col-3">
                  <div class="icon-box material-symbols-outlined icon-middle-1"><p class="icon-middle">person</p>
                  </div>
                </div>
                <div class="col-9 px-3">
                  <div class="row">
                    <h5 class="font-weight-bold" id="icon-row-1">Account</h5>
                  </div>
                  <div class="row">
                    <h6 class="font-weight-bold" id="icon-row-2"><small>Personal information</small></h6>
                  </div>
                </div>
              </div>
            </button>

            <button onclick="window.location.href='address.php'" class="btn btn-outline-secondary col-12 my-3" id="icon-button-2" type="button">
              <div class="row container">
                <div class="col-3">
                  <div class="icon-box material-symbols-outlined icon-middle-2"><p class="icon-middle">pin_drop</p>
                  </div>
                </div>
                <div class="col-9 px-3">
                  <div class="row">
                    <h5 class="font-weight-bold" id="icon-row-1">Address</h5>
                  </div>
                  <div class="row">
                    <h6 class="font-weight-bold" id="icon-row-2"><small>Delivery addresses</small></h6>
                  </div>
                </div>
              </div>
            </button>

            <button onclick="window.location.href='paymentMethods.php'" class="btn btn-outline-secondary col-12 my-3" id="icon-button-3" type="button">
              <div class="row container">
                <div class="col-3">
                  <div class="icon-box material-symbols-outlined icon-middle-3"><p class="icon-middle">credit_card</p>
                  </div>
                </div>
                <div class="col-9 px-3">
                  <div class="row">
                    <h5 class="font-weight-bold" id="icon-row-1">Payment Method</h5>
                  </div>
                  <div class="row">
                    <h6 class="font-weight-bold" id="icon-row-2"><small>Connected credit/debit cards</small></h6>
                  </div>
                </div>
              </div>
            </button>

            <button onclick="window.location.href='security.php'" class="btn btn-outline-secondary col-12 my-3" id="icon-button-4" type="button">
              <div class="row container">
                <div class="col-3">
                  <div class="icon-box material-symbols-outlined icon-middle-4"><p class="icon-middle">shield</p>
                  </div>
                </div>
                <div class="col-9 px-3">
                  <div class="row">
                    <h5 class="font-weight-bold" id="icon-row-1">Security</h5>
                  </div>
                  <div class="row">
                    <h6 class="font-weight-bold" id="icon-row-2"><small>Password, 2FA</small></h6>
                  </div>
                </div>
              </div>
            </button>

						<button onclick="window.location.href='pastOrders.php'" class="btn btn-outline-secondary col-12 my-3" id="icon-button-5" type="button">
              <div class="row container">
                <div class="col-3">
                  <div class="icon-box material-symbols-outlined icon-middle-5"><p class="icon-middle">shopping_cart</p>
                  </div>
                </div>
                <div class="col-9 px-3">
                  <div class="row">
                    <h5 class="font-weight-bold" id="icon-row-1">My orders</h5>
                  </div>
                  <div class="row">
                    <h6 class="font-weight-bold" id="icon-row-2"><small>View past orders</small></h6>
                  </div>
                </div>
              </div>
            </button>
          </div>
        </div>
        <br><br>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-12">
              <h4 class="font-weight-bold">Address</h4>
            </div>
          </div>
          <div class="card" id="dashboard-form">
            <div class="card-body">
              <div class="container">
              	<h4 class="font-weight-bold">Edit Location</h4>
                <div id="map" style="height: 300px;"></div>
                <br>
                <form action="" id="location-form">
                  <div class="row">
                    <div class="col-4">
                      <h5 id="text-center">Enter Location</h5>
                    </div>
                    <div class="col-7">
                      <input type="text" id="location-input" class="form-control form-control-lg" placeholder="e.g Magharibi place">
                    </div>
                    <div class="col-1">
                      <button type="submit" id="locationSearchBtn" class="btn btn-outline-primary material-symbols-rounded"><h4>search</h4></button>
                    </div>
                  </div>
                </form>
								<form method="post" action="../DASHBOARDPHP/processAddress.php">
									<div class="row">
										<div class="col-4">
											<h5 id="text-center">Address Selected:</h5>
										</div>
										<div class="col-8">
											<div class="card-block" id="formatted-address">
	                      <input type="text" class="form-control" autocomplete="off" value="<?php echo $varUserLocation; ?>" disabled>
	                    </div>
										</div>
									</div>
	                <div class="row">
										<div class="col-4">
											<h5 id="text-center">Drop off Instruction</h5>
										</div>
										<div class="col-8">
	                  <input type="text" class="form-control" autocomplete="off" name="dropOffInstructions" value="<?php echo $varDropOffInstructions; ?>" required><br>
								    <!--<input type="text" class="form-control" autocomplete="off" name="addressSelected" hidden>-->
										</div>
									</div>
									<!--<div class="col-5" id="formatted-address" hidden></div>-->
							    <div class="card-block" id="address-components" hidden></div>
							    <div class="card-block" id="geometry" hidden></div>

									<hr id="gray-line" />
									<div class="row" id="submit-buttons">
										<div class="col-2">
											<a class="btn btn-outline-dark text-center" onClick="window.location.href='../FRONT/logout.php'" id="logoutBtn">Logout</a>
										</div>
										<div class="col-4"></div>
										<div class="col-6">
											<a class="btn btn-outline-dark text-center" id="discardChangesBtn" onClick="window.location.href='../DASHBOARD/address.php'">Discard changes</a>
											<button class="btn btn-outline-dark text-center" type="submit" role="button" id="saveChangesBtn">Save changes</button>
										</div>
									</div>
								</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <script src="../js/dashboard.js"></script>
  <script src="../js/address.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDseLk80xNWincbi9kLIoGmRZXk84sMk&callback=initMap&v=weekly" defer></script>
</body>

</html>
