<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            padding: 0px;
        }

        .abc {

            background-color: #eeeeee;
        }
        body{
    height: 1000px;
   background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

}

        .bgbox {
            background-color:white;
            margin: auto;
            height: 600px;
            margin-top: -10px;
            width: 40%;
            border: 1px solid #E0E0E0;
            border-radius: 5px;
        }
        .custom-button {
    background-color: grey !important; 
    
    border-color: grey!important; 
    color:white !important; 
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
</head>

</head>

<body>
    <div style="background-color:#F8F4EA	; height:100vh;   padding:90px;">
    
        <div class="bgbox">
        <a href="javascript:history.back()"> <i class="fa fa-times-circle" style="float:right"
        aria-hidden="true"></i></a>

            <center>

         
            <div class="child-div p-0 mb-0 ">
                <img src="data/logo.png" style="width:50%; height:100px; margin-top:30px">
                </div>

                <div class="error" style="color:Red;">
                    <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </div>

            </center>


            <form method="post" action="loginconn.php">
                
                <div class="form-group mt-1">
                    <div class="mx-auto mt-4" style="width: 300px;">

                        <label for="InputUsername">Username: </label>

                        <input type="text" class="form-control" id="InputUsername" name="username"
                            placeholder="Enter username" required>

                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto mt-4" style="width: 300px;">

                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password"
                            placeholder="Password" required>
                    </div>
                    <div class="form-group">
                
                        <center>
                            <div class="form-group mt-5">


                                <button type="submit" style="width: 300px;" class="btn btn-primary"
                                    name="loginbutton">Log in</button>
                            </div>
                            <div class="mt-2"
                                style="width: 50%; height: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.2); text-align: center;">
                                <span style="font-size: 16px; background-color: white;
                                     padding: 0px 4px; color: rgba(0, 0, 0, 0.4);">
                                    Or
                                </span>

                            </div>

                        </center>

            </form>
            <center>
                <div class="mt-4">
<a href="registerpage.php">
                    <button type="button" style="width: 300px;"  
                
                    class="btn btn-primary custom-button"
                     name="signin">Register</button></a>
                </div>
            </center>
        </div>
    </div>

</body>

</html>