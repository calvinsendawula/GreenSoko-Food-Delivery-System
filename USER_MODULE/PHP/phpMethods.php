<?php

function dbPortInfo(){
	$dbport = "3306";
	return ($dbport);
}

function connect(){
	$dbserver = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "green_soko";
	$dbport = dbPortInfo();
	$link=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname,$dbport) or die("Could not connect".mysqli_connect_error());
	return ($link);
}

function setData($sql){
	$link=connect();
	if (mysqli_query($link,$sql)) {
		return true;
	} else {
		echo("<script>
			alert('Error '".mysqli_error($link).");
			</script>");
		return false;
	}
}

function getData($sql){
	$link=connect();
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$rows=$row;
		return $rows;
	}
}

function getDataRows($sql){
	$link=connect();
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$rows[]=$row;
	}
	if(!empty($rows)){
		return $rows;
	}
}

function menuRedirect(){
	$varLogin = "USER_MODULE/FRONT/login.php";
	$varOrder = "PRODUCT_MODULE/locations.php";
	if (isset($_SESSION['userLog'])) {
		$varUserLog = $_SESSION['userLog'];
	} else {
			$varUserLog = 0;
	}
	if(!empty($varUserLog)){
		if($varUserLog == 0){
			echo($varLogin);
		} elseif($varUserLog == 1){
				echo($varOrder);
		}
	} else{
			echo($varLogin);
	}
}

function menuRedirect2(){
	$varLogin = "login.php";
	$varOrder = "../../PRODUCT_MODULE/locations.php";
	if (isset($_SESSION['userLog'])) {
		$varUserLog = $_SESSION['userLog'];
	} else {
			$varUserLog = 0;
	}
	if(!empty($varUserLog)){
		if($varUserLog == 0){
			echo($varLogin);
		} elseif($varUserLog == 1){
				echo($varOrder);
		}
	} else{
			echo($varLogin);
	}
}

function dashRedirectPage(){
	$varPageLogin = 'USER_MODULE/FRONT/login.php';
  $varPageDash = 'USER_MODULE/DASHBOARD/account.php';
	if (isset($_SESSION['userLog'])) {
		$varUserLog = $_SESSION['userLog'];
	} else {
			$varUserLog = 0;
	}
	if(!empty($varUserLog)){
		if($varUserLog == 0){
			echo($varPageLogin);
		} elseif($varUserLog == 1){
				echo($varPageDash);
		}
	} else{
			echo($varPageLogin);
	}
}

function dashRedirectPage2(){
	$varPageLogin = 'login.php';
  $varPageDash = '../DASHBOARD/account.php';
	if (isset($_SESSION['userLog'])) {
		$varUserLog = $_SESSION['userLog'];
	} else {
			$varUserLog = 0;
	}
	if(!empty($varUserLog)){
		if($varUserLog == 0){
			echo($varPageLogin);
		} elseif($varUserLog == 1){
				echo($varPageDash);
		}
	} else{
			echo($varPageLogin);
	}
}

function dashRedirectDisplay(){
	$varDisplayLogin = 'Sign in';
  $varDisplayDash = 'Dashboard';
	if (isset($_SESSION['userLog'])) {
		$varUserLog = $_SESSION['userLog'];
	} else {
			$varUserLog = 0;
	}
	if(!empty($varUserLog)){
		if($varUserLog == 0){
			echo($varDisplayLogin);
		} elseif($varUserLog == 1){
				echo($varDisplayDash);
		}
	} else{
			echo($varDisplayLogin);
	}
}

function displayCart(){
	$varDisplayLogin = '';
  $varDisplayCart = '<li class="nav-item">
		<a class="nav-link" href="PRODUCT_MODULE/cart.php">Cart</a>
	</li>';
	if (isset($_SESSION['userLog'])) {
		$varUserLog = $_SESSION['userLog'];
	} else {
			$varUserLog = 0;
	}
	if(!empty($varUserLog)){
		if($varUserLog == 0){
			//echo($varDisplayLogin);
		} elseif($varUserLog == 1){
				echo($varDisplayCart);
		}
	} else{
			//echo($varDisplayLogin);
	}
}

function destroyCookie($cookieName){
	$expired = time() -1;
	setcookie($cookieName, "", $expired);
}

function verifyUser($varEmail, $varPassword){
	$dbserver = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "green_soko";
	$dbport = dbPortInfo();
	$conn = new mysqli($dbserver,$dbuser,$dbpass,$dbname,$dbport);

	$sql="SELECT * FROM tbl_user where email = '".$varEmail."'";
	$result= $conn->query($sql);
	if (mysqli_num_rows($result)!=0) {
		while($res = mysqli_fetch_array($result)) {
			$hashedPass = $res['password'];
			$verify = password_verify($varPassword, $hashedPass);
	  	if ($verify) {
				if($res['isDeleted'] != 0){
					echo("<script>
						window.location.href='../FRONT/login.php';
						alert('This user account is no longer active! <br> Try logging in with different credentials.');
						</script>");
				} else {
					$varRoleID = $res['roleID'];
					$_SESSION['userRoleID']=$res['roleID'];
					$_SESSION['userID']=$res['userID'];
					$varUserID = $res['userID'];
					$sql2="SELECT * FROM tbl_role where roleID = '".$varRoleID."'";
					$result2= $conn->query($sql2);
					if (mysqli_num_rows($result2)!=0) {
						while($res2 = mysqli_fetch_array($result2)){
							$_SESSION['userLog']='1';
							$_SESSION['totals']['totalQuantity'] = 0;
							$_SESSION["totals"]["totalPrice"] = 0;
					    /*$time = getdate();
					    $sql_update = "UPDATE tbl_user_login SET lastLogin = '$time' WHERE userID=$varUserID"
					    setData($sql_update);*/
							if($res2['roleName'] == 'Client' && $res2['isDeleted'] == 0){
								echo("<script>
									window.location.href='../../PRODUCT_MODULE/locations.php';
									alert('Login Successful.');
									</script>");
							} elseif($res2['roleName'] == 'Admin' && $res2['isDeleted'] == 0){
								echo("<script>
									window.location.href='../../ADMIN_MODULE/Interfaces/signin.php';
									alert('Login Successful. Loading 2FA..');
									</script>");
							}
						}
					} else{
						echo("<script>
							window.location.href='../FRONT/login.php';
							alert('User role not set!');
							</script>");
					}
		  	}
			}	else {
				echo '<script>
					alert("Invalid Password. Please try again");
					window.location.href = "../FRONT/login.php";
					</script>';
			}
		}
	} else{
		echo '<script>
			alert("Invalid email. Please try again.");
			window.location.href = "../FRONT/login.php";
			</script>';
	}
}

 ?>
