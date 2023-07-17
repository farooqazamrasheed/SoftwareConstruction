<?php 

include 'database.php';
$data['dbcategory'] = $_POST['categoryselected'];
$data['dbscname'] = $_POST['scname'];



$sql = "INSERT INTO subcategories (category_id,subcategory_name) VALUES ('".$data['dbcategory']."' ,'".$data['dbscname']."')";


if(mysqli_query($conn, $sql)){
	echo "data stored in a database successfully.";
        } else{
            echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
        }

        header('Location:subcategorymanagement.php');
        //header('Location:.php');

?>