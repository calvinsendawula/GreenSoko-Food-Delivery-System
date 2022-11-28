<?php
// include ("app.php");
class DBConnection
{
    public function connect(){
      $db = mysqli_connect('localhost', 'root', '', 'green_soko');
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
	return $db;

    }
    function setData($sql) {
        $db = connect();
        if(mysqli_query($db, $sql)) {
            echo "Item inserted";
        }else {
            echo "Item not inserted";
        }
    }

}
