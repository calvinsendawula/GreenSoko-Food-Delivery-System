<?php
	session_start();
  require_once("../PHP/phpMethods.php");

	$varUserID = $_SESSION['userID'];

	$sql="SELECT * FROM tbl_user where userID = '".$varUserID."'";
	$result = getData($sql);
		if(!empty($result)){
			$varEmail = $result["email"];
			$varPhone = $result["phone"];
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

	$sql3="SELECT * FROM tbl_user_settings where userID = '".$varUserID."'";
  $result = getData($sql3);
    if(!empty($result)){
			$var2FAEnabled = $result["twoFAEnabled"];
			$varAlternateEmail = $result["alternateEmail"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/d30f67c531.js" crossorigin="anonymous"></script>

  <!-- Google Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../DASHBOARDCSS/accountCSS.css">
	<link rel="stylesheet" href="../DASHBOARDCSS/securityCSS.css">
	<link rel="stylesheet" type="text/css" href="../CSS/indexCSS.css">
  <title>User Dashboard</title>
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
              <h4 class="font-weight-bold">Security</h4>
            </div>
          </div>
          <form action="../DASHBOARDPHP/processSecurity.php" method="post" autocomplete="off">
            <div class="card" id="dashboard-form">
              <div class="card-body">
                <h4 class="font-weight-bold">Change password</h4>
								<hr id="gray-line-2" />
                <div class="row">
                  <div class="col-7">
                    <div class="form-group">
                      <label for="oldPassword">Old password</label><br>
    									<input type="password" class="form-control" autocomplete="off" name="oldPassword" required>
                    </div>
                  </div>
                </div>
								<div class="row">
                  <div class="col-7">
                    <div class="form-group">
                      <label for="newPassword">New password</label><br>
    									<input type="password" class="form-control" autocomplete="off" name="newPassword" required>
                    </div>
                  </div>
                </div>
								<div class="row">
                  <div class="col-7">
                    <div class="form-group">
                      <label for="confirmNewPassword">Confirm password</label><br>
    									<input type="password" class="form-control" autocomplete="off" name="confirmNewPassword" required>
                    </div>
                  </div>
                </div>
								<div class="row container">
		              <p>Make sure it has 15 characters OR at least 8 characters. <a href="https://bit.ly/3PSxONy" target="_blank">Learn more</a></p>
								</div>
								<div class="row" id="updateBtns">
									<button class="btn btn-outline-info text-center" type="submit" role="button" id="updatePasswordBtn">Update Password</button>
									<button class="btn btn-outline-info text-center" role="button" id="forgotPasswordBtn"><a href="forgotPassword.php">I forgot my password</a></button>
									<a class="btn btn-outline-dark text-center" id="discardChangesBtn" onClick="window.location.href='../DASHBOARD/security.php'">Discard changes</a>
								</div>
                <br>
                <h4 class="font-weight-bold">Two-factor Authentication</h4>
								<hr id="gray-line-2" />
								<?php
									if($var2FAEnabled == 1){
										include 'twoFactorEnabled.php';
									} else{
										include 'twoFactorDisabled.php';
									}
								?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script>
    less = {
      env: 'development'
    };
  </script>
  <script src="less.js"></script>
  <script>
    less.watch();
  </script>
  <script src="../js/dashboard.js"></script>
</body>

</html>
