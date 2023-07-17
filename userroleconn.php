<?php
include 'database.php';
$data['dbuserrole'] = $_POST['myuserrole'];

$sql = "INSERT INTO user_role (userrole_name) VALUES('".$data['dbuserrole']."' )";





if(mysqli_query($conn, $sql)){
	echo "data stored in a database successfully.";
        } else{
            echo "ERROR: Data is not stored in Database $data.".mysqli_error($conn);
        }
        header('Location:userrolelist.php');
?>