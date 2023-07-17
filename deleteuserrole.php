<?php
include 'database.php';

$id=$_GET['id'];

$sql="DELETE from user_role where userrole_id=$id";


if($conn->query($sql)==true){
	echo "data stored in a database successfully.";
        } 
        else{
            echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
        }
        header('Location:userrolelist.php');

?>
