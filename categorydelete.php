<?php
include 'database.php';

$id=$_GET['id'];
echo $id;

$subcat_check = "SELECT COUNT(*) as count FROM subcategories WHERE category_id = $id";
$result = mysqli_query($conn, $subcat_check);
$count = mysqli_fetch_assoc($result)['count'];

if($count > 0){
    $error = "This category cannot be deleted as it has associated subcategories.";
    header("Location: categorymanagement.php?error=" . $error);
     
    
} else {
    $sql="DELETE from categories where categoryid=$id";
    if($conn->query($sql)==true){
        echo "data stored in a database successfully.";
    } 
    else{
        echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
    }
    header('Location:categorymanagement.php');
}


?>
