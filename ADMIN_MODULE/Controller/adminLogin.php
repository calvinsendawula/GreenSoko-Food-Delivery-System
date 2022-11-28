
<?php
session_start();

if(isset($_POST['submitBtn'])){

    $adminID =$_POST['adminID'] ;
    $pass =trim($_POST['password']) ;
    $sql = "SELECT * FROM tbl_admin WHERE adminID='".$adminID."'";
    $db = mysqli_connect('localhost', 'root', '', 'green_soko');
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) >0) {

        $user = mysqli_fetch_assoc($result);
        $_SESSION['adminID'] = $user['adminID'];
        if( password_verify($pass, $user['password']) )
        {
        header("location: ../Interfaces/dashboard.php");
    }
        else {
            header("location: ../Interfaces/signin.php");
        }
    }
    header("location: ../Interfaces/dashboard.php");
}
?>
