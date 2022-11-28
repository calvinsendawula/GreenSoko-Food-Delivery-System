<?php
$db = mysqli_connect('localhost', 'root', '', 'green_soko');
session_start();
if(!isset($_SESSION['adminID'])) {
    echo '<script>
					alert("Kindly login");
					</script>';
    header("location: ../Interfaces/signin.php");

}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../CSS/dashboardstyle.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Customer Care Page</title>
  <style>
  table {
  font-family: arial, sans-serif;
  color: #4a4a4d;
   font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  width: 80%;
  border-collapse: separate;
border-spacing: 0;
margin-left: 120px;
box-shadow: 10px 10px 5px lightblue;

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.link{
  background-color: red;
}
button{
  background-color: #f2f2f2;
  color: black;
  padding: 10px 16px;
  margin: 2px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button:hover{
  background-color: #8AC800;
}


  </style>
</head>

<body>

<div class="sidebar">
    <div class="logo-details">

        <div class="logo_name">Green Soko</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="dashboard.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li>
            <a href="signup.php">
                <i class='bx bx-user' ></i>
                <span class="links_name">Add an Admin</span>
            </a>
            <span class="tooltip">Add an Admin</span>
        </li>
        <li>
            <a href="addrestaraunt.php">
                <i class="bx bx-store-alt"></i>
                <span class="links_name">Add a Restaraunt</span>
            </a>
            <span class="tooltip">Add a Restaraunt</span>
        </li>
        <li>
            <a href="../Interfaces/addlocation.php">
                <i class='bx bx-pin' ></i>
                <span class="links_name">Add a Location</span>
            </a>
            <span class="tooltip">Add a Location</span>
        </li>
        <li>
            <a href="../Interfaces/addfooditem.php">
                <i class='bx bx-restaurant' ></i>
                <span class="links_name">Add a Food Item</span>
            </a>
            <span class="tooltip">Add a Food Item</span>
        </li>
        <li>
            <a href="../Interfaces/customercare.php">
                <i class='bx bx-chat' ></i>
                <span class="links_name">Customer Care</span>
            </a>
            <span class="tooltip">Customer Care</span>
        </li>
        <li>
            <a href="../Controller/logout.php">
                <i class='bx bx-log-out' id="log_out" ></i>
                <span class="links_name">Log Out</span>
            </a>

            <a href="">
                <span class="tooltip">Log Out</span>
            </a>
        </li>
    </ul>


</div>
<br>
<h3 style="text-align:center;">Customer Care</h3>
<br>
<?php

$db = mysqli_connect('localhost', 'root', '', 'green_soko');
$results_per_page = 3;

// find out the number of results stored in database
$sql='SELECT * FROM tbl_user_feedback';
$result = mysqli_query($db, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page-1)*$results_per_page;

$result = mysqli_query($db, $sql);

$sql = "SELECT * FROM tbl_user_feedback LIMIT ". $this_page_first_result. ",". $results_per_page;

$result = mysqli_query($db, $sql);
echo "<br>";
?>
<form action="" method="post" name="form1">
<table>
  <tr>
    <th>Email</th>
     <th>Feedback</th>
        <th>Created At</th>

  </tr>
  <?php
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['message'] . "</td>";
    echo "<td>" . $row['createdAt'] . "</td>";

}
mysqli_free_result($result);

?>
</table>
</form>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
sidebar.classList.toggle("open");
menuBtnChange();
});

searchBtn.addEventListener("click", ()=>{
sidebar.classList.toggle("open");
menuBtnChange();
});


function menuBtnChange() {
if(sidebar.classList.contains("open")){
 closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
}else {
 closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
}
}
</script>
</body>
</html>
<style>
#link{
     display: inline-block;
     border: 1px solid black;
     border-radius: 5px;
     text-decoration: none;
     margin: 17px -110px 10px 120px;
     padding: 6px 12px;
     transition: all 100ns ease;
 }
 #link:hover{
background-color: #8AC800;;
cursor: pointer;
}

</style>

<?php

for ($page=1; $page<=$number_of_pages ; $page++) {
    echo "<a id='link' style=' color:black;text-decoration:none;' href='customercare.php?page=" . $page ."'>" . $page . " </a> ";
}
