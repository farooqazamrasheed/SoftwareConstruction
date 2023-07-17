<?php
include 'database.php';

//echo ("Update successfully: ");
$id = $_GET['id'];
$data['dbname'] = $_POST['cname'];
$data['dbemail'] = $_POST['cdesc'];
$data['prod_img2'] = $_POST['files'];

if ($_FILES['files']['error'] > 0) {

} else {
    if ((($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/jpg") || ($_FILES["files"]["type"] == "image/pjpeg") || ($_FILES["files"]["type"] == "image/x-png") || ($_FILES["files"]["type"] == "image/png"))) {

        if ($_FILES["files"]["size"] <= 1024 * 1024 * 5) {
            $uploaddir = 'uploads';
            if (!is_dir($uploaddir)) {

                mkdir($uploaddir, 0777);
            }

            $uploaddir = 'uploads' . '/' . 'ProductsImages';
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777);
            }
            // $uploaddir = 'uploads' . '/' . 'users' . '/' . 'profile_pics';
            // if (!is_dir($uploaddir)) {
            //     mkdir($uploaddir, 0777);
            // }
            $number = rand(0, 99999999999999);

            $uploadfile = $uploaddir . '/' . $number . basename($_FILES['files']['name']);

            if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
                // echo "$uploadfile";
                //  $data['profile_pic']=$uploadfile;
            } else {
                echo "some error try again later";
            }
        } else {
            echo "Size is big";
        }
    } else {
        echo "Formate is not supported";
    }
}

$data['profile_pic'] = $uploadfile;
date_default_timezone_set('UTC');
$current_date = date("Y-m-d H:i:s");

$sql = "UPDATE categories SET category_name='".$data['dbname']."' , description= '".$data['dbemail']."' ,
lastupdated	= '".$current_date."', coverimg='".$data['profile_pic']."' where categoryid=$id;";

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
header('Location:categorymanagement.php');
?>