<?php

function dbPortInfo(){
	$dbport = "3306"; //Specify port to use to host server
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

function getData($sql){
	$link=connect();
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$rows[]=$row;
	}
	return $rows;
}

function insertQuery($sql){
	$link=connect();
	$result=mysqli_query($link,$sql);

	return $result;
}

function getDataRows($sql){
	$link=connect();
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$rows[]=$row;
	}
	return $rows;
}

function dashRedirectPage(){
	$varPageLogin = '../USER_MODULE/FRONT/login.php';
  $varPageDash = '../USER_MODULE/DASHBOARD/account.php';
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

 ?>
