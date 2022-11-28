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

	$sql3="SELECT * FROM tbl_user_notifications where userID = '".$varUserID."'";
	$result = getData($sql3);
		if(!empty($result)){
			$varNewDeals = $result["newDeals"];
			$varNewRestaurants = $result["newRestaurants"];
			$varOrderStatuses = $result["orderStatuses"];
			$varPasswordChanges = $result["passwordChanges"];
			$varSpecialOffers = $result["specialOffers"];
			$varNewsLetter = $result["newsLetter"];

			$emailArray = array($varNewDeals,$varNewRestaurants,$varOrderStatuses,$varPasswordChanges,$varSpecialOffers,$varNewsLetter);
			$emailValueArray = array('true','true','true','true','true','true');

			for ($i=0; $i < 6; $i++) {
      	if($emailArray[$i] == 0){
					$emailValueArray[$i] = '';
      	} elseif($emailArray[$i] == 1){
					$emailValueArray[$i] = 'checked';
      	}
      }
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

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/d30f67c531.js" crossorigin="anonymous"></script>

  <!-- Google Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../DASHBOARDCSS/accountCSS.css">
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
              <h4 class="font-weight-bold">Account</h4>
            </div>
          </div>
          <form action="../DASHBOARDPHP/processAccount.php" method="post" autocomplete="off">
            <div class="card" id="dashboard-form">
              <div class="card-body">
                <h4 class="font-weight-bold">Personal Information</h4>
                <div class="row">
                  <div class="col-7">
                    <div class="form-group">
                      <label for="profilePicture">Profile Picture</label>
                      <div class="row" id="profile-picture">
                        <div class="col-3">
                          <div class="profile-picture" style="background: url(<?php echo $varProfilePicture; ?>) no-repeat center;"></div>
                        </div>
                        <div class="col-6 text-center" style="margin-left:-30px;"><br>
													<a class="btn btn-outline-dark text-center" onclick="window.location.href='../DASHBOARD/uploadPicture.php'" id="changeBtn">Change</a>
                        </div>
                        <!--<div class="col-1" style="margin-left:-60px;"><br>
                          <button class="btn btn-outline-dark text-center" role="button" id="removeBtn">Remove</button>
                        </div>-->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-7">
                    <div class="form-group">
                      <label for="email">Email</label><br>
    									<input type="email" class="form-control" autocomplete="off" name="email" value="<?php echo $varEmail; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-7">
                    <div class="form-group">
                      <label for="phoneNo">Phone Number</label><br>
    									<input type="text" class="form-control" autocomplete="off" name="phoneNo" value="<?php echo $varPhone; ?>" minlength="11" maxlength="13" required>
                    </div>
                  </div>
                </div>
                <br>
                <h4 class="font-weight-bold">Email notifications</h4>
                <div class="row container">
                  <div class="col form-check">
                    <input class="form-check-input" type="checkbox" name="flexCheckChecked0" <?php echo($emailValueArray[0]); ?>>
                    <label class="form-check-label" for="flexCheckChecked0">
                      New deals
                    </label>
                  </div>
                  <div class="col form-check">
                    <input class="form-check-input" type="checkbox" name="flexCheckChecked3" <?php echo($emailValueArray[3]); ?>>
                    <label class="form-check-label" for="flexCheckChecked3">
                      Password changes
                    </label>
                  </div>
                </div>
                <div class="row container">
                  <div class="col form-check">
                    <input class="form-check-input" type="checkbox" name="flexCheckChecked1" <?php echo($emailValueArray[1]); ?>>
                    <label class="form-check-label" for="flexCheckChecked1">
                      New restaurants
                    </label>
                  </div>
                  <div class="col form-check">
                    <input class="form-check-input" type="checkbox" name="flexCheckChecked4" <?php echo($emailValueArray[4]); ?>>
                    <label class="form-check-label" for="flexCheckChecked4">
                      Special offers
                    </label>
                  </div>
                </div>
                <div class="row container">
                  <div class="col form-check">
                    <input class="form-check-input" type="checkbox" name="flexCheckChecked2" <?php echo($emailValueArray[2]); ?>>
                    <label class="form-check-label" for="flexCheckChecked2">
                      Order statuses
                    </label>
                  </div>
                  <div class="col form-check">
                    <input class="form-check-input" type="checkbox" name="flexCheckChecked5" <?php echo($emailValueArray[5]); ?>>
                    <label class="form-check-label" for="flexCheckChecked5">
                      Newsletter
                    </label>
                  </div>
                </div>
								<hr id="gray-line" />
								<div class="row" id="submit-buttons">
									<div class="col-2">
										<a class="btn btn-outline-dark text-center" onClick="window.location.href='../FRONT/logout.php'" id="logoutBtn">Logout</a>
									</div>
									<div class="col-4"></div>
									<div class="col-6">
										<a class="btn btn-outline-dark text-center" id="discardChangesBtn" onClick="window.location.href='../DASHBOARD/account.php'">Discard changes</a>
										<button class="btn btn-outline-dark text-center" type="submit" name="saveChanges" role="button" id="saveChangesBtn">Save changes</button>
									</div>
								</div>
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
