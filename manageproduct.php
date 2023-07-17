<?php session_start();?>
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
            width: 90% !important;
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
<?php 
            include 'database.php';
include 'accordian.php';


?>


            </div>

            <?php
            $sql = "SELECT * from categories";
            $result = mysqli_query($conn, $sql);
            ?>

            <div class="col-lg-9 greybg" style="padding:0px !important">
            <div
                        style="background-color:#fbf7f4; padding-bottom:10px; width:90%; padding-top:20px; margin-top:50px;">
                        <h6 style="color:grey; margin-left:70px">Sub-category<h6>
                    </div>
                    
                    <br>
                    <?php
                    include 'database.php';
                    $sellerid = $_SESSION['id'];
                    $sql2 = "SELECT * from products where seller_id=$sellerid";
                    $result2 = mysqli_query($conn, $sql2);

                    ?>
                      <div style="background-color:white; padding-bottom:0px; margin-bottom:0px;
                      width:90%; padding-top:0px; margin-top:-25px">

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
                        style=" margin-left: 700px; width:20%; margin-top:-20px">
                    </div>
                    <br>
    </div>
                    <table style="width:50%">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Sub-category</th>
                            <th>Company Name</th>
                            <th>Product Creation Date</th>
                            <th>Action</th>

                        </tr>
                        <?php
                        if ($result2->num_rows > 0) {
                            $sr_num = 1;
                            while ($row2 = $result2->fetch_assoc()) {

                                ?>
                                <tr>
                                    <td>
                                        <?php echo $sr_num; 
                                        $sr_num++;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['productname'] ?>
                                    </td>

                                    <td>
                                        <?php
                                        $check = $row2['category_id'];
                                        $sql3 = "SELECT category_name from categories where categoryid=$check";
                                        $result3 = mysqli_query($conn, $sql3);
                                        if ($result3->num_rows > 0) {
                                        
                                            while ($row3 = $result3->fetch_assoc()) {


                                                echo $row3['category_name'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                        $check2 = $row2['subcategory_id'];
                                        $sql4 = "SELECT subcategory_name from subcategories where subcategoryid=$check2";
                                        $result4 = mysqli_query($conn, $sql4);
                                        if ($result4->num_rows > 0) {
                                            
                                            while ($row4 = $result4->fetch_assoc()) {


                                                echo $row4['subcategory_name'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['productcompany'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['creationdate'] ?>
                                    </td>
                                    
                                    <td>
                                        <a href='productupdate.php? id="<?php echo $row2['productid'] ?>"'>
                                            <img src="data/update.png" width="15" height="15"></a>



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