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


        h6,
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


        <div class="col-lg-9">
        <div class="container">
                    <h3>Bid Status</h>
                </div>
            

            <?php

            $bidderid = $_SESSION['id'];

            $showproducts = "Select distinct(product_id) from bids where buyer_id='$bidderid'";
            $showproductsresult = mysqli_query($conn, $showproducts);
            if ($showproductsresult->num_rows > 0) {
                while ($row = $showproductsresult->fetch_assoc()) { ?>
                    <div class="row m-0">
                        <div class="col-lg-4 px-0">
                            <?php
                            $pid = $row['product_id'];
                            //echo $pid;
                            $getimgsql = "SELECT img1,enddate,productname from products where productid='$pid'";
                            $getimg = mysqli_query($conn, $getimgsql);
                            $getresult = $getimg->fetch_assoc();
                            //echo $getresult['img1']; ?>
                            <div style="height:450px; width:100%; background-color:white">
                                <a href="productdetails.php? id=<?php echo $row['product_id']; ?>">
                                    <div class="card card-block" style="position:absolute; object-fit:contain;  
                                                 border-radius:none; margin-left:20px; 
                                                   margin-top:50px; margin-right:0px; height:350px; width:22%;">
                                        <div class="card-img top">
                                            <img src="<?php echo $getresult['img1']; ?>" style="" alt="">
                                        </div>
                                        <div class="card-text mt-3 mb-3">
                                            <h5 class="card-title" style="font-weight:bold; color:black;text-align:center">
                                                <?php echo $getresult['productname']; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                            $end = $getresult['enddate'];
                            $maxbid = "SELECT max(bidamount),biddate from bids where buyer_id='$bidderid' and product_id='$pid'";
                            $getmaxbid = mysqli_query($conn, $maxbid);
                            $getmaxbidresult = $getmaxbid->fetch_assoc();
                            //echo $getmaxbidresult['max(bidamount)']; ?>&nbsp; &nbsp;
                            <?php
                            //echo $getmaxbidresult['biddate'];
                    

                            ?>
                        </div>
                        <div class="col-lg-8 px-0 d-flex align-items-center">
                            <?php
                            $sql = "SELECT buyer_id,bidamount from bids where product_id='$pid' order by bidamount desc limit 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                if (time() < strtotime($end)) {
                                    $bidder_id = $row['buyer_id'];
                                    $bid_amount = $row['bidamount'];
                                    ?>
                                    <div class="container d-flex flex-column justify-content-center" style="height:450px; margin-top:-25px;margin-left:-50px;
                                  width:70%; background-color:white;">
                                        <h6 style="margin-top:-10px" class="text-center mb-3"><b>Your Highest Bid:</b>
                                            <?php echo $getmaxbidresult['max(bidamount)']; ?>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Bid Date:</b>
                                            <?php echo $getmaxbidresult['biddate']; ?>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Auction End Date:</b>
                                            <?php echo $end ?>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Auction status:</b> Active
                                            <i class="fa fa-circle" style="color:green !important;" aria-hidden="true"></i>
                                        </h6>



                                        <h5 style="color:red;" class="text-center mb-3">
                                            The highest bid is <strong>
                                                <?php echo "$bid_amount"; ?>
                                            </strong> with Username <strong>
                                                <?php
                                                $findname = "SELECT * from user where userid='$bidder_id'";
                                            
                                                $getname = mysqli_query($conn, $findname);
                                                $getusername = $getname->fetch_assoc();
                                                echo $getusername['username']; ?>
                                            </strong>.
                                        </h5>
                                        <h6 style="" class="text-center mb-3"><b>Stay in the game, place a bid.</b> </h6>
                                        <a href="productdetails.php? id=<?php echo $pid ?>">
                                            <button style="font-size: 17px; margin-left:180px; height:40px; width:30%;font-weight: normal; border: #c77013;
                                 background-color:#c77013; color:white; margin-bottom:10px">Bid Now</button></a>

                                    </div>
                                    <?php
                                } else if (time() >= strtotime($end)) {
                                    $bidder_id = $row['buyer_id'];
                                    $bid_amount = $row['bidamount'];

                                    if ($bidder_id != $bidderid) {
                                        ?>

                                            <div class="container d-flex flex-column justify-content-center"
                                                style="height:450px; margin-top:-25px;margin-left:-50px; width:70%; background-color:white;">
                                                <h5 style="margin-top:-10px; color:red;" class="text-center mb-3;"><b>Auction went to someone
                                                        else.</b> </h5>
                                                <h6 style="margin-top:-10px" class="text-center mb-4"><b>Your Highest Bid:</b>
                                                <?php echo $getmaxbidresult['max(bidamount)']; ?>
                                                </h6>
                                                <h6 style="" class="text-center mb-3"><b>Bid Date:</b>
                                                <?php echo $getmaxbidresult['biddate']; ?>
                                                </h6>
                                                <h6 style="" class="text-center mb-3"><b>Auction End Date:</b>
                                                <?php echo $end ?>
                                                </h6>
                                                <h6 style="" class="text-center mb-3"><b>Auction status:</b> In-active
                                                    <i class="fa fa-circle" style="color:red !important;" aria-hidden="true"></i>
                                                </h6>
                                                <p class="text-center">
                                                    The highest bid is <strong>
                                                    <?php echo "$bid_amount"; ?>
                                                    </strong> with Username: <strong>
                                                    <?php
                                                $findname = "SELECT * from user where userid='$bidder_id'";
                                            
                                                $getname = mysqli_query($conn, $findname);
                                                $getusername = $getname->fetch_assoc();
                                                echo $getusername['username']; ?>
                                                    </strong>.
                                                </p>
                                            </div>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="container d-flex flex-column justify-content-center"
                                                style="height:450px; margin-top:-25px;margin-left:-50px; width:70%; background-color:white;">
                                                <h5 style="margin-top:-10px; background-color:yellow;color:green;" class="text-center mb-4;">
                                                <strong> Congratulations!
                                                    </strong>
                                                <?php //echo "$bidder_id"; ?>
                                                    you won the auction at
                                                    <strong>
                                                    <?php echo "$bid_amount"; ?>
                                                    </strong>.
                                                </h5>
                                                <h6 style="margin-top:0px" class="text-center mb-3"><b>Your Highest Bid:</b>
                                                <?php echo $getmaxbidresult['max(bidamount)']; ?>
                                                </h6>
                                                <h6 style="" class="text-center mb-3"><b>Bid Date:</b>
                                                <?php echo $getmaxbidresult['biddate']; ?>
                                                </h6>
                                                <h6 style="" class="text-center mb-3"><b>Auction End Date:</b>
                                                <?php echo $end ?>
                                                </h6>
                                                <h6 style="" class="text-center mb-3"><b>Auction status:</b> In-active
                                                    <i class="fa fa-circle" style="color:red !important;" aria-hidden="true"></i>
                                                </h6>
                                                <h6 style="" class="text-center mb-3"><b>You can now contact the seller  at: </b> </h6>
                                                <?php
                                                $findseller = "SELECT * FROM user where userid IN 
                                                (SELECT seller_id from products where productid='$pid')";
                                                $getseller = mysqli_query($conn, $findseller);
                                                $getsellerinfo = $getseller->fetch_assoc();
                                                ?>
                                                <h6 style="" class="text-center mb-3"><b><?php   echo $getsellerinfo['email']; ?> </b> </h6>

                                                <p class="text-center">

                                                </p>
                                            </div>


                                        <?php
                                    }

                                }

                                ?>
                            </div>

                        </div>
                        <?php
                            }
                }
            }
            ?>






        </div>
    </div>

</body>

<script>
</script>''

</html>