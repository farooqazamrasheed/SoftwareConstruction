<?php
include 'database.php';

$_SESSION = array();
session_destroy();
session_start();


$username = $_POST['username'];
$password = $_POST['password'];
// $role=$_POST['roleselected'];

$checkrole = "SELECT * FROM user where username='$username'";
echo $checkrole;
$result = mysqli_query($conn, $checkrole);
//$checkk = "SELECT * FROM user where username=$username and pass=$password";
//echo $checkk;

if ($result === false) {
  echo "handle query error";
} else {
  $num_rows = mysqli_num_rows($result);

}
//$num_rows = mysqli_num_rows($result);
    if ($num_rows==1) {
      $user = mysqli_fetch_assoc($result);
      echo $user['pass'];
      if ($password == $user['pass']) {
  
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['user_role_id'];
        $_SESSION['id'] = $user['userid'];
        $_SESSION["Password"] = $user['pass'];

        
        if ($_SESSION['role'] == "12") {
          echo "sad1";
           header('location: home.php');
        } 
        else if ($_SESSION['role'] == "10") {
      //echo "sad"; echo $_SESSION['id'];
         header('location: adduser.php');
        } 
        else if($_SESSION['role'] == "11") {
    

          header('location: insertproduct.php');
        }
      } else {
        $error = "Incorrect password";
        echo $error;
       header("Location: login.php?error=" . $error);
      }
    } 
    else {
      $error = "Incorrect username";
      echo $error;
     header("Location: login.php?error=" . $error);

    }


?>