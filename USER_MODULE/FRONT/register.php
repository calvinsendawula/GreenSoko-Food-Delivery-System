<!DOCTYPE html>
<html>
<head>
	<meta charset="UT-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta  name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <!--CSS CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

	<main>
		<div class="centerpiece">
			<div class="box">

					<div class="forms-wrap">
						<form action="../PHP/processRegister.php" method="post" class="sign-in-form" autocomplete="off">
							<div class="logo">
								<img src="../imageslr/logogreen.png" alt="Green Soko">
							</div>
							<div class="heading">
								<h2>Register</h2>
								<p>Sign up with us below</p>
							</div>

							<div class="actual-form">
								<div class="input-wrap">
									<label for="email">Email</label><br>
									<input type="email" class="input-field" autocomplete="off" name="email" id="user-name" placeholder="name@example.com" required>
								</div>
								<div class="input-wrap">
									<label for="password">Password</label><br>
									<input type="password" class="input-field" autocomplete="off" name="password" id="user-password" minlength="8" placeholder="min. 8 characters"
									required>
								</div>
                <div class="input-wrap">
									<label for="password">Confirm Password</label><br>
									<input type="password" class="input-field" autocomplete="off" name="confirmPassword" id="user-password" minlength="8" placeholder="min. 8 characters"
									required>
								</div>
								<br>
								<input type="submit" value="Register" class="sign-btn">
								<p class="text">
									<center>
									<a href="#" class="toggle">Forgot Password?</a>
									</center>
								</p>
							</div>

							<div class="signup">
								<p class="signup">
									<center>
										Already have an account?
										<a href="../FRONT/login.php" class="toggle">Log in</a>
									</center>
								</p>

							</div>

						</form>
					</div>
				</div>
	</main>
<!-- Javascript file-->
<script type="text/javascript" src="../js/login.js"></script>
</body>
</html>
