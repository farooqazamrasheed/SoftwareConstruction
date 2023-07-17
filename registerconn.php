<?php 
$_SESSION = array();
session_destroy();
session_start();

include 'database.php';
$data['dbname'] = $_POST['Username'];
$data['dbfname'] = $_POST['fname'];
$data['dblname'] = $_POST['lname'];
$data['dbemail'] = $_POST['Email'];
$data['dbpass'] = $_POST['password'];
$data['dbphone'] = $_POST['phone'];
$data['dbroleid']=$_POST['roleselected'];


$sql = "INSERT INTO user (username,email,pass,user_role_id,fname,lname,phone) 
VALUES('".$data['dbname']."' ,'".$data['dbemail']."' ,'".$data['dbpass']."','".$data['dbroleid']."'
,'".$data['dbfname']."','".$data['dblname']."','".$data['dbphone']."')";


if(mysqli_query($conn, $sql)){
	echo "data stored in a database successfully.";
    $_SESSION['username'] = $data['dbname'];
    $_SESSION['email'] = $data['dbemail'];
    $_SESSION['role'] = $data['dbroleid'];
    $_SESSION['id'] = $data['userid'];
    $_SESSION["Password"] = $data['dbpass'];

    
    if ($_SESSION['role'] == "12") {
      echo "sad1"; header('location: home.php');
    } 
    else if ($_SESSION['role'] == "10") {
  //echo "sad"; echo $_SESSION['id'];
     header('location: adduser.php');
    } 
    else if($_SESSION['role'] == "11") {


      header('location: insertproduct.php');
    }
        } else{
            echo "ERROR: Data is not stored in Database.".mysqli_error($conn);
        }

    
       // header('Location:adduser.php');

?>