<?php
include 'database.php';

$id=$_GET['id'];
echo $id;

$subcat_check = "SELECT COUNT(*) as count FROM products WHERE subcategory_id = $id";
$result = mysqli_query($conn, $subcat_check);
$count = mysqli_fetch_assoc($result)['count'];

if($count > 0){
    $error = "This subcategory cannot be deleted as it has associated products.";
    header("Location: subcategorymanagement.php?error=" . $error);
     
    
} else {
    $sql="DELETE from subcategories where subcategoryid=$id";
    if($conn->query($sql)==true){
        echo "data delete successfully.";
    } 
    else{
        echo "ERROR".mysqli_error($conn);
    }
    header('Location:subcategorymanagement.php');
}


?>
