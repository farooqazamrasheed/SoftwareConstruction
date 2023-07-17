<?php 

include 'database.php';
$data['dbname'] = $_POST['fname'];
$data['dbemail'] = $_POST['femail'];
$data['dbpass'] = $_POST['fpass'];
$data['dbroleid']=$_POST['roleselected'];


$sql = "INSERT INTO user (username,email,pass,user_role_id) VALUES('".$data['dbname']."' ,'".$data['dbemail']."' ,'".$data['dbpass']."','".$data['dbroleid']."')";


if(mysqli_query($conn, $sql)){
	echo "data stored in a database successfully.";
        } else{
            echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
        }

    
        header('Location:adduser.php');

?>