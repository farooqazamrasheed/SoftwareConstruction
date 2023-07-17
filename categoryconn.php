<?php 

include 'database.php';
$data['dbname'] = $_POST['cname'];
$data['dbdesc'] = $_POST['cdesc'];
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

$sql = "INSERT INTO categories (category_name,description,coverimg) VALUES ('".$data['dbname']."' ,'".$data['dbdesc']."','".$data['profile_pic']."')";


if(mysqli_query($conn, $sql)){
	echo "data stored in a database successfully.";
        } else{
            echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
        }

        header('Location:categorymanagement.php');
        //header('Location:.php');

?>