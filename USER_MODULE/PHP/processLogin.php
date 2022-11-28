<?php
session_start();
require_once("phpMethods.php");

$varEmail = $_POST['email'];
$varPassword = $_POST['password'];

verifyUser($varEmail,$varPassword);

 ?>
