<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style> body {
            height: 1000px;
            background-image: linear-gradient(to bottom, #F8F4EA 100%, #ef0289 50%, #b20785 0%);

        }</style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <title>About Us | E-Auction</title>
</head>

<body>
<?php 
include 'header.php';
?>
<!--
  <div class="jumbotron jumbotron-fluid about-header">
    <div class="container">
      <h1 class="display-4">E-Auction</h1>
      <p class="lead">Your one-stop shop for all your auction needs.</p>
    </div>
  </div>-->

  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <img src="data/auction.jpg" class="img-fluid" alt="Auction">
      </div>
      <div class="col-md-6">
        <h2>What is E-Auction?</h2>
        <p>E-Auction is a platform that provides a convenient and efficient way to participate in auctions online. We bring the auction to you, wherever you are, so you can bid on items from the comfort of your own home
        . Our website offers a wide range of items, from antiques to electronics, to meet all your auction needs. With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
        E-Auction is a platform that provides a convenient and efficient way to participate in auctions online. We bring the auction to you, wherever you are, so you can bid on items from the comfort of your own home
        . Our website offers a wide range of items, from antiques to electronics, to meet all your auction needs. With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
        E-Auction is a platform that provides a convenient and efficient way to participate in auctions online.</p>
</div>
</div>

  </div>
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <h2>Our Mission</h2>
        <p>Our mission is to provide a platform for individuals and businesses to buy and sell items through online auctions. We strive to create an environment that is easy to use, safe and secure, and accessible to all. Our website offers a wide range of items, from antiques to electronics, to meet all your auction needs. With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
        E-Auction is a platform that provides a convenient and efficient way to participate in auctions online. Our website offers a wide range of items, from antiques to electronics, to meet all your auction needs. With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
        E-Auction is a platform that provides a convenient and efficient way to participate in auctions online. Our website offers a wide range of items, from antiques to electronics, to meet all your auction needs. With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
        E-Auction is a platform that provides a convenient and efficient way to participate in auctions online. Our goal is to make online auctions simple, convenient, and accessible to everyone, so that you can find what you're looking for at the best price.</p>
      </div>
      <div class="col-md-6">
        <img src="data/mission.jpg" class="img-fluid" alt="Mission">
      </div>
    </div>
  </div>
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <img src="data/team.jpg" class="img-fluid" alt="Team">
      </div>
      <div class="col-md-6">
        <h2>Our Team</h2>
        <p>At E-Auction, we have a dedicated team of professionals who are committed to providing the best online auction experience for our users. Our team consists of experienced developers, designers, and customer service specialists who work together to ensure that every aspect of our website runs smoothly and efficiently. Our website offers a wide range of items, from antiques to electronics, to meet all your auction needs. With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
        E-Auction is a platform that provides a convenient and efficient way to participate in auctions online. Our website offers a wide range of items, from antiques to electronics, to meet all your auction needs. With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
         With user-friendly interfaces, easy payment options, and secure transactions, E-Auction is the perfect solution for all your bidding needs.
        E-Auction is a platform that provides a convenient and efficient way to participate in auctions online. Whether you're a first-time bidder or an experienced auction-goer, our team is here to help make your experience a success.</p>
      </div>
    </div>
  </div>
  <footer>
    <p class="text-center py-3">Copyright &copy; E-Auction 2023</p>
  </footer>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    </p>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    $("#aboutus").addClass("active");
  });
</script>
</body>
</html>