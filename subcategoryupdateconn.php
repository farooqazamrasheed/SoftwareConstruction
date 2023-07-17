<?php
include 'database.php';

//echo ("Update successfully: ");
$id = $_GET['id'];
$data['dbname'] = $_POST['scname'];
$data['dbid'] = $_POST['categoryselected'];

echo $_POST['categoryselected'];

date_default_timezone_set('UTC');
$current_date = date("Y-m-d H:i:s");

$sql = "UPDATE subcategories SET subcategory_name='".$data['dbname']."' , category_id= '".$data['dbid']."' ,
lastupdated	= '".$current_date."' where subcategoryid=$id;";

echo $data['dbname'];

 echo $sql;
// $conn->query($sql);
// if (mysqli_query($conn,$sql)) {
    if(mysqli_query($conn,$sql)){
    echo ("Update successfully: ");
}
else{
    echo ("Update failed");
}
// exit();
header('Location:subcategorymanagement.php');
?>