<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            padding: 0px;
        }

        .mybutton {
            padding: 10px;
            font-size: 20px;
            color: black;
            background-color: white;
            border: none;
            font-weight: bold;
            margin-left: 70px;
        }

        img {
            height: 300px;
            width: 100%;
        }

        div [class^="col-"] {
            padding-left: 5px;
            padding-right: 5px;
        }

        .card {
            transition: 0.5s;
            cursor: pointer;
        }

        .card-title {
            font-size: 15px;
            transition: 1s;
            cursor: pointer;
        }

        .card-title i {
            font-size: 15px;
            transition: 1s;
            cursor: pointer;
            color: #ffa710
        }

        .card-title i:hover {
            transform: scale(1.25) rotate(100deg);
            color: #18d4ca;

        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
        }

        .card-text {
            height: 40px;
        }

        a {
            text-decoration: none;
            color: black !important;
        }

        body {
            height: 1000px;
            background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

        }

        .card::before,
        .card::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            transform: scale3d(0, 0, 1);
            transition: transform .3s ease-out 0s;
            background: rgba(255, 255, 255, 0.1);
            content: '';
            pointer-events: none;
        }

        .card::before {
            transform-origin: left top;
        }

        .card::after {
            transform-origin: right bottom;
        }

        .card:hover::before,
        .card:hover::after,
        .card:focus::before,
        .card:focus::after {
            transform: scale3d(1, 1, 1);
        }


        div {
            font-family: 'Jost', sans-serif;

        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Orbitron:wght@900&family=Teko&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</head>

<body>

    <?php
    session_start();
    include 'header.php';
    include 'database.php';
    $sql = "SELECT * from categories";
    $result = mysqli_query($conn, $sql);

?>

    
    <div class="row m-0">
        <div class="col-lg-3">
            <?php
            $sql2 = "SELECT * from categories";
            $result2 = mysqli_query($conn, $sql2);

            ?>
            <div class="accordion accordion-flush" id="accordionFlushExample"
                style="margin-top:10px; width:70%; margin-left:30px;">
                <h4 style="margin-left:10px">SHOP BY</h4>
                <div class="accordion-item">


                    <a href="#" style="text-decoration:none;">
                        <div class="accordion-body m-0" style="background-color:#eeeeee; color:black;">
                            Categories
                        </div>
                    </a>
                    <div class="accordion-item">
                        <?php
                        $i = 1;
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                ?>
                                <h2 class="accordion-header" id="flush-heading<?php echo $i; ?>">
                                    <button class="accordion-button collapsed" type="button"
                                        style="background-color:#F8F4EA; color:black;" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false"
                                        aria-controls="flush-collapse<?php echo $i; ?>">
                                        <?php echo $row['category_name'] ?>
                                    </button>
                                </h2>
                                <?php
                                $catid = $row['categoryid'];
                                $subsql = "SELECT * from subcategories where category_id=$catid";
                                $subresult = mysqli_query($conn, $subsql);
                                if ($subresult->num_rows > 0) {
                                    while ($subrow = $subresult->fetch_assoc()) {
                                        ?>
                                        <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse"
                                            style="color:white;" aria-labelledby="flush-heading<?php echo $i; ?>"
                                            data-bs-parent="#accordionFlushExample">
                                            <a href="categorypageuser.php?subcatid=
                                                                                  <?php echo $subrow['subcategoryid'] ?>&catid=<?php echo $row['categoryid'] ?>"
                                                style="text-decoration:none;">
                                                <div class="accordion-body  m-0" style="background-color:#eeeeee; color:black;">
                                                    <?php echo $subrow['subcategory_name'] ?>


                                                </div>

                                            </a>

                                        </div>

                                    <?php }
                                }
                                $i++; ?>

                            <?php }
                        } ?>
                    </div>
                </div>
            </div>






        </div>


        <div class="col-lg-9 p-0">
            <div class="row m-0">



                <?php
                $subcatid = $_GET['subcatid'];
                $catid = $_GET['catid'];
                //$searchcat= "SELECT subcategoryid from subcategories where subcategoryid=$cateid";
                $showcat = "SELECT * from products where category_id= $catid  and subcategory_id= $subcatid ";
                $getimg = "SELECT coverimg from categories where categoryid=$catid";
                $resultimg = mysqli_query($conn, $getimg);
                $dataa = mysqli_fetch_assoc($resultimg);
                $string = implode(" ", $dataa);

                ?>

                <div style="background-color:grey; height:400px; width:94%; padding:0px">
                    <img src="<?php echo $string ?>" style="height:400px; width:100%">
                </div>
                <?php $resultcat = mysqli_query($conn, $showcat);

                if ($resultcat->num_rows > 0) {
                    while ($rowcat = $resultcat->fetch_assoc()) {
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <a href="productdetails.php? id='<?php echo $rowcat['productid']; ?>'"
                                style="text-decoration:none; color:black">
                                <div class="card card-block mt-5" style="margin-left:35px; margin-right:0px; width:100%">
                                            <div class="card-img top">
                                                <img src="<?php echo $rowcat['img1'] ?>" style="margin-top:-10px " alt="">
                                            </div>
                                            <div class="card-text mt-3 mb-3">
                                                <h5 class="card-title" style="font-weight:bold; color:black;text-align:center">
                                                    <?php echo $rowcat['productname']; ?>
                                                </h5>
                                            </div>
                                            <div style="width:100%">
                                                <a href="#" class="btn view-details"
                                                    style="border:none;background-color:grey ; width:100%; color:white; padding:10px; font-weight:bold">
                                                    View details</a>
                                            </div>
                                        </div>
                            </a>
                        </div>


                        <div style="width:5%;"></div>

                        <?php

                    }
                } else {
                    ?>
                    <p style="margin-top:20px;font-size:25px; padding: 0px; color:grey">No Products Yet</p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'?>
</body>

<script>
</script>

</html>