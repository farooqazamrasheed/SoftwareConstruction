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
            <div class="col-lg-3" style="padding:0px !important">

               <?php include 'accordian.php';
               ?>

            </div>

            <?php
            $id = $_GET['id'];
            $sql2 = "SELECT * from subcategories where subcategoryid=$id";
            $result2 = mysqli_query($conn, $sql2);
            ?>
            <?php
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    ?>
                    

                    <div class="col-lg-9 greybg" style="padding:0px !important">

                        <form action='subcategoryupdateconn.php? id="<?php echo $row2['subcategoryid'] ?>"' method="POST"
                            style="margin-top:70px; padding:0px">
                            <div
                                style="background-color:#fbf7f4; padding-bottom:10px; width:70%; padding-top:20px; margin-top:-20px;">
                                <h6 style="color:grey; margin-left:70px">Update Sub-category<h6>
                            </div>
                            <div style="background-color:white; padding-bottom:10px; width:70%; padding-top:30px;">

                            <label>Select Category:</label>
                        <select name="categoryselected" id="category">
                            <?php
                            $sql = "SELECT * from categories";
                            $sql4 = "SELECT category_name,categoryid from categories where categoryid IN 
                            (SELECT category_id from 
                            subcategories where subcategoryid=$id)";
                            $result4 = mysqli_query($conn, $sql4);
                            $row4 = $result4->fetch_assoc();
                             ?>
                               <option value="<?php echo $row4['categoryid'] ?>" selected hidden><?php echo $row4['category_name'] ?></option>

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
                        <hr style="border:1px solid #eeeeee ">
                        <label>Sub-category Name:</label>
                        <input type="text" name="scname" value="<?php echo $row2['subcategory_name']?>">
                        
                                <hr>
                                
                                <?php
                               // echo $row4['categoryid'];
                } // end of outer while loop 
            }
            ?>
                        <input type="submit" name="submit" value="Update"
                            style="margin-top:10px; margin-left:300px;border:none; color:grey; background-color:#f6f6f6; width:20%;border-radius:2px; height:40px; padding 15px">


                        <br>
                    </div>
                    <br>
                </form>
            </div>
        </div>

</body>

</html>