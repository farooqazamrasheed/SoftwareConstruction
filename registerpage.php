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

        body {
            height: 1000px;
            background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

        }

        .bgbox {
            background-color: white;
            margin: auto;
            height: 900px;
            margin-top: -10px;
            width: 40%;
            border: 1px solid #E0E0E0;
            border-radius: 5px;
        }

        .err {
            display: none;
        }

        .usernameerr {
            display: none;

        }

        .custom-button {
            background-color: grey !important;

            border-color: grey !important;
            color: white !important;
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

    <div style="background-color:#F8F4EA; height:100vh; padding:90px;">
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


            <form method="post" action="registerconn.php">

                <div class="form-group">
                    <div class="mx-auto mt-4" style="width: 300px;">

                        <label for="InputPassword">First name</label>
                        <input type="text" class="form-control" id="Firstname" name="fname" placeholder="First name"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="mx-auto mt-4" style="width: 300px;">
                        <label for="InputPassword">Last name</label>
                        <input type="text" class="form-control" id="Lastname" name="lname" placeholder="Last name"
                            required>
                    </div>
                </div>
                <div class="form-group mt-1">
                    <div class="mx-auto mt-4" style="width: 300px;">

                        <label for="InputUsername">Username: </label>

                        <input onchange="checkUsernameExist(this)" type="text" class="form-control" id="Username"
                            name="Username" placeholder="Enter username" required>
                        <span class="usernameerr" id="userExist" style="color:red;">User already exists! Try a different
                            username.</span>


                    </div>
                </div>
                <div class="form-group mt-1">
                    <div class="mx-auto mt-4" style="width: 300px;">

                        <label for="InputUsername">Email id: </label>

                        <input onchange="checkEmailExist(this)" type="Email" class="form-control" id="Email"
                            name="Email" placeholder="Enter Email" required>
                        <span class="err" id="emailExist" style="color:red;">Email already exists.</span>

                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto mt-4" style="width: 300px;">

                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password"
                            placeholder="Enter Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="mx-auto mt-4" style="width: 300px;">

                        <label for="InputPassword">Phone:</label>
                        <input type="text" class="form-control" id="Phone" name="phone" placeholder="Enter Phone number"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="mx-auto mt-4" style="width: 300px;">
                        <?php
                        include 'database.php';
                        $sql = "SELECT * from user_role WHERE userrole_name != 'admin'";
                        $result = mysqli_query($conn, $sql);

                        ?>
                        <label>Select Role:</label>
                        <select name="roleselected" id="userrole">
                            <?php
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {

                                    ?>
                                    <option value=<?php echo $row['userrole_id'] ?>><?php echo $row['userrole_name'] ?></option>


                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-4">


                    <center>

                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                        <div class="form-group mt-4 mb-4">


                            <button type="submit" style="width: 300px;" class="btn btn-primary" name="loginbutton">
                                Register</button>
                        </div>
                        <p>Already have an account? <a href="login.php">Sign in</a>.</p>


                    </center>
                </div>
            </form>

        </div>
    </div>
    <script src="jquery-3.6.3.min.js"></script>

    <script>
        function checkEmailExist(e) {
            var strval = $("#Email").val();
            console.log(strval);
            $.ajax({
                url: "checkcred.php",
                type: "post",
                dataType: "JSON",
                data: {
                    Email: strval
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.found == 1) {
                        $("#emailExist").show();
                        $("#submit_form_button").prop('disabled', true);
                    } else {
                        $("#emailExist").hide();
                        $("#submit_form_button").prop('disabled', false);
                    }
                },
                error: function (jqXHR, texterrorStatus, errorThrown) {
                    alert('no record found');
                }
            });
        }
        function checkUsernameExist(e) {
            var strval = $("#Username").val();
            console.log(strval);
            $.ajax({
                url: "checkusername.php",
                type: "post",
                dataType: "JSON",
                data: {
                    Username: strval
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.found == 1) {
                        $("#userExist").show();
                        $("#submit_form_button").prop('disabled', true);
                    } else {
                        $("#userExist").hide();
                        $("#submit_form_button").prop('disabled', false);
                    }
                },
                error: function (jqXHR, texterrorStatus, errorThrown) {
                    alert('no record found');
                }
            });
        }
    </script>
</body>

</html>