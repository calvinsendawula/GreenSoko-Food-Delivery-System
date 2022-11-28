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

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  	<link rel="stylesheet" type="text/css" href="../CSS/indexCSS.css">
    <style>
      #dashboard-form{
        max-width: 500px;
      }
      #dashboard-form-shell{
        margin-top: 150px;
      }
    </style>
    <title>OTP</title>
  </head>
  <body>
    <div id="dashboard-form-shell">
      <div class="card container" id="dashboard-form">
        <div class="card-body">
          <form method="post" action="../DASHBOARDPHP/processResetPassword.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="row text-center">
  									<div class="col">
  										<span class="material-symbols-rounded">password</span>
  									</div>
  								</div>
  								<div class="row text-center">
  									<div class="col">
  										<h5 class="font-weight-bold">Reset Password</h5>
  									</div>
  								</div>
                  <div class="row text-center">
  									<div class="col">
  										<p>DO NOT CLOSE OR REFRESH THIS PAGE</p>
  									</div>
  								</div>
                  <div class="row text-center">
                    <div class="col-2"></div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="newPassword">New password</label><br>
      									<input type="password" class="form-control" autocomplete="off" name="newPassword" required>
                      </div>
                    </div>
                  </div>
  								<div class="row text-center">
                    <div class="col-2"></div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="confirmNewPassword">Confirm password</label><br>
      									<input type="password" class="form-control" autocomplete="off" name="confirmNewPassword" required>
                      </div>
                    </div>
                  </div><br>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button style="min-width:150px;" class="btn btn-outline-dark text-center" type="submit" role="button" name="checkOTP" id="saveChangesBtn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
