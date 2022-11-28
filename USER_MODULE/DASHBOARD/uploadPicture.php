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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../DASHBOARDCSS/accountCSS.css">
  	<link rel="stylesheet" type="text/css" href="../CSS/indexCSS.css">
    <style>
      #dashboard-form{
        max-width: 500px;
      }
      #dashboard-form-shell{
        margin-top: 220px;
      }
    </style>
    <title>Upload Image</title>
  </head>
  <body>
    <div id="dashboard-form-shell">
      <div class="card container" id="dashboard-form">
        <div class="card-body">
          <form method="post" action="../DASHBOARDPHP/processPicture.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-7">
                <div class="form-group">
                  <label for="profilePicture">Change Profile Picture</label>
                  <div class="row" id="profile-picture">
                    <div class="col-3">
                      <div class="profile-picture" style="background: url(<?php echo $varProfilePicture; ?>) no-repeat center;"></div>
                    </div>
                    <div class="col-6 text-center" style="margin-left:60px;"><br>
                      <input type="file" name="userProfilePicture">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <a class="btn btn-outline-dark text-center" onclick="window.location.href='../DASHBOARD/account.php'" id="changeBtn">Cancel</a>
              <button class="btn btn-outline-dark text-center" type="submit" name="saveChanges" role="button" id="saveChangesBtn">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
