<!DOCTYPE html>
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

<div  class="row" style="background-color:white;height:50px; margin-left: 40px; margin-top:10px;">
<div class="col-lg-10">
<h4>Shopping Portal | Admin</h4>
</div>
<div class="col-lg-2">
<a href="logout.php" style="text-decoration:none"><button class="btn btn-outline-primary" name="logoutbutton">Log out</button></a>
</div>
</div>
<div class="mycontainer">
<div class="row m-0 greybg">
    <div class="col-lg-3 greybg"  style="padding:0px !important">

    <div class="accordion accordion-flush" id="accordionFlushExample" style="margin-top:50px; width:70%; 
    margin-left:30px;">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button"style="background-color:#2d2b32; color:white;" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        User Management
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" style="color:white;"aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <a href="userrolelist.php" style="text-decoration:none;"><div class="accordion-body  m-0" 
      style="background-color:#2d2b32; color:white;" >Manage User Roles
      <hr style="margin-bottom:0px;padding:0px; width:100%"></div></a>
    
      <a href="adduser.php" style="text-decoration:none;"><div class="accordion-body" style="background-color:#2d2b32; color:white;" >Manage Users</div></a>
    </div>
  </div>
<br><br>
  <a href="categorymanagement.php" style="text-decoration:none;"><div class="accordion-body m-0" style="background-color:#2d2b32; color:white;" >
  Create Categories <hr style="margin-bottom:0px;padding:0px; width:100%"></div></a>
  <a href="subcategorymanagement.php" style="text-decoration:none;"><div class="accordion-body m-0 pt-0" style="background-color:#2d2b32; color:white;" >
  Subcateogries <hr style="padding:0px; width:100% !important; margin-bottom:0px;"></div></a>
  <a href="insertproduct.php" style="text-decoration:none;"><div class="accordion-body m-0 pt-0" style="background-color:#2d2b32; color:white;" >
  Insert Products <hr style="padding:0px; width:100% !important; margin-bottom:0px;"></div></a>
  <a href="productmanagement.php" style="text-decoration:none;"><div class="accordion-body m-0 pt-0" style="background-color:#2d2b32; color:white;" >
  Manage Products</div></a>

  
</div>


    </div>


    <div class="col-lg-9 greybg" style="padding:0px !important">
<form action="userroleconn.php" method="POST">
    <input type="text" placeholder="Add user role" name="myuserrole" ></input>
    <br><br><br>
     <input type="submit" name="submit" value="Submit" style="background-color:#fdaa49"></input>
    </form> 

    </div></div>
</body>
</html>