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
    </style>
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

    ?>

        <div class="row m-0 ">
            <div class="col-lg-3 " style="padding:0px !important">
<?php include 'accordian.php'; ?>

            </div>


            <?php
            $id = $_GET['id'];
            $sql1 = "SELECT * from products where productid=$id";
            $result1 = mysqli_query($conn, $sql1);
            ?>

            <div class="col-lg-9 greybg" style="padding:0px !important">
                <form action="#" method="POST" style="margin-top:70px; padding:0px">
                    <div
                        style="background-color:#fbf7f4; padding-bottom:10px; width:90%; padding-top:20px; margin-top:-20px;">
                        <h6 style="color:grey; margin-left:70px">Update Products<h6>
                    </div>
                    <div style="background-color:white; padding-bottom:10px; width:90%; padding-top:30px;">
                        <label>Category:</label>
                        <select name="categoryselected" id="category" onchange="localStorage.setItem('categorySelected', this.value);
                         this.form.submit();">
                                                        <?php
                            $sql = "SELECT * from categories";
                            $sql4 = "SELECT category_name,categoryid from categories where categoryid IN 
                            (SELECT category_id from 
                            products where productid=$id)";
                            $result4 = mysqli_query($conn, $sql4);
                            $row4 = $result4->fetch_assoc();
                             ?>
                               <option selected disabled hidden><?php echo $row4['category_name'] ?></option>

                            <?php
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {

                                    ?>

                                    <option value=<?php echo $row['categoryid'] ?>><?php echo $row['category_name'] ?> </option>

                                    
                                <?php }
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
                 <?php
            if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) {
                    ?>
                <form action='productupdateconn.php?id="<?php echo $row1['productid']?>"' method="POST" enctype="multipart/form-data">

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
                    <input type="text" name="pname" value="<?php echo $row1['productname']?>">

                 
                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Company:</label>
                    <input type="text" name="pcompany" value="<?php echo $row1['productcompany']?>">

                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Starting Price:</label>
                    <input type="text" name="startingprice" value="<?php echo $row1['startingprice']?>">



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
                    <input type="date" name="enddate" value="<?php echo $row1['enddate']?>">



                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Image1:</label>
                    <input type="file" id="myfile" name="files" value="<?php echo $row1['img1']?>">


                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Image2:</label>
                    <input type="file" id="myfile" name="files1">


                    <hr style="border:1px solid #eeeeee ">
                    <label>Product Image3:</label>
                    <input type="file" id="myfile" name="files2">
                    <?php
                    // echo $row1['productid'];
                         //       echo $row4['categoryid'];
                } // end of outer while loop 
            }?>
                    <hr>
                    <input type="submit" name="submit" value="Insert"
                        style="margin-top:10px; margin-left:300px;border:none; color:grey; background-color:#f6f6f6; width:20%;border-radius:2px; height:40px; padding 15px">


                    <br>
            </div>
            <br>

            </form>
        </div>
    </div>
    <script>

    /*    $(document).ready(function () {
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
        */
   var selectedCategory = localStorage.getItem("categorySelected");
   console.log(selectedCategory);

    if (selectedCategory) {
        document.getElementById("category").value = selectedCategory;
    }
    document.getElementById("category").addEventListener("change", function() {
        localStorage.setItem('categorySelected', this.value);
    });
    console.log(this.value);



    </script>

</body>

</html>