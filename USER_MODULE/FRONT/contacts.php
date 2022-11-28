<?php
	session_start();
  require_once("../PHP/phpMethods.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/75053439fc.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/contactsCSS.css">
	<link rel="stylesheet" type="text/css" href="../CSS/indexCSS.css">
  <title>Contacts</title>
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
          <li><a href="<?php menuRedirect2(); ?>">Services</a></li>
          <li><a href="javascript:history.go(0)">Contact Us</a></li>
          <!--<li><a href="../FRONT/login.php">Sign in</a></li>-->
          <!--<li><a href="../DASHBOARD/account.php">Dashboard</a></li>-->
					<li><a href="<?php dashRedirectPage2(); ?>"><?php dashRedirectDisplay(); ?></a></li>
        </ul>
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="menu-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../imageshome/menu.png" alt="menu">
          </button>
          <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="../../index.php">Home</a>
            <a class="dropdown-item" href="<?php menuRedirect2(); ?>">Services</a>
            <a class="dropdown-item" href="javascript:history.go(0)">Contact Us</a>
						<a class="dropdown-item" href="<?php dashRedirectPage2(); ?>"><?php dashRedirectDisplay(); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" id="contact-hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-12">
              <h2 class="font-weight-bold" id="soko-green-text">Contact Us</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="mailto:info@greensoko.com" target="_blank">info@greensoko.com</a><br>
              <text id="Grey-text">
                <a href="tel:+254 775 915152">+254 775 915152</a><br>
                <a href="tel:+254 772 386510">+254 772 386510</a>
              </text>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="container">
              <h1 class="font-weight-bold orange-margin-text">
                To make requests for further information, reach us via our
                <a href="tel:+254 775 915152" style="color: #8ac800;" class="twitter-soko-green-text">Contact</a> channels.
              </h1>
              <text id="Grey-text-2">
                Want to talk to someone? <br>
                <text id="Grey-text-2">
                  Dial the numbers above <br>
                </text>
                <text id="Grey-text-2">
                  Alternatively, fill out the form.
                </text>
              </text>
            </div>
          </div>
        </div>
        <br><br>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-12">
              <h2 class="font-weight-bold" id="soko-green-text">Connect With Us</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="https://www.facebook.com/" target="_blank">
                <i class="fa-brands fa-facebook-f fa-3x" id="contact-social-facebook"></i>
              </a>
              <a href="https://twitter.com/i/flow/login" target="_blank">
                <i class="fa-brands fa-twitter fa-3x" id="contact-social-twitter"></i>
              </a>
              <a href="https://www.instagram.com/accounts/login/" target="_blank">
                <i class="fa-brands fa-instagram fa-3x" id="contact-social-instagram"></i>
              </a>
            </div>
          </div>
          <br>
          <form action="../PHP/processFeedback.php" method="post" autocomplete="off">
            <div class="card" id="feedback-form">
              <div class="card-body">
                <h1 class="display-5" id="yellow-text-blue-bg">
                  <small>Feedback Form</small>
                </h1>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <input class="form-control" type="text" name="fname" placeholder="First Name" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <input class="form-control" type="text" name="lname" placeholder="Last name" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input type="email" class="form-control" type="text" name="email" placeholder="Email: name@example.com" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="3" maxlength="255" placeholder="Message" required></textarea>
                    </div>
                  </div>
                </div>
                <button class="btn btn-outline text-center" type="submit" role="button" id="submit-button">SUBMIT</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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
</body>

</html>
