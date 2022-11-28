<?php 

//	 USEFUL METHODS

	// 1. Set session variables
$_SESSION['sessionVarName']=$result['varContent'];
$_SESSION['sessionVarName']="varContent";

	// 2. Unset specific Session variables
unset($_SESSION['sessionVarName']);

	// 3. Destroy all Session variables
session_destroy();

	// 4. Set and destroy cookies
$expiretime1 = time() + 60*60*3; //Set cookie to expire after 3 hours(preferred TODO).
$expiretime2 = time() + 60*60*24; //Set cookie to expire after 24 hours.
$expiretime3 = time() + 60*60*24*7; //Set cookie to expire after 1 week.
$expired = time() -1; //Destroy cookie
setcookie($cookieName, "content", $expiretime3); //New cookie
setcookie($cookieName, "", $expired); //Destroyed cookie

	// 5. Check if something is set or is empty
if (isset($_POST["var"])) {
	if (empty($_POST["var1"]) || empty($_POST["var2"])) {
		header("location:fileName.extension");
		exit();
	}
}
 ?>