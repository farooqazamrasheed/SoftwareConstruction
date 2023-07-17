<?php session_start(); ?>
<!DOCTYPE html>
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

    body {
      height: 1000px;
      background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

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
      background-color: #F8F4EA;
    }

    .mycontainer {
      background-color: #F8F4EA;
      height: 100vh;
    }

    .fa-sign-out {
      color: black;
      margin-left: 10px;
      margin-right: 10px;
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

  <div class="mycontainer">
    <div class="row m-0">
      <div class="col-lg-3 greybg" style="padding:0px !important">
      <?php include 'accordian.php'?>
      </div>


      <div class="col-lg-9 greybg" style="padding:0px !important">
        <form action="userroleconn.php" method="POST">
          <br><br><br>
          <div style="background-color:#fbf7f4; padding-bottom:10px; width:70%; padding-top:20px; margin-top:-20px;">
            <h6 style="color:grey; margin-left:70px">User Role<h6>
          </div>
          <div style="background-color:white; padding-bottom:10px; width:70%; padding-top:30px;">
            <label>Enter User Role:</label>
            <input type="text" name="myuserrole"></input>
            <hr>

            <input type="submit" name="submit" value="Submit" style="margin-top:10px; margin-left:300px;border:none; color:grey; 
  background-color:#f6f6f6; width:20%;border-radius:2px; height:40px; padding 15px">
          </div>
        </form>

        <div style="background-color:#fbf7f4; padding:20px; width:70%; margin-top:30px;">
          <h6 style="color:grey; margin-left:70px">User Role List<h6>
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
            <th>ID</th>
            <th>ROLE</th>
            <th>Action</th>

          </tr>
          <?php
          if ($result->num_rows > 0) {
            $sr_num = 1;
            while ($row = $result->fetch_assoc()) {

              ?>
              <tr>
                <td>
                  <?php echo $row['userrole_id'] ?>
                </td>
                <td>
                  <?php echo $row['userrole_name'] ?>
                </td>
                <td><a href='deleteuserrole.php? id="<?php echo $row['userrole_id'] ?>"'>
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
      </div>
    </div>
  </div>
</body>

</html>