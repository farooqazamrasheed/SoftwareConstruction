<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* .dropdown1{
    display: flex;
} */
        .dropdown-content {
            padding-left: 50px;
            background-color: #E5E4E2;
            display: none;
            position: absolute;
            z-index: 99;

        }

        .h1style {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin-top: 150px;

        }

        .productdiscription {
            margin-left: 50px;
            margin-top: 10px;
        }

        .startselling {
            margin-top: 30px;
            margin-left: 300px;
            padding: 7px;
            background-color: #c77013;
            border: none;
            height: 50px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            width: 20%;
        }

        .h4style {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            margin-top: 20px;
            font-size: 15px;

        }

        div {
            font-family: 'Jost', sans-serif;

        }
        .dropdown2 {
            background-color: #E5E4E2;
            display: none;
            margin-left: 250px;
            width: 15%;
            position: absolute;
            z-index: 99;
        }

        .dropdown2 p {
            margin-left: 20px;
        }

        .upcomingauctions {
            margin-bottom: 35px;
            margin-top: 30px;
            margin-left: 150px;
        }

        .wrapper {

            position: relative;
            z-index: 0;

        }

        img {
            height: 300px;
            width: 100%;
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

        .pgl-footer {
            background-color: black;
            color: white;
        }

        .container li a {
            color: white;
            margin-left: 8px;
            text-decoration: none;
            margin-top: 10px;
        }

        .container h2 {
            font-weight: 500;
        }

        .carousel slide {
            position: absolute;
            /* z-index: 10!important; */
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
</head>

<body>

    <div class="container-fluid px-0">
        <?php
        include 'header.php';
        include 'database.php';


        $sql = "select * from products where feature=1";
        $result = mysqli_query($conn, $sql);
        ?>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top:-20px; padding:0px">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="data/slider3.jpg" style="height:90vh; width:60%;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="data/slider2.jpg" style="height:90vh; width:60%;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="data/slider1.jpg" style="height:90vh; width:60%;" class="d-block w-100" alt="...">
                </div>
            </div>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
        </div>
    </div>


    <h2 class="upcomingauctions mb-2">Featured Products</h2>



    <hr
        style="color:#bc6607; background-color:#bc6607; border-width: 3px; margin-top:0px; width:7%; margin-left:150px; margin-bottom: 40px; " />
    <div id="carouselExampleControls1" class="carousel slide carousel-dark" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <?php
            $count = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($count == 0) { ?>

                        <div class="container-fluid">

                            <div class="carousel-item active">
                                <div class="row" style="margin:0px">
                                    <?php
                    } else if ($count % 4 == 0) {
                        ?>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="row" style="margin:0px">

                                    <?php
                    } ?>



                                <div class="col-md-3 col-sm-6">
                                    <a href="productdetails.php? id='<?php echo $row['productid']; ?>'"
                                        style="text-decoration:none; color:black">
                                        <div class="card card-block mt-5" style="margin-left:15px; margin-right:0px; width:90%">
                                            <div class="card-img top">
                                                <img src="<?php echo $row['img1'] ?>" style="margin-top:-10px" alt="">
                                            </div>
                                            <div class="card-text mt-3 mb-3">
                                                <h5 class="card-title" style="font-weight:bold; color:black;text-align:center">
                                                    <?php echo $row['productname']; ?>
                                                </h5>
                                            </div>
                                            <div style="width:100%">
                                                <a href="#" class="btn view-details"
                                                    style="border:none;background-color:grey ; width:100%; color:white; padding:10px; font-weight:bold">
                                                    View details</a>
                                            </div>
                                        </div>
                                    </a>
                                    <br>
                                </div>

                                <?php
                                $count++;
                }
            }
            ?>



                    </div>

                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row mx-0" style="margin-top:100px;padding-left:0px; padding-right:0px !important">
        <div class="col-lg-6 p-0">
            <div
                style="padding-left:0px;  padding-top:95px; padding-bottom:118px; margin-left: 150px; padding-right:0px !important; background-color:#f1f1f1">
                <h1 class="h1style" style="margin-top:30px;">Sell with E-Auction</h1>
                <hr style="color:#c77013 ;border-width: 3px; margin-top:0px; width:50%; margin-left:150px;  " />
                <h4 class="h4style">Curious to know if your item is suitable for one of our upcoming sales?<br>
                    Provide information and share images to request an online estimate now.</h4>
               
               <?php if (!isset($_SESSION['role'])) { ?>
                    <a href="registerpage.php"><button style="margin-left:250px;" class="startselling">Start Selling</button></a>
                    <?php }
                    else if(isset($_SESSION['role']) && $_SESSION['role']==11 ){
                        ?>
                        <a href="insertproduct.php">
                            <button style="margin-left:250px;" class="startselling">Start Selling</button></a>
                    <?php
                } else if (isset($_SESSION['role']) && $_SESSION['role'] == 10) {?>
                 <a href="insertproduct.php">
                            <button style="margin-left:250px; background-color:grey; color:white" disabled="disabled" class="startselling">Start Selling</button></a>
               
               <?php }
               else {
                ?>
                <a href="registerpage.php">
                <button style="margin-left:250px;" class="startselling">Start Selling</button></a>
                
               <?php
               }
                ?>
            </div>


        </div>
        <div class="col-lg-6" style=" padding-left:0px; padding-right:0px !important">
            <img src="data/startselling.jpg" style="height:445px; width:80%; padding-left:0px; padding-right:0px">
        </div>
        <br>
    </div>

  <?php include 'footer.php';?>








</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>



    <script src="home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

</body>
<script>
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000,
        wrap: false
    })
</script>

</html>