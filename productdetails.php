<!DOCTYPE html>
<html>

<head>
    <style>
        .column {
            float: left;
            width: 25%;
            padding: 10px;

        }

        body {
            height: 1000px;
            background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
            height: 150px;
            width: 80%;
            margin-top: 0px;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .cashback-info-block {
            position: relative;
            border: 1px solid #b9b9b9;
            border-radius: 10px;
            padding: 15px;
            overflow: hidden;
            margin: 0 0 24px;
        }

        .disabledbtn {
            background-color: grey !important;


        }

        .sticky {

            position: fixed;
            bottom: 0 !important;
            padding: 5px;
            z-index: 1;
            background-color: white;
            border: 2px solid grey;

        }

        /* The expanding image container */
        .container {
            position: relative;
        }

        .Productdetails p {
            margin-left: 150px;
            width: 80%;
            max-width: 600px;
            padding: 20px;
            background-color: ;
            border: 1px solid #DDD;
            font-size: 17px;
            color: #333;
            margin-top: -20px;
            line-height: 1.5;


        }

        .Productdetails li {
            margin-left: 250px;
        }

        .Productdetails h4 {
            margin-left: 200px;
        }

        .upcomingauctions {
            margin-bottom: 35px;
            margin-top: 30px;
            margin-left: 150px;
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

        .biddingarea {
            margin-left: 80px;
            margin-top: 10px;
            width: 70%;
            height: 450px;

        }
        .timer {
    
    text-align: center;
    background-color: white;
    font-size: 50px  !important;
    margin-left: 0px  !important;
    margin-top: 20px  !important;

    }
         div {
            font-family: 'Jost', sans-serif;

        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Orbitron:wght@900&family=Teko&display=swap"
        rel="stylesheet">

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
    session_start();
    include 'header.php';
    include 'database.php';
    $sql = "SELECT * from categories";
    $result = mysqli_query($conn, $sql);

    
    
    
    $id = $_GET['id'];

    $sql = "SELECT * from products where productid=$id";

    $getmaxbid = "SELECT max(bidamount) from bids where product_id= $id";
    $resultmaxbid = mysqli_query($conn, $getmaxbid);

    if ($resultmaxbid) {
        $maxbid = $resultmaxbid->fetch_assoc();

    }


    $row1 = array();

    $result1 = mysqli_query($conn, $sql);

    $row1 = $result1->fetch_assoc();
    $db_timestamp = $row1['enddate'];    
    //echo $row1['productname'];

    ?>

    <strong>
        <h2 style="margin-top: 50px; margin-left: 20px; text-align: center;">
            <?php echo $row1['productname'] ?>
        </h2>
    </strong>
    <div class="row m-0">
        <div class="col-lg-6 ">
            <div class="container">

                <img id="expandedImg" src="<?php echo $row1['img1'] ?>" height="600" style="margin-left:100px; margin-top:60px;
                    width:85%" height="650px">

            </div>
        </div>


        <div class="col-lg-6">
            <?php if (!isset($_SESSION['role'])) {
    
                ?>
                <div class="biddingarea">
                    <strong>
                        <p
                            style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                    text-align: left; padding-top: 10px; margin-top: 50px;  margin-bottom:7px;color: #c77013;">
                            Starting Price</p>
                        <p style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                     text-align: left;  margin-bottom:10px;"><?php echo $row1['startingprice'] ?>
                            USD</p>
                        <p style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                        margin-bottom:7px;  text-align: left; color:#c77013;">
                            Highest Bid</p>

                        <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                        text-align: left; ">
                            <?php
                            if ($maxbid['max(bidamount)']) {
                                echo $maxbid['max(bidamount)'];
                            } else {

                                ?>
                                <font color="grey">No Bids yet</font>
                            <?php }
                            ?>
                        </p>
                        <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                        text-align: left; margin-top:-10px; color:red; margin-bottom: 5px;">
                            End at </p>
                        <div style="display: flex">

                            <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                        text-align: left; margin-left: 0px; ">
                                <?php
                                $timestamp = strtotime($db_timestamp);
                                echo date("Y-m-d H:i:s", $timestamp);
                                ?>

                        </div>
                    </strong>
                    <div class="error" style="color:Red;">
                        <?php
                        if (isset($_GET['error'])) {
                            echo $_GET['error'];
                        }
                        ?>
                    </div>
                    <div class="message" style="color:Green;">
                        <?php
                        if (isset($_GET['message'])) {
                            echo $_GET['message'];
                        }
                        ?>
                    </div>
                    <div class="cashback-info-block">
                        <?php
                        $pid = $row1['productid'];
                        
                        $totalbids="SELECT COUNT(bidamount) FROM bids WHERE product_id = '$pid'";
                        $gettotalbids=mysqli_query($conn,$totalbids);
                
                        $totalbidsresult=$gettotalbids->fetch_assoc();?>
                        <div class="inner-wrap"><strong class="title d-flex justify-content-between"><span>Bidding</span>
                                <span class><u>Total
                                        Bid: <?php echo $totalbidsresult['COUNT(bidamount)'];?>
                                        Bids</u></span></strong>
                            <p>Leading bid is <b>
                                    <?php echo $maxbid['max(bidamount)']; ?>
                                </b>.</p>

                        </div>

                        <form action="addbid.php? id='<?php echo $row1['productid'] ?>'" method="POST">
                            <input type="text" name="bid_price_input" placeholder="Enter your bid" maxlength="17">
                            <span><button class="btn btn-primary disabledbtn" disabled="disabled"
                                    style="margin-top:-8px;padding: 2px;border: #c77013; background-color:#c77013"">Bid Now</button></span>
                                    </form>
                                        </div>
                            
                                        <div class=" mb-4"
                                    style="width: 100%; height: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.2); text-align: center;">
                                    <span
                                        style="font-size: 16px; background-color: rgb(255, 255, 255); padding: 0px 4px; color: rgba(0, 0, 0, 0.4);">
                                        Or
                                    </span>
                    </div>
                    <div class="mb-2">
                        <form action="addbid.php?id='<?php echo $row1['productid'] ?>'" method="post">
                            <input type="text" hidden name="bid_price_input" value="<?php if ($maxbid['max(bidamount)']) {
                                echo $maxbid['max(bidamount)'] + 1000;
                            } else {
                                echo $row1['startingprice'] + 1000;
                            }

                            ?>">
                            <input class="disabledbtn" disabled="disabled"
                                style="font-size: 17px; margin-left:180px; height:40px; width:30%;font-weight: normal; border: #c77013; background-color:#c77013; color:white; margin-bottom:10px"
                                type="submit" value=" Bid at <?php if ($maxbid['max(bidamount)']) {
                                    echo $maxbid['max(bidamount)'] + 1000;

                                } else {
                                    echo $row1['startingprice'] + 1000;
                                }

                                ?>">
                        </form>
                        <?php
                        ?>

                        </a>
                    </div>
                    <div id="myDiv" class="sticky" style="height:200px; width:40%; box-shadow: -5px -5px 10px #888888;">
                        <i style="float:right" onclick="closeDiv()" class="fa fa-times-circle" aria-hidden="true"></i>
                        <div class="container">
                            <center>
                                <h5 style="margin-top:30px">Ready to start bidding?</h5>
                                <p>Join the E-Auction family and place bids on your favorite items</p>
                                <a href="login.php" style="text-decoration:none;"><button type="button" style="width: 100px;" class="btn btn-primary custom-button"
                                    name="signin">Sign in</button></a>
                                <a href="registerpage.php" style="text-decoration:none;"><button type="button" style="width: 100px;" class="btn btn-primary custom-button"
                                    name="signin">Register</button></a>
                            </center>
                        </div>

                    </div>

                </div>
            <?php
       
        } else if (isset($_SESSION['role']) && time()<  strtotime($db_timestamp)) {
               // echo $_SESSION['role']; ?>
                    <div class="biddingarea">
                        <strong>

                            <p
                                style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                            text-align: left; padding-top: 10px; margin-top: 50px;  margin-bottom:7px;color: #c77013;">
                                Starting Price</p>
                            <p style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                             text-align: left;  margin-bottom:10px;"><?php echo $row1['startingprice'] ?>
                                USD</p>
                            <p style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                                margin-bottom:7px;  text-align: left; color:#c77013;">
                                Highest Bid</p>

                            <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                                text-align: left; ">
                                <?php
                                if ($maxbid['max(bidamount)']) {
                                    echo $maxbid['max(bidamount)'];
                                } else {

                                    ?>
                                    <font color="grey">No Bids yet</font>
                            <?php }
                                ?>
                            </p>
                            <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                                text-align: left; margin-top:-10px; color:red; margin-bottom: 5px;">
                                End at </p>
                            <div style="display: flex">

                                <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                                text-align: left; margin-left: 0px; ">
                                <?php $db_timestamp = $row1['enddate'];
                                $timestamp = strtotime($db_timestamp);
                                echo date("Y-m-d H:i:s", $timestamp);
                                ?>

                            </div>
                        </strong>
                        <div class="error" style="color:Red;">
                            <?php
                            if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            }
                            ?>
                        </div>
                        <div class="message" style="color:Green;">
                            <?php
                            if (isset($_GET['message'])) {
                                echo $_GET['message'];
                            }
                            ?>
                        </div>
                        <div class="cashback-info-block">
                        <?php
                        $pid = $row1['productid'];
                        
                        $totalbids="SELECT COUNT(bidamount) FROM bids WHERE product_id = '$pid'";
                        $gettotalbids=mysqli_query($conn,$totalbids);
                
                        $totalbidsresult=$gettotalbids->fetch_assoc();?>
                            <div class="inner-wrap"><strong class="title d-flex justify-content-between"><span>Bidding</span>
                                    <span class><u>Total
                                            Bid: <?php echo $totalbidsresult['COUNT(bidamount)']; ?>
                                            Bids</u></span></strong>
                                <p>Leading bid is <b>
                                    <?php echo $maxbid['max(bidamount)']; ?>
                                    </b></p>

                            </div>

                            <form action="addbid.php? id='<?php echo $row1['productid'] ?>'" method="POST">
                                <input type="text" name="bid_price_input" placeholder="Enter your bid" maxlength="17">
                                <span><button class="btn btn-primary"
                                        style="margin-top:-8px;padding: 2px;border: #c77013; background-color:#c77013"">Bid Now</button></span>
                                            </form>
                                                </div>
                            
                                                <div class=" mb-4"
                                        style="width: 100%; height: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.2); text-align: center;">
                                        <span
                                            style="font-size: 16px; background-color: rgb(255, 255, 255); padding: 0px 4px; color: rgba(0, 0, 0, 0.4);">
                                            Or
                                        </span>
                        </div>
                        <div class="mb-2">
                            <form action="addbid.php?id='<?php echo $row1['productid'] ?>'" method="post">
                                <input type="text" hidden name="bid_price_input" value="<?php if ($maxbid['max(bidamount)']) {
                                    echo $maxbid['max(bidamount)'] + 1000;
                                } else {
                                    echo $row1['startingprice'] + 1000;
                                }

                                ?>">
                                <input style="font-size: 17px; margin-left:180px; height:40px; width:30%;font-weight: normal; 
                        
                         border: #c77013; background-color:#c77013; color:white; margin-bottom:10px" type="submit" value=" Bid at <?php if ($maxbid['max(bidamount)']) {
                             echo $maxbid['max(bidamount)'] + 1000;

                         } else {
                             echo $row1['startingprice'] + 1000;
                         }

                         ?>">
                            </form>
                            <?php
                            ?>
                            </a>
                        </div>

                    </div>
            <?php }
            else if(isset($_SESSION['role']) && time()>= strtotime($db_timestamp)){
            ?>
 <div class="biddingarea">
                    <strong>
                        <p
                            style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                    text-align: left; padding-top: 10px; margin-top: 50px;  margin-bottom:7px;color: #c77013;">
                            Starting Price</p>
                        <p style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                     text-align: left;  margin-bottom:10px;"><?php echo $row1['startingprice'] ?>
                            USD</p>
                        <p style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center; 
                                        margin-bottom:7px;  text-align: left; color:#c77013;">
                            Highest Bid</p>

                        <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                        text-align: left; ">
                            <?php
                            if ($maxbid['max(bidamount)']) {
                                echo $maxbid['max(bidamount)'];
                            } else {

                                ?>
                                <font color="grey">No Bids yet</font>
                            <?php }
                            ?>
                        </p>
                        <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                        text-align: left; margin-top:-10px; color:red; margin-bottom: 5px;">
                            End at </p>
                        <div style="display: flex">

                            <p style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                        text-align: left; margin-left: 0px; ">
                                <?php
                                $timestamp = strtotime($db_timestamp);
                                echo date("Y-m-d H:i:s", $timestamp);
                                ?>

                        </div>
                        <h3 style=" font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
                                        text-align: left; margin-top:-10px; color:red; margin-bottom: 5px;">
                            The Auction has ended!</h3>
                    </strong>
                    <div class="error" style="color:Red;">
                        <?php
                        if (isset($_GET['error'])) {
                            echo $_GET['error'];
                        }
                        ?>
                    </div>
                    <div class="message" style="color:Green;">
                        <?php
                        if (isset($_GET['message'])) {
                            echo $_GET['message'];
                        }
                        ?>
                    </div>
                    <div class="cashback-info-block">
                        <?php
                        $pid = $row1['productid'];
                        
                        $totalbids="SELECT COUNT(bidamount) FROM bids WHERE product_id = '$pid'";
                        $gettotalbids=mysqli_query($conn,$totalbids);
                
                        $totalbidsresult=$gettotalbids->fetch_assoc();?>
                            <div class="inner-wrap"><strong class="title d-flex justify-content-between"><span>Bidding</span>
                                    <span class><u>Total
                                            Bid: <?php echo $totalbidsresult['COUNT(bidamount)']; ?>
                                            Bids</u></span></strong>
                                <p>Leading bid is <b>
                                    <?php echo $maxbid['max(bidamount)']; ?>
                                    </b>.</p>

                            </div>

                        <form action="addbid.php? id='<?php echo $row1['productid'] ?>'" method="POST">
                            <input type="text" name="bid_price_input" placeholder="Enter your bid" maxlength="17">
                            <span><button class="btn btn-primary disabledbtn" disabled="disabled"
                                    style="margin-top:-8px;padding: 2px;border: #c77013; background-color:#c77013"">Bid Now</button></span>
                                    </form>
                                        </div>
                            
                                        <div class=" mb-4"
                                    style="width: 100%; height: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.2); text-align: center;">
                                    <span
                                        style="font-size: 16px; background-color: rgb(255, 255, 255); padding: 0px 4px; color: rgba(0, 0, 0, 0.4);">
                                        Or
                                    </span>
                    </div>
                    <div class="mb-2">
                        <form action="addbid.php?id='<?php echo $row1['productid'] ?>'" method="post">
                            <input type="text" hidden name="bid_price_input" value="<?php if ($maxbid['max(bidamount)']) {
                                echo $maxbid['max(bidamount)'] + 1000;
                            } else {
                                echo $row1['startingprice'] + 1000;
                            }

                            ?>">
                            <input class="disabledbtn" disabled="disabled"
                                style="font-size: 17px; margin-left:180px; height:40px; width:30%;font-weight: normal; border: #c77013; background-color:#c77013; color:white; margin-bottom:10px"
                                type="submit" value=" Bid at <?php if ($maxbid['max(bidamount)']) {
                                    echo $maxbid['max(bidamount)'] + 1000;

                                } else {
                                    echo $row1['startingprice'] + 1000;
                                }

                                ?>">
                        </form>
                        <?php
                        ?>

                        </a>
                    </div>

                </div>


            <?php }
            ?>

            <div class="row11">
                <div class="column" style="margin-left:65px;">
                    <img src=" <?php echo $row1['img1'] ?>" style="width:100%" onclick="myFunction(this);">
                </div>
                <div class="column">
                    <img src="<?php echo $row1['img2'] ?>" style="width:100%" onclick="myFunction(this);">
                </div>
                <div class="column">
                    <img src="<?php echo $row1['img3'] ?>" style="width:100%" onclick="myFunction(this);">
                </div>

            </div>
        </div>

    </div>
    
    <h2 class="upcomingauctions mb-2">Product Details</h2>

    <hr
        style="color:#bc6607; background-color:#bc6607; border-width: 3px; margin-top:0px; width:7%; margin-left:150px; margin-bottom: 40px; " />
    <div class="Productdetails">
        <div class="row m-0">
        <div class="col-lg-7">
            <p style="  justify-content: center;"><?php echo nl2br($row1['productdescription']) ?></p>
        </div>
        <div class="col-lg-5 p-0 m-0">
            <h4 style="margin-left:40px">Time left: </h4>
        <p class="timer" id="demo"></p>

        </div>
         </div>

 </div>
 <?php include 'footer.php';?>
 
</body>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>

    var countDownDate = new Date("<?php echo date('M d, Y H:i:s', strtotime($db_timestamp)); ?>").getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "TIME HAS EXPIRED";
      }
    }, 1000);
  


    function closeDiv() {
        var div = document.getElementById("myDiv");
        div.remove();
    }

    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
    }
</script>

</html>