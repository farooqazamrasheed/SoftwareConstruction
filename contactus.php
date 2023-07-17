<?php session_start();
include 'database.php';
include 'header.php' ?>
<html>

<head>
    <style>
        body {
            height: 1000px;
            background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

        }
        
        div {
            font-family: 'Jost', sans-serif;

        }

        body {
            background-color: #f5f5f5;
        }

        h2 {
            font-weight: bold;
        }

        form {
            padding: 40px;
            background-color: white;
            box-shadow: 0px 0px 10px 0px #e5e5e5;
            border-radius: 10px;
        }

        .card {
            border: 0;
            box-shadow: 0px 0px 10px 0px #e5e5e5;
            border-radius: 10px;
        }

        .footer-bs {
            background-color: #3c3d41;
            padding: 60px 40px;
            color: rgba(255, 255, 255, 1.00);
            margin-bottom: 20px;
            border-bottom-right-radius: 6px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 6px;
        }

        .footer-bs .footer-brand,
        .footer-bs .footer-nav,
        .footer-bs .footer-social,
        .footer-bs .footer-ns {
            padding: 10px 25px;
        }

        .footer-bs .footer-nav,
        .footer-bs .footer-social,
        .footer-bs .footer-ns {
            border-color: transparent;
        }

        .footer-bs .footer-brand h2 {
            margin: 0px 0px 10px;
        }

        .footer-bs .footer-brand p {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.70);
        }

        .footer-bs .footer-nav ul.pages {
            list-style: none;
            padding: 0px;
        }

        .footer-bs .footer-nav ul.pages li {
            padding: 5px 0px;
        }

        .footer-bs .footer-nav ul.pages a {
            color: rgba(255, 255, 255, 1.00);
            font-weight: bold;
            text-transform: uppercase;
        }

        .footer-bs .footer-nav ul.pages a:hover {
            color: rgba(255, 255, 255, 0.80);
            text-decoration: none;
        }

        .footer-bs .footer-nav h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .footer-bs .footer-nav ul.list {
            list-style: none;
            padding: 0px;
        }

        .footer-bs .footer-nav ul.list li {
            padding: 5px 0px;
        }

        .footer-bs .footer-nav ul.list a {
            color: rgba(255, 255, 255, 0.80);
        }

        .footer-bs .footer-nav ul.list a:hover {
            color: rgba(255, 255, 255, 0.60);
            text-decoration: none;
        }

        .footer-bs .footer-social ul {
            list-style: none;
            padding: 0px;
        }

        .footer-bs .footer-social h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .footer-bs .footer-social li {
            padding: 5px 4px;
        }

        .footer-bs .footer-social a {
            color: rgba(255, 255, 255, 1.00);
        }

        .footer-bs .footer-social a:hover {
            color: rgba(255, 255, 255, 0.80);
            text-decoration: none;
        }

        .footer-bs .footer-ns h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .footer-bs .footer-ns p {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.70);
        }

        @media (min-width: 768px) {

            .footer-bs .footer-nav,
            .footer-bs .footer-social,
            .footer-bs .footer-ns {
                border-left: solid 1px rgba(255, 255, 255, 0.10);
            }
        }

        .btn-primary {
            background-color: #3f51b5;
            border-color: #3f51b5;
        }

        .btn-primary:hover {
            background-color: #1c2331;
            border-color: #1c2331;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
</head>

<body>

    <div class="container">
      <center>  <h3 style="margin-top:20px">We would be delighted to hear from you.</h3></center>
        <div class="row">
            <div class="col-md-6 mt-5">
                <form action="contactusconn.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="fname" id="name" placeholder="Enter your username">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group mt-3">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject">
                    </div>
                    <div class="form-group mt-3">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message"  name="message"rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="">
                    <div class="card-body">
                        <h5 class="card-title mt-5 ml-4;" style="font-weight:600;">Contact Information</h5>
                        <p class="card-text mt-3">
                            <strong><i class="fa fa-address-card-o" aria-hidden="true"></i>
                                Address:</strong> 12 Brookleigh, Street BA16 0NU, UK
                        </p>
                        <p class="card-text">
                            <strong><i class="fa fa-phone" aria-hidden="true"></i>
                                Phone:</strong> (123) 456-7890
                        </p>
                        <p class="card-text mb-2">
                            <strong><i class="fa fa-envelope" aria-hidden="true"></i>
                                Email:</strong> info@eauction.com
                        </p>
                    </div>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2504.2417293719022!2d-2.7551617842772527!3d51.1224490795738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487217369521d065%3A0x6d92aa334d9f2fd7!2s12%20Brookleigh%2C%20Street%20BA16%200NU%2C%20UK!5e0!3m2!1sen!2s!4v1675976301253!5m2!1sen!2s"
                    width="600" height="330" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>



 <?php include 'footer.php';?>

    


</body>

</html>