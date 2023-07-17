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
            margin-left: 150px;
            display: inline-block;
            width: 180px;
            margin-top: 0px;
        }

        option,
        select,
        input {
            padding: 0px !important;
            margin: 0px;
            width: 40%;

        }

        .greybg {
            background-color: #F8F4EA;
        }

        .mycontainer {
            background-color: #F8F4EA;
            height: 100vh;
        }

        .row {
            background-color: #F8F4EA;
        }

        body {
            height: 1000px;
            background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>
    <?php session_start(); ?>

    <div class="mycontainer">
        <div class="row m-0">
            <div class="col-lg-3 greybg" style="padding:0px !important">
                <?php
                include 'database.php';
                include 'accordian.php';
                ?>
            </div>


            <?php

            include 'database.php';
            $sql = "SELECT * from categories";
            $result = mysqli_query($conn, $sql);
            ?>

            <div class="col-lg-9 greybg" style="padding:0px !important">
                <form action="#" method="POST" style="margin-top:70px; padding:0px">
                    <div
                        style="background-color:#fbf7f4 ; padding-bottom:10px; width:90%; padding-top:20px; margin-top:-20px;">
                        <h6 style="color:grey; margin-left:70px">Insert Product<h6>
                    </div>
                    <div style="background-color:white; padding-bottom:10px; width:90%; padding-top:30px;">
                        <label>Category:</label>
                        <select name="categoryselected" id="category" onchange="localStorage.setItem('categorySelected', this.value);
                         this.form.submit();">
                            <option selected disabled hidden>Select Category</option>
                            <?php
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {

                                    ?>
                                    <option value=<?php echo $row['categoryid'] ?>><?php echo $row['category_name'] ?> </option>


                                    <?php
                                }
                            }
                            ?>
                        </select>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $Ch = $_POST['categoryselected'];
                    $sql = "select * from subcategories where category_id=$Ch";
                    $result2 = $conn->query($sql);


                } ?>
                <form action="insertproductconn.php" method="POST" enctype="multipart/form-data">

                    <hr style="border:1px solid #eeeeee ">
                    <label>Sub-category:</label>
                    <select name="subcategoryselected" id="subcategory">
                        <?php
                        if ($result2->num_rows > 0) {

                            while ($row = $result2->fetch_assoc()) {
                                // echo $row['id']. ',';
                                ?>
                                <!-- <tr>
                                                        <td><?php echo $row['name'] ?></td>
                                                    </tr> -->

                                <option value=<?php echo $row['subcategoryid'] ?>><?php echo $row['subcategory_name'] ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                    <input type="hidden" name="categoryselected" value="<?php echo $Ch ?>">
                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Name:</label>
                    <input type="text" name="pname" value="">

                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Company:</label>
                    <input type="text" name="pcompany" value="">

                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Starting Price:</label>
                    <input type="text" name="startingprice" value="">



                    <hr style="border:1px solid #eeeeee ">
                    <label style="margin-top:0px !important;">Product Description:</label>
                    <textarea name="pdescp" rows="6" cols="52"></textarea>


                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Visibility :</label>
                    <select name="pavailability">
                        <option value="none" selected disabled hidden>Select an Option</option>
                        <option value="1">Feature</option>
                        <option value="2">Dont Feature</option>
                    </select>

                    <hr style="border:1px solid #eeeeee ">
                    <label>End date:</label>
                    <input type="date" name="enddate" value="">

                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Image1:</label>
                    <input type="file" id="myfile" name="files">


                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Image2:</label>
                    <input type="file" id="myfile" name="files1">


                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Image3:</label>
                    <input type="file" id="myfile" name="files2">

                    <hr>

                    <input type="submit" name="submit" value="Insert"
                        style="margin-top:10px; margin-left:300px;border:none; color:grey; background-color:#f6f6f6; width:20%;border-radius:2px; height:40px; padding 15px">


                    <br>
            </div>
            <br>

            </form>
        </div>
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

        var selectedCategory = localStorage.getItem("categorySelected");
        if (selectedCategory) {
            document.getElementById("category").value = selectedCategory;
        }


    </script>

</body>

</html>