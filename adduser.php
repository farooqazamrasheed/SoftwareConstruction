<?php session_start() ?>
<html>

<head>
  <style>
    table,
    th,
    td {
      text-align: center;
      border: 1px solid #eeeeee !important;
      background-color: white;
      padding: 7px;

    }

    th {
      background-color: #f6f6f6;
    }

    hr {

      border: 3px !important;
      background-color: #ebebeb !important;
      color: #ebebeb !important;
      margin-left: auto !important;
      width: 95%;
      margin-right: auto !important;
    }

    table {
      padding: 5px !important;
      width: 70% !important;
    }

    label {
      margin-left: 200px;
      display: inline-block;
      width: 180px;
      margin-top: 0px;
    }

    input {
      padding: 0px !important;
      margin: 0px;

    }

    .greybg {
      background-color: #fbf7f4	;
    }

    .row {
      background-color: red	;
    }
    .hr{ 
    border: none; 
    border-bottom: 1px solid gainsboro;  
   }
   .fa-sign-out{
    color:black;
    margin-left: 10px;
    margin-right:10px;
   }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include 'database.php';
  $sql = "SELECT * from user_role";
  $result = mysqli_query($conn, $sql);

  ?>
  <!--<div class="row" style="background-color:white;height:50px; margin-left: 40px; margin-top:10px;">
    <div class="col-lg-10">
      <h4>Shopping Portal | Admin</h4>
    </div>
    <div class="col-lg-2">
      <a href="logout.php" style="text-decoration:none"><button class="btn btn-outline-primary" name="logoutbutton">Log
          out</button></a>
    </div>
  </div>-->
  <div class="row m-0">
    <div class="col-lg-3 greybg" style="padding:0px !important">
    <?php include 'accordian.php'?>

    </div>


    <div class="col-lg-9 greybg" style="padding:0px !important">
      <form action="adduserconn.php" method="POST" style="margin-top:70px; padding:0px">
        <div style="background-color:#ccc1be; padding-bottom:10px; width:70%; padding-top:20px; margin-top:-20px;">
          <h6 style="color:grey; margin-left:70px">Add User<h6>
        </div>
        <div style="background-color:white; padding-bottom:10px; width:70%; padding-top:30px;">
          <label>Enter username:</label>
          <input type="text" name="fname" value="">
          <hr style="border:1px solid #eeeeee ">
          <label>Enter email:</label>
          <input type="email" name="femail" value="">
          <hr>
          <label>Select User Role:</label>
          <select name="roleselected" id="userrole">
            <?php
            if ($result->num_rows > 0) {

              while ($row = $result->fetch_assoc()) {

                ?>
                <option value=<?php echo $row['userrole_id'] ?>><?php echo $row['userrole_name'] ?></option>


                <?php
              }
            }
            ?>
          </select>
          <hr>


          <label>Enter username:</label>
          <input type="password" name="fpass" value="">
          <hr>
          <input type="submit" name="submit" value="Submit"
            style="margin-top:10px; margin-left:300px;border:none; color:grey; background-color:#f6f6f6; width:20%;border-radius:2px; height:40px; padding 15px">


          <br><br><br>
        </div>
        <br>
        <?php

        $sql2 = "SELECT * from user";
        $result2 = mysqli_query($conn, $sql2);

        ?>


        <div style="background-color:#ccc1be; padding:20px; width:70%; margin-top:30px;">
          <h6 style="color:grey; margin-left:70px">User List<h6>
        </div>

        <div style="background-color:white; padding-bottom:0px; height:60px; margin-bottom:0px;
                      width:70%; padding-top:0px; margin-top:-25px">

          <label style="margin-left:15px; margin-top:20px">Show
            <select id="showEntries">
              <option value="2">2</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
            entries
          </label>

          <div class="form-group">
            <input type="text" class="form-control" id="search" placeholder="Search here"
              style=" margin-left: 600px; width:20%; margin-top:-20px">
          </div>
          <br>
        </div>
        <table style="width:50%">
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Email Id</th>
            <th>User Role Id</th>
            <th>Action</th>

          </tr>
          <?php
          if ($result2->num_rows > 0) {
            $sr_num = 1;
            while ($row = $result2->fetch_assoc()) {

              ?>
              <tr>
                <td>
                  <?php echo $row['userid'] ?>
                </td>
                <td>
                  <?php echo $row['username'] ?>
                </td>
                <td>
                  <?php echo $row['email'] ?>
                </td>
                <td>
                  <?php echo $row['user_role_id'] ?>
                </td>
                <td>
                  <a href='updateuser.php? id="<?php echo $row['userid'] ?>"'>
                    <img src="data/update.png" width="15" height="15"></a>

                  <a href='deleteuser.php? id="<?php echo $row['userid'] ?>"'>
                    <img src="data/delete.png" width="15" height="15"></a>


                </td>

                <!--  <td><a href="edit_user.php? id=<?php echo $row['id'] ?>">Edit </a></td>
                        <td><a href="delete_user.php? id=<?php echo $row['id'] ?>">Delete</td> -->
              </tr>

              <?php
            }
          }
          ?>
        </table>
      </form>
    </div>
  </div>


</body>

</html>