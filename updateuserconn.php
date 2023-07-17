<?php
include 'database.php';

//echo ("Update successfully: ");
$id = $_GET['id'];
$data['dbname'] = $_POST['fname'];
$data['dbemail'] = $_POST['femail'];
$data['dbpass'] = $_POST['fpass'];
$data['dbroleid']=$_POST['roleselected'];
echo $_GET['id'];
$sql = "UPDATE user SET username='".$data['dbname']."' , email= '".$data['dbemail']."' ,
 pass= '".$data['dbpass']."',
 user_role_id= '".$data['dbroleid']."' where userid=$id;";

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
header('Location:adduser.php');
?>