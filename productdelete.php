<?php
include 'database.php';

$id=$_GET['id'];
echo $id;
$sql="DELETE from products where productid=$id";


if($conn->query($sql)==true){
	echo "data stored in a database successfully.";
        } 
        else{
            echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
        }
   //     header('Location:manageproduct.php');

?>
