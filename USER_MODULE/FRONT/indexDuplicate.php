<?php
	session_start();
  require_once("../PHP/phpMethods.php");
	$varPopup = 1;
	$varStyleSheet = "../CSS/indexCSS.css";

	if($varPopup == 1){
		$varStyleSheet = "../CSS/indexCSS.css";
	} elseif($varPopup == 2){
		$varStyleSheet = "../CSS/login.css";
	}

	function changeStyle(){
		if($varPopup == 1){
			$varPopup += 1;
		} elseif($varPopup == 2){
			$varPopup -= 1;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Green Soko</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/75053439fc.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo($varStyleSheet); ?>">
  <link href="../CSS/popupStyles.css" rel="stylesheet">
  <script defer src="../js/popupScript.js"></script>
	<link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
</head>
<body>
<!-- Navigation -->
	<nav class= "navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container">
			<a class="navbar-brand" href="javascript:history.go(0)">
				<img src="../imageshome/logogreen.png" alt="Green soko">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="javascript:history.go(0)">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php menuRedirect(); ?>">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../FRONT/contacts.php">Contact us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../FRONT/login.php">Sign in</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../DASHBOARD/account.php">Dashboard</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</nav>
<!-- End Navigation -->

<!--- Image Slider -->
	<div id="slides" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="../imageshome/background1.jpg" alt="first slide">
				<div class="carousel-caption">
					<h1>Green</h1><h2>soko</h2>
					<a type="button" class="btn btn-outline-light btn-lg" href="<?php menuRedirect(); ?>">Explore</a>
					<a type="button" class="btn btn-primary btn-lg" href="<?php menuRedirect(); ?>">Order Now</a>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../imageshome/background2.jpg" alt="second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../imageshome/background3.jpg" alt="third slide">
			</div>
		</div>
	</div>
<!--- End Image Slider -->

<!--- Jumbotron -->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-xl-9">
					<p class="lead text-center">
						Just order and wait for a while. We will be there at your door. We are a click away from your pick. Food delivery at your convenience.
					</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 col-xl-3">
					<a type="button" class="btn btn-outline-secondary btn-lg" href="<?php menuRedirect(); ?>">Proceed to order</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--- End Jumbotron -->


<!--- Welcome Section -->
	<div class="container-fluid padding">
		<div class="container">
			<div class="row welcome text-center">
				<div class="col-12">
					<h1 class="display-4">Dedicated to serving you</h1>
				</div>
				<hr>
				<div class="col-12">
					<p class="lead">
						Welcome to the Green soko online delivery platform where we bring joy to your door.
					</p>
				</div>
			</div>
		</div>
	</div>
<!--- End Welcome Section -->

<!--- Three Column Section -->
	<div class="container-fluid padding">
		<div class="container">
			<div class="row text-center padding">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="storeInfo__wrapper">
						<div class="storeInfo__item">
							<div class="storeInfo__icon">
								<img src="../imageshome/fast.png" alt="">
							</div>
							<h3 class="storeInfo__title">Fast</h3>
							<p class="storeInfo__text"> Food at speed of a click</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="storeInfo__wrapper">
						<div class="storeInfo__item">
							<div class="storeInfo__icon">
								<img src="../imageshome/delivery.png" alt="">
							</div>
							<h3 class="storeInfo__title">Convenient</h3>
							<p class="storeInfo__text">Freshness delivered</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="storeInfo__wrapper">
						<div class="storeInfo__item">
							<div class="storeInfo__icon">
								<img src="../imageshome/food.png" alt="">
							</div>
							<h3 class="storeInfo__title">Delicious</h3>
							<p class="storeInfo__text">Tasty and affordable food.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--- End Three Column Section -->

<!--- Two Column Section -->
	<div class="container-fluid padding gray">
		<div class="container" id="hero">
			<div class="row padding">
				<div class="col-md-12 col-lg-6" id="sub-hero">
					<div>
						<h2>Easy to use</h2>
						<p>Sign in, select your preferred restaurant, place the order, make the payment and wait for it to be delivered at the comfort of your home</p>
						<p>Eat the food you dream about at affordable prices. Filling your tummy is what we care about.</p>
						<br>
						<a href="<?php menuRedirect(); ?>" class="btn btn-primary">Proceed to order</a>
					</div>
				</div>
				<div class="col-lg-6">
					<img src="../imageshome/user1.png" class="image-fluid" width="90%" height="auto"  alt="">
				</div>
			</div>
		</div>
	</div>
<!--- End Two Column Section -->


<!--- Fixed background -->
	<figure>
		<div class="fixed-wrap">
			<div id="fixed"></div>
		</div>
	</figure>

<!--- End Fixed background -->


<!--- Features -->
	<div class="container-fluid padding">
		<div class="container">
			<div class="row welcome text-center">
				<div class="col-12">
					<h1 class="display-4">Features</h1>
				</div>
				<hr>
			</div>
		</div>
	</div>
<!--- End Features -->

<!--- Cards -->
	<div class="container-fluid padding">
		<div class="container">
			<div class="row padding">
				<div class="col-md-4">
					<div class="card">
						<img src="../imageshome/image1.png" alt="" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Reviews</h4>
							<p class="card-text">
								Some customer reviews
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img src="../imageshome/image2.png" alt="" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Best Sellers</h4>
							<p class="card-text">
								Some of the available dishes
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<img src="../imageshome/image5.png" alt="" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Order Today</h4>
							<p class="card-text">
								Order,Eat and Enjoy
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--- End Cards -->


<!--- Two Column Section -->
<div class="container-fluid padding gray">
	<div class="container" id="hero">
		<div class="row padding">
			<div class="col-md-12 col-lg-6">
				<img src="../imageshome/happy.jpg" class="image-fluid" width="90%" height="auto" alt="customer">
			</div>
			<div class=" col-lg-6" id="sub-hero">
				<div>
					<h2>Our goal</h2>
					<p>Green Soko is democratizing commerce by making online buying easy, trusted, and consistent
						for all our happy shoppers so that independent retailers can thrive</p>
					<p>One order at a time, we are changing our ecosystem by lowering the carbon footprint of humanity, delivering
						your food by e-bikes right to your doorstep.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--- End Two Column Section -->

<!--- Connect -->
	<div class="container-fluid padding">
		<div class="container">
			<div class="row text-center padding2">
				<div class="col-12">
					<h2>Connect with us</h2>
				</div>
				<div class="col-12 social padding">
					<a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
					<a href="https://twitter.com/i/flow/login" target="_blank"><i class="fab fa-twitter"></i></a>
					<a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</div>
<!--- End Connect -->

<!--- Footer -->
<footer>
	<div class="container-fluid padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<hr class="light">
					<center>
						<h5><i class="fa-solid fa-phone"></i> &emsp;Contact Us</h5>
						<hr class="light">
						<p></i><a href="tel:+254 712 345 678" style="color: #fff;">+254 712 345 678</a></p>
						<p><a href="mailto:greensoko@gmail.com" style="color: #fff; "target="_blank">greensoko@gmail.com</a></p>
						<p><a href="https://bit.ly/3FLXwi9" style="color: #fff;" target="_blank">Nairobi, Kenya</a></p>
					</center>
				</div>
				<div class="col-md-4">
					<hr class="light">
					<center>
						<h5><i class="fa-solid fa-clock"></i> &emsp; Our hours</h5>
						<hr class="light">
						<p>Weekdays: 9.00am - 9.00pm </p>
						<p>Weekends: 10.00am - 9.00pm </p>
						<p>Holidays: Open under normal working hours </p>
					</center>
				</div>
				<div class="col-md-4">
					<hr class="light">
					<center>
						<h5> <i class="fa-solid fa-location-dot"></i> &emsp; Service Areas</h5>
						<hr class="light">
						<p><a href="https://bit.ly/37PbVha" style="color: #fff;" target="_blank">Madaraka</a></p>
						<p><a href="https://bit.ly/3PxW4oi" style="color: #fff;" target="_blank">Nairobi West</a></p>
						<p><a href="https://bit.ly/38vdp0b" style="color: #fff;" target="_blank">Magharibi</a></p>
					</center>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--- End Footer -->

<div class="col-12">
	<center>
	<h6><img src="../imageshome/logogreen.png" width="6%" alt=""> &copy; greensoko </h6>
	</center>
</div>
</body>
</html>
