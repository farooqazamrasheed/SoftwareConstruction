<?php
session_start();

include 'database.php';
$data['dbname'] = $_POST['fname'];
$data['dbemail'] = $_POST['email'];
$data['dbsubject'] = $_POST['subject'];
$data['dbmsg']=$_POST['message'];
$data['dbid'] = $_SESSION['id'];

$sql = "INSERT INTO contactus (name,email,subject,message,userid) 
VALUES('".$data['dbname']."' ,'".$data['dbemail']."' ,'".$data['dbsubject']."','".$data['dbmsg']."'
,'".$data['dbid']."')";
echo $sql;


if(mysqli_query($conn, $sql)){
	echo "data stored in a database successfully.";
        } else{
            echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
        }

    
      header('Location:contactus.php');

?>