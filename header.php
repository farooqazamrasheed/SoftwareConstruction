<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<?php
    include 'database.php';
    
    //echo $_SESSION['role'];
    if (!isset($_SESSION['role'])) {
        ?>

        

            <nav class="navbar navbar-expand-lg" style="background-color:#F8F4EA">
                <a class="navbar-brand" href="#"><img style="width: 200px;height: 56px;" src="data/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active  ">
                            <a class="nav-link pr-3" href="home.php"><b>Home</b></a>
                        </li>

                        <li class="nav-item active  ">
                            <a class="nav-link pr-3" href="aboutus.php"><b>About us</b></a>
                        </li>

                        <li class="nav-item active ">
                            <a class="nav-link  pr-3" href="contactus.php"><b>Contact Us</b></a>
                        </li>

                        <li class="nav-item active ">
                            <a class="nav-link  pr-3" href="login.php"><b>Log in</b></a>
                        </li>


                        <li class="nav-item active " style="">
                            <a class="nav-link  pr-3" href="registerpage.php"><b>Register</b></a>
                        </li>
                    </ul>
                </div>


                <!-- <div class="icon-badge mini-cart-badge" data-count="0">0</div> -->

            </nav>
            <br>
        <?php } else if (isset($_SESSION['role'])) {
        ?>
                <nav class="navbar navbar-expand-lg" style="background-color:#F8F4EA">
                    <a class="navbar-brand" href="#"><img style="width: 200px;height: 56px;" src="data/logo.png"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active  ">
                                <a class="nav-link pr-3" href="home.php"><b>Home</b></a>
                            </li>

                            <li class="nav-item active  ">
                                <a class="nav-link pr-3" href="aboutus.php"><b>About us</b></a>
                            </li>
                           
                            <li class="nav-item active ">
                                <a class="nav-link  pr-3" href="contactus.php"><b>Contact Us</b></a>
                            </li>


                            <li class="nav-item active " style="">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Categories
                                    </a>

                                    <ul class="dropdown-menu">



                                        <?php
                                        $sql = "SELECT * from categories";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <li> <a class="dropdown-item"
                                                        href="allproductsuser.php?id='<?php echo $row['categoryid']; ?>'">
                                                    <?php echo $row['category_name'] ?></a></li>

                                            <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item active " style=" margin-left:800px;">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                         <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        
                                           <?php if($_SESSION['role'] == "12"){?>
                                                <a class="dropdown-item" href="bidderresult.php"style="text-decoration:none">bid status</a>    
                                            <?php }
                                            else if($_SESSION['role'] != "12"){
                                               
                                                    ?>                                            
                                        <a class="dropdown-item" href="<?php
                                        if ($_SESSION['role'] == "10") {

                                            echo "adduser.php";
                                        } else if ($_SESSION['role'] == "11") {


                                            echo "insertproduct.php";
                                        }
                                        
                                        ?>" style="text-decoration:none">Dashboard</a>
                                        <?php 
                                    }?>
                                    <a class="dropdown-item" href="logout.php" style="text-decoration:none">
                                            Log out</a>
                                    </ul>





                            </li>
                        </ul>
                    </div>


                    <!-- <div class="icon-badge mini-cart-badge" data-count="0">0</div> -->

                </nav>
                <br>

            <?php
    }
?>
</body>
</html>