<?php
// include('adminSignup.php');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'green_soko');

    include_once("DBConnection.php");
    $db = new DbConnection;
