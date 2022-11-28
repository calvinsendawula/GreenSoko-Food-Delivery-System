<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../CSS/style.css">
  <title>Sign In Page</title>

</head>
<body>
  <div class="signinFrm">
    <form action="../Controller/adminLogin.php" method="post" class="form">
        <img src="../images/logo.png"alt="Green Soko" style="width: 40%; margin-right: 180px;">
        <a href="../../index.php" style="position: absolute; margin-top:20px;">Home</a>
        <h1 class="title">Sign In</h1>

        <div class="inputContainer">
          <input type="text" name="adminID" class="input" placeholder="Enter your Admin ID" required>
          <label for="" class="label">Enter your Admin ID</label>
        </div>
<br>
        <div class="inputContainer">

          <input type="password" name="password"  id="myInput" class="input" placeholder="Enter your Password" required>

          <label for="" class="label">Enter your Password</label>


        </div>

      <input type="checkbox" onclick="myFunction()">Show Password
      <br>
<div class="button">

        <input type="submit" class="btn" name="submitBtn" value="Login">
</div>
      </form>
    </div>


<script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>

</body>
</html>
