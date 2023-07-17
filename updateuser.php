<?php session_start();
?>
<html>
<head>
<style>
        table, th, td{
            text-align:center;
            border:1px solid #eeeeee !important;
            background-color:white;
            padding:7px;
           
        }
        th{
          background-color:#f6f6f6;
        }
        hr{

          border:3px !important;
          background-color:#ebebeb !important;
          color:#ebebeb !important;
          margin-left:auto !important;
          width:95%;
          margin-right:auto !important;
        }
        table{
            padding:5px !important;
            width:70% !important;
        }
        label{
            margin-left: 200px;
            display:inline-block;
            width:180px;
            margin-top:0px;
        }
        input{
            padding:0px !important;
            margin:0px;
            
        }
        .greybg{
            background-color:#eeeeee;
        }
        .mycontainer{ background-color:#eeeeee;
        height:100vh;
        }
        
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
<?php
include 'database.php';
$sql="SELECT * from user_role";
$result=mysqli_query($conn, $sql);

?>

<div class="row m-0 greybg">
    <div class="col-lg-3 greybg"  style="padding:0px !important">
    <?php include 'accordian.php'?>
   
    </div>

<?php 
$id=$_GET['id'];
$sql2="SELECT * from user where userid=$id";
$result2=mysqli_query($conn,$sql2);
?>
<?php 
if($result2->num_rows > 0){
    while($row1 = $result2->fetch_assoc()) 
    {
?>

<div class="col-lg-9 greybg" style="padding:0px !important">

<form action='updateuserconn.php? id="<?php echo $row1['userid'] ?>"' method="POST" style="margin-top:70px; padding:0px">
<div style="background-color:#fbf7f4; padding-bottom:10px; width:70%; padding-top:20px; margin-top:-20px;">
<h6 style="color:grey; margin-left:70px">Update User<h6>
</div>
<div style="background-color:white; padding-bottom:10px; width:70%; padding-top:30px;">
<label>Enter username:</label>
  <input type="text"  name="fname" value="<?php echo $row1['username']?>" ><hr style="border:1px solid #eeeeee ">
  <label>Enter email:</label>
  <input type="email" name="femail" value="<?php echo $row1['email']?>"><hr>
  <label>Select User Role:</label>
  <select name="roleselected" id="userrole">
    <?php
    if ($result->num_rows > 0) {
        
        // nested while loop
        while ($row2 = $result->fetch_assoc()) {
            
            ?>
    <option value=<?php echo $row2['userrole_id'] ?>><?php echo $row2['userrole_name'] ?></option>
 
       
       <?php
        } // end of nested while loop
    }
    ?>
    </select>

 <hr>
 

  <label>Enter Password:</label>
  <input type="password" name="fpass" value="<?php echo $row1['pass'] ?>"><hr>
  <?php
        } // end of outer while loop
    }
    ?>
  <input type="submit" name="submit" value="Submit" style="margin-top:10px; margin-left:300px;border:none; color:grey; 
  background-color:#f6f6f6; width:20%;border-radius:2px; height:40px; padding 15px">



  <br><br><br>
  </div>
    <br>
</form> 
</div></div>

</body>
</html>

