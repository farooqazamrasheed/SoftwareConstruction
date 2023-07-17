<?php
include 'database.php';

//echo ("Update successfully: ");
$id = $_GET['id'];
echo $_GET['id'];

$data['dbcategoryid'] = $_POST['categoryselected'];
$data['dbsubcategoryid'] = $_POST['subcategoryselected'];
$data['dbproductname'] = $_POST['pname'];
$data['dbproductcompany'] = $_POST['pcompany'];
$data['dbstartingprice'] = $_POST['startingprice'];
$data['dbproductdescription'] = $_POST['pdescp'];
$data['dbavailability'] = $_POST['pavailability'];
$data['dbenddate'] = $_POST['enddate'];
$data['prod_img'] = $_POST['files'];
$data['prod_img1'] = $_POST['files1'];
$data['prod_img2'] = $_POST['files2'];
$data['seller_id'] = $_SESSION['id'];


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


if ($_FILES['files1']['error'] > 0) {

} else {
    if ((($_FILES["files1"]["type"] == "image/gif") || ($_FILES["files1"]["type"] == "image/jpeg") || ($_FILES["files1"]["type"] == "image/jpg") || ($_FILES["files1"]["type"] == "image/pjpeg") || ($_FILES["files1"]["type"] == "image/x-png") || ($_FILES["files1"]["type"] == "image/png"))) {

        if ($_FILES["files1"]["size"] <= 1024 * 1024 * 5) {
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

            $uploadfile = $uploaddir . '/' . $number . basename($_FILES['files1']['name']);

            if (move_uploaded_file($_FILES['files1']['tmp_name'], $uploadfile)) {
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

if ($_FILES['files2']['error'] > 0) {

} else {
    if ((($_FILES["files2"]["type"] == "image/gif") || ($_FILES["files2"]["type"] == "image/jpeg") || ($_FILES["files2"]["type"] == "image/jpg") || ($_FILES["files2"]["type"] == "image/pjpeg") || ($_FILES["files2"]["type"] == "image/x-png") || ($_FILES["files2"]["type"] == "image/png"))) {

        if ($_FILES["files2"]["size"] <= 1024 * 1024 * 5) {
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

            $uploadfile = $uploaddir . '/' . $number . basename($_FILES['files2']['name']);

            if (move_uploaded_file($_FILES['files2']['tmp_name'], $uploadfile)) {
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

// echo ($uploadfile);
// print($uploadfile);
// print $uploadfile;
// print_r($uploadfile);
// exit();
$data['profile_pic'] = $uploadfile;
$data['profile_pic1'] = $uploadfile;
$data['profile_pic2'] = $uploadfile;




$sql = "UPDATE products SET  category_id='".$data['dbcategoryid']."' , subcategory_id= '".$data['dbsubcategoryid']."' ,
productname= '".$data['dbproductname']."' ,productcompany= '".$data['dbproductcompany']."' 
,seller_id= '".$data['seller_id']."' , startingprice= '".$data['dbstartingprice']."' ,
productdescription= '".$data['dbproductdescription']."' ,enddate= '".$data['dbenddate']."' ,
feauture= '".$data['dbavailability']."', img1= '".$data['profile_pic']."' ,img2= '".$data['profile_pic1']."' , img3= '".$data['profile_pic2']."' 
where productid=$id";
	




 echo $sql;
 $conn->query($sql);
   
 if(mysqli_query($conn,$sql)){
    echo ("Update successfully: ");
}
else{
    echo ("Update failed");
}

?>
// exit();
//header('Location:subcategorymanagement.php');
