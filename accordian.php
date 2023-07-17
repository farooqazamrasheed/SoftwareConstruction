<html>

<head>
    <style>
      

        hr {

            border: 3px !important;
            background-color: #ebebeb !important;
            color: #ebebeb !important;
            margin-left: auto !important;
            width: 95%;
            margin-right: auto !important;
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
    <img src="data/logo.png" style="width:84%; height:130px; margin-top:50px;margin-left:45px;">
    <div class="accordion accordion-flush" id="accordionFlushExample"
        style="margin-top:10px; width:70%; margin-left:70px;">
        <?php if ($_SESSION['role'] == 10) { ?>
            <div class="accordion-item">

                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" style="background-color:#fbf7f4; color:Black;"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                        aria-controls="flush-collapseOne">
                        User Management
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" style="color:white;"
                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <a href="userrolelist.php" style="text-decoration:none;">
                        <div class="accordion-body  m-0" style="background-color:#fbf7f4; color:black;">Manage
                            User Roles
                            <hr style="margin-bottom:0px;padding:0px; width:100%">
                        </div>
                    </a>

                    <a href="adduser.php" style="text-decoration:none;">
                        <div class="accordion-body " style="background-color:#fbf7f4; color:black;">Manage Users
                        </div>
                    </a>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading2">
                    <button class="accordion-button collapsed" type="button" style="background-color:#fbf7f4; color:Black;"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false"
                        aria-controls="flush-collapse2">
                        Category Management
                    </button>
                </h2>
                <div id="flush-collapse2" class="accordion-collapse collapse" style="color:white;"
                    aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample">
                    <a href="categorymanagement.php" style="text-decoration:none;">
                        <div class="accordion-body  m-0" style="background-color:#fbf7f4; color:black;">Add
                            Category
                            <hr style="margin-bottom:0px;padding:0px; width:100%">
                        </div>
                    </a>

                    <a href="subcategorymanagement.php" style="text-decoration:none;">
                        <div class="accordion-body " style="background-color:#fbf7f4; color:black;">Add
                            Sub-category</div>
                    </a>
                </div>

            </div>
        

        <a href="insertproduct.php" style="text-decoration:none;">
            <div class="accordion-body m-0 " style="background-color:#fbf7f4; color:black;">
                <i class="fa fa-plus-square" style="  margin-left: 10px;
    margin-right:10px;" aria-hidden="true"></i>&nbsp; Insert Products
                <hr color="black" style="margin-bottom:0px;padding:0px; width:100%">


            </div>
        </a>


        <a href="manageproduct.php" style="text-decoration:none;">
            <div class="accordion-body m-0 pt-0" style="background-color:#fbf7f4; color:black;">
                <i class="fa fa-list" style="  margin-left: 10px;margin-right:10px;" aria-hidden="true"></i>&nbsp;
                Manage Products
            </div>

        </a>
        <a href="adminresult.php" style="text-decoration:none;">
            <div class="accordion-body m-0 " style="background-color:#fbf7f4; color:black;">
            <i class="fa fa-history" style="  margin-left: 10px;margin-right:10px;" aria-hidden="true"></i>    
            &nbsp
                Auction Status
            </div>
            <hr style="margin-bottom:0px;padding:0px; width:100%">

        </a>
        <?php } else { ?>
            <a href="insertproduct.php" style="text-decoration:none;">
            <div class="accordion-body m-0 " style="background-color:#fbf7f4; color:black;">
                <i class="fa fa-plus-square" style="  margin-left: 10px;
    margin-right:10px;" aria-hidden="true"></i>&nbsp; Insert Products
                <hr color="black" style="margin-bottom:0px;padding:0px; width:100%">


            </div>
        </a>


        <a href="manageproduct.php" style="text-decoration:none;">
            <div class="accordion-body m-0 pt-0" style="background-color:#fbf7f4; color:black;">
                <i class="fa fa-list" style="  margin-left: 10px;margin-right:10px;" aria-hidden="true"></i>&nbsp;
                Manage Products
            </div>

        </a>
        <a href="sellerresult.php" style="text-decoration:none;">
            <div class="accordion-body m-0 " style="background-color:#fbf7f4; color:black;">
            <i class="fa fa-history" style="  margin-left: 10px;margin-right:10px;" aria-hidden="true"></i>    
            &nbsp
                Auction Status
            </div>
            <hr style="margin-bottom:0px;padding:0px; width:100%">

        </a> 
        <?php }?>
        <a href="home.php" style="text-decoration:none;">
            <div class="accordion-body m-0 pt-0" style="background-color:#fbf7f4; color:black;">
            <i class="fa fa-home"  style="  margin-left: 10px; margin-right:10px;" aria-hidden="true"></i>
                 Home
                <hr style="margin-bottom:0px;padding:0px; width:100%">
            </div>
        </a>
        <a href="logout.php" style="text-decoration:none;">

            <div class="accordion-body m-0 pt-0" style="background-color:#fbf7f4; color:black;">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Log out
                <hr style="padding:0px; width:100% !important; margin-bottom:0px;">
            </div>
        </a>

    </div>
</body>

</html>