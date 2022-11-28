<?php
session_start();
require_once("phpMethods.php");

$varEmail = $_POST['email'];
$varPassword = $_POST['password'];

$varRoleName = 'Client';

$hashedPass = password_hash($varPassword,PASSWORD_DEFAULT);

if(($_POST['password']) != ($_POST['confirmPassword'])){
	echo("<script>
		window.location.href='../FRONT/register.php';
		alert('Password mismatch. Please try again');
		</script>");
} else{
	if(!empty($_POST['email'])){
		if(!empty($_POST['password'])){
		  $sql="SELECT * FROM tbl_user where email = '".$varEmail."'";
		  $result = getData($sql);
		  if(!empty($result)){
				echo("<script>
					window.location.href='../FRONT/register.php';
					alert('This email account already exists. Please login instead or register with another account.');
					</script>");
		  } else{
				/*$sql_insert1 = "INSERT INTO tbl_role(roleName) VALUES('$varRoleName')";
				setData($sql_insert1);*/

			  $sql2="SELECT * FROM tbl_role WHERE roleName = '.$varRoleName.'";
			  $result2 = getData($sql2);
			  if(!empty($result2)){
			    $varRoleID = $result2["roleID"];
					echo($varRoleID);
			  }

				$sql_insert2 = "INSERT INTO tbl_user(email,password,roleID) VALUES('$varEmail','$hashedPass',25257673)";
				setData($sql_insert2);

				$sql3="SELECT * FROM tbl_user ORDER BY userID DESC LIMIT 1";
			  $result3 = getData($sql3);
			  if(!empty($result3)){
			    $varUserID = $result3["userID"];
			  }

				$sql_insert3 = "INSERT INTO tbl_user_address(userID) VALUES('$varUserID')";
				setData($sql_insert3);

				$sql_insert4 = "INSERT INTO tbl_user_settings(userID) VALUES('$varUserID')";
				setData($sql_insert4);

				$sql5="SELECT * FROM tbl_user_settings ORDER BY userSettingsID DESC LIMIT 1";
			  $result5 = getData($sql5);
			  if(!empty($result5)){
			    $varUserSettingsID = $result5["userSettingsID"];
			  }

				$sql_insert5 = "INSERT INTO tbl_user_notifications(userSettingsID,userID) VALUES('$varUserSettingsID','$varUserID')";
				setData($sql_insert5);

				$sql_insert6 = "INSERT INTO tbl_user_card_sessions(userID) VALUES('$varUserID')";
				setData($sql_insert6);

				echo("<script>
					window.location.href='../FRONT/login.php';
					alert('Thank you for signing up. You will now be redirected to the login page.');
					</script>");
			}
		}
	} else{
			echo("<script>
				window.location.href='../FRONT/register.php';
				alert('Please check your info and try again.');
				</script>");
			}
		}
 ?>
