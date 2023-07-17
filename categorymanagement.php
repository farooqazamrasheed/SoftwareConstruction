<?php session_start(); ?>
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
            background-color: #eeeeee;
        }

        .mycontainer {
            background-color: #eeeeee;
            height: 100vh;
        }

        .row {
            background-color: #eeeeee;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>
    <div class="row m-0">
        <div class="col-lg-3 greybg" style="padding:0px !important">
            <?php include "database.php";
            include 'accordian.php';
            ?>


        </div>


        <div class="col-lg-9 greybg" style="padding:0px !important">
            <form action="categoryconn.php" method="POST" style="margin-top:70px; padding:0px"
                enctype="multipart/form-data">
                <div
                    style="background-color:#fbf7f4; padding-bottom:10px; width:70%; padding-top:20px; margin-top:-20px;">
                    <h6 style="color:grey; margin-left:70px">Category<h6>
                </div>
                <div style="background-color:white; padding-bottom:10px; width:70%; padding-top:30px;">
                    <label>Category Name:</label>
                    <input type="text" name="cname" value="">
                    <hr style="border:1px solid #eeeeee ">
                    <label>Enter Description:</label>
                    <input type="text" name="cdesc" value="">
                    <hr style="border:1px solid #eeeeee ">
                    <label>Cover Image:</label>
                    <input type="file" id="myfile" name="files">

                    <hr>
                    <input type="submit" name="submit" value="Create"
                        style="margin-top:10px; margin-left:300px;border:none; color:grey; background-color:#f6f6f6; width:20%;border-radius:2px; height:40px; padding 15px">


                    <br>
                </div>
                <br>
                <?php
                $sql2 = "SELECT * from categories";
                $result2 = mysqli_query($conn, $sql2);
                ?>
                <div style="background-color:#fbf7f4; padding:20px; width:70%; margin-top:30px;">
                    <h6 style="color:grey; margin-left:70px">Category List<h6>
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
                        <th>Action</th>

                    </tr>
                    <?php
                    if ($result2->num_rows > 0) {

                        while ($row2 = $result2->fetch_assoc()) {

                            ?>
                            <tr>
                                <td>
                                    <?php echo $row2['categoryid'] ?>
                                </td>
                                <td>
                                    <?php echo $row2['category_name'] ?>
                                </td>
                                <td>
                                    <?php echo $row2['description'] ?>
                                </td>
                                <td>
                                    <?php echo $row2['creationdate'] ?>
                                </td>
                                <td>
                                    <?php echo $row2['lastupdated'] ?>
                                </td>
                                <td>
                                    <a href='categoryupdate.php? id="<?php echo $row2['categoryid'] ?>"'>
                                        <img src="data/update.png" width="15" height="15"></a>

                                    <a href='categorydelete.php? id="<?php echo $row2['categoryid'] ?>"'>
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
                <div class="error" style="color:Red;">
                    <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).ready(function () {
            $("#showEntries").on("change", function () {
                var value = $(this).val();
                $("table tbody tr").hide();
                $("table tbody tr").slice(0, value).show();
            });
        });


    </script>

</body>

</html>