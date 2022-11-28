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
        <title>Orders Page</title>
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
                    <i class="bx bx-restaurant"></i>
                    <span class="links_name">Add a Restauraunt</span>
                </a>
                <span class="tooltip">Add a Restauraunt</span>
            </li>
            <li>
                <a href="addlocation.php">
                    <i class='bx bx-pin' ></i>
                    <span class="links_name">Add a Location</span>
                </a>
                <span class="tooltip">Add a Location</span>
            </li>
            <li>
                <a href="addfooditem.php">
                    <i class='bx bx-restaurant' ></i>
                    <span class="links_name">Add a Food Item</span>
                </a>
                <span class="tooltip">Add a Food Item</span>
            </li>
            <li>
                <a href="customercare.php">
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
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>

    <br>
    <h3 style="text-align:center;">User Order Items |
        <a id="admin" href="orders.php" style="text-align:center; color:#8AC800; text-decoration:none;">User Order</a>
    </h3>
    <br><br>
    <?php

    $results_per_page = 3;

    // find out the number of results stored in database
    $sql='SELECT * FROM tbl_user_order_item';
    $result = mysqli_query($db, $sql);
    $number_of_results = mysqli_num_rows($result);

    // determine number of total pages available
    $number_of_pages = ceil($number_of_results/$results_per_page);

    // determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    // determine the sql LIMIT starting number for the results on the displaying page
    $this_page_first_result = ($page-1)*$results_per_page;

    $result = mysqli_query($db, $sql);

    // retrieve selected results from database and display them on page
    $sql = "SELECT * FROM tbl_user_order_item LIMIT ". $this_page_first_result. ",". $results_per_page;

    $result = mysqli_query($db, $sql);
    ?>
    <form action="" method="post" name="form1">
        <table>
            <tr>
                <th>User Order ID</th>
                <th>User ID</th>
                <th>Restaurant Name</th>
                <th>Delivery Fee</th>
                <th>Order Total</th>
                <th>Created AT</th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['userOrderItemID'] . "</td>";
                echo "<td>" . $row['userOrderID'] . "</td>";
                echo "<td>" . $row['userID'] . "</td>";
                echo "<td>" . $row['itemOrderedName'] . "</td>";
                echo "<td>" . $row['itemOrderedQty'] . "</td>";
                echo "<td>" . $row['createdAt'] . "</td>";
                echo "</tr>";
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

<?php

for ($page=1; $page<=$number_of_pages ; $page++) {
    echo "<a id='link' style=' color:black;text-decoration:none;' href='orders.php?page=" . $page ."'>" . $page . " </a> ";

}
