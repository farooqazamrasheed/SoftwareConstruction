<?php
//$pak = "Pakistan";
//echo $pak;
$servername = "localhost";
$username = "root";
$password = "";
$my_db = "project";
$conn = mysqli_connect($servername, $username, $password, $my_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    
}

?>