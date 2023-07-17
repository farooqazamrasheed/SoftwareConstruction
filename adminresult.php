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
        .nobid {
            margin-left: 50px;
            width: 80%;
  max-width: 600px;
  padding: 20px;
  background-color: #F5F5F5;
  border: 1px solid #DDD;
  font-size: 14px;
  color: #333;
  line-height: 1.5;

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



    <div class="mycontainer">
        <div class="row m-0">
            <div class="col-lg-3 greybg" style="padding:0px !important">
            <?php
            include 'database.php';
            include 'accordian.php'; ?>
            </div>


            <?php

            $sql = "SELECT * from categories";
            $result = mysqli_query($conn, $sql);
            ?>

            <div class="col-lg-9 greybg" style="padding:0px !important">
                <div class="container">
                    <h3 style="margin-top:70px;">Auction Status</h3>
                </div>


                <?php

            
                

                $showproducts = "SELECT * from products";
                $showproductsresult = mysqli_query($conn, $showproducts);
                if ($showproductsresult->num_rows > 0) {
                    while ($row = $showproductsresult->fetch_assoc()) { ?>
                        <div class="row m-0">
                            <div class="col-lg-4 px-0">


                                <div style="height:450px; width:100%; background-color:white">
                                    <a href="productdetails.php? id=<?php echo $row['productid']; ?>">
                                        <div class="card card-block"
                                            style="position:absolute; object-fit:contain; border-radius:none; margin-left:20px; 
                                             margin-top:50px; margin-right:0px; height:350px; width:22%;">
                                            <div class="card-img top">
                                                <img src="<?php echo $row['img1']; ?>" style="" alt="">
                                            </div>
                                            <div class="card-text mt-3 mb-3">
                                                <h5 class="card-title" style="font-weight:bold; color:black;text-align:center">
                                                    <?php echo $row['productname']; ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                $end = $row['enddate'];
                                $sellerid = $row['seller_id'];
                                $pid = $row['productid'];
                                $maxbid = "SELECT max(bidamount),biddate from bids where product_id='$pid'";
                                $getmaxbid = mysqli_query($conn, $maxbid);
                                 $getmaxbidresult = $getmaxbid->fetch_assoc();
                                //echo $getmaxbidresult['max(bidamount)']; ?>&nbsp; &nbsp;
                                <?php
                                //echo $getmaxbidresult['biddate'];
                        

                                ?>
                            </div>

                            <div class="col-lg-8 px-0 d-flex align-items-center">
                                <div class="container d-flex flex-column justify-content-center" style="
                                        margin-right:283;height:450px; margin-top:-25px;margin-left:-50px;
                                                                  width:70%; background-color:white;">

                                    <?php $allbids = "SELECT * from bids where product_id= '$pid'";
                                    $getallbids = mysqli_query($conn, $allbids); 
                                    if ($getallbids->num_rows == 0) {
                                            ?>
                                            <h6 style="" class="text-center mb-3"><b>Seller id:</b>
                                            <?php echo $sellerid ?>
                                            
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Seller Username:
                                                <?php
                                                $findseller = "SELECT * FROM user where userid='$sellerid'";
                                                
                                                $getseller = mysqli_query($conn, $findseller);
                                                $getsellerinfo = $getseller->fetch_assoc();
                                                
                                                      echo $getsellerinfo['username']; ?> </b> </h6>
                                        
                                            <div class="nobid">
                                            <h1 style="display:flex; justify-content:center">NO BIDS YET</h1></div>
                                            <?php

                                        } 
                             $sql = "SELECT buyer_id,bidamount from bids where product_id='$pid' order by bidamount desc limit 1";
                            $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        if (time() < strtotime($end)) {
                                            $bidder_id = $row['buyer_id'];
                                            $bid_amount = $row['bidamount']; ?>
                                        <h6 style="" class="text-center mb-3"><b>Auction status:</b> Active
                                            <i class="fa fa-circle" style="color:green !important;" aria-hidden="true"></i>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Auction End Date:</b>
                                            <?php echo $end ?>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Seller id:</b>
                                            <?php echo $sellerid ?>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Seller Username:
                                                <?php
                                                $findseller = "SELECT * FROM user where userid='$sellerid'";
                                                
                                                $getseller = mysqli_query($conn, $findseller);
                                                $getsellerinfo = $getseller->fetch_assoc();
                                                
                                                      echo $getsellerinfo['username']; ?> </b> </h6>
                                        <h5 style="color:green;" class="text-center mb-3">
                                            The highest bid is <strong>
                                                <?php echo "$bid_amount"; ?>
                                            </strong> with ID <strong>
                                                <?php echo "$bidder_id"; ?>
                                            </strong>.
                                        </h5>
                                        <?php
                                        } 
                                        else {
                                            $bidder_id = $row['buyer_id'];
                                            $bid_amount = $row['bidamount']; ?>
                                        <h6 style="" class="text-center mb-3"><b>Auction status:</b> In-Active
                                            <i class="fa fa-circle" style="color:Red !important;" aria-hidden="true"></i>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Auction End Date:</b>
                                            <?php echo $end ?>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Seller id:</b>
                                            <?php echo $sellerid ?>
                                        </h6>
                                        <h6 style="" class="text-center mb-3"><b>Seller Username:
                                                <?php
                                                $findseller = "SELECT * FROM user where userid='$sellerid'";
                                                
                                                $getseller = mysqli_query($conn, $findseller);
                                                $getsellerinfo = $getseller->fetch_assoc();
                                                
                                                      echo $getsellerinfo['username']; ?> </b> </h6>
                                        <h5 style="color:green;" class="text-center mb-3">
                                            The highest bid is <strong>
                                                <?php echo "$bid_amount"; ?>
                                            </strong> with ID <strong>
                                                <?php echo "$bidder_id"; ?>
                                            </strong>.
                                        </h5>
                                       

                                        <?php
                                        }
                                    }
                                        
                                        ?>
                                </div>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-9" style="">

                                <div style="margin-left: 7px; margin-top:-25px;background-color:white;">
                                    <center>
                                        <?php
                                        if ($getallbids->num_rows == 0) {
                                        } else {
                                            ?>
                                        <table style="width:50%; margin-left:10px">
                                            <tr>
                                                <th>#</th>
                                                <th>Bidder id</th>
                                                <th>Bid Amount</th>
                                                <th>Bid Date</th>

                                            </tr>
                                            <?php
                                            if ($getallbids->num_rows > 0) {
                                                $sr_num = 1;
                                                while ($getallbidsresult = $getallbids->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $sr_num;
                                                            $sr_num++;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $getallbidsresult['buyer_Id'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $getallbidsresult['bidamount'] ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            echo $getallbidsresult['biddate'];
                                                            ?>

                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            }

                                            ?>

                                        </table>
<?php }?>
                                    </center>

                                </div>
                            </div>
                        </div>
                        <div style="height:80px"></div>
                        <?php
                    }
                }
                ?>
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