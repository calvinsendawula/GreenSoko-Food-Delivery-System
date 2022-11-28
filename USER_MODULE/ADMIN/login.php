<?php
  $varDate = GETDATE();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      for ($i=0; $i < 5; $i++) {
        ?>
        <br>
        <?php
      }
    ?>
    <!-- <h2>Today's date: <?php #print_r(getdate(timestamp)); ?></h2> -->
    <h2>This is a demo page for Admin Login. Log in below.</h2>
    <br>
    <a href="../FRONT/login.php">LOG IN</a>
  </body>
</html>
