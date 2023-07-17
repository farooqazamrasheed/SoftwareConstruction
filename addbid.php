<?php
session_start();
include 'database.php';
$bidderid=$_SESSION['id'];
$productid = $_GET['id'];
$new_bid = $_POST['bid_price_input'];
// echo "dd";
//echo $new_bid;
echo $bidderid;
//echo $productid;
//echo $bidamount;
$sql2="SELECT startingprice from products where productid=$productid";
$result2 = mysqli_query($conn, $sql2);
// print_r($result2); 
$row2 = mysqli_fetch_assoc($result2);
// echo $row2['startingprice'];
$sql= "SELECT * FROM bids where product_id=$productid";
// echo $sql;
$result = mysqli_query($conn, $sql);
// print_r($result);
// if($result){
//     echo "success";
// }
// else{
//     echo "Query failed: " . mysqli_error($conn);
// }


if ($result->num_rows > 0) {


$highest_bid = 0;
    while($row = mysqli_fetch_assoc($result)) {
        if ($row['bidamount'] > $highest_bid) {
            $highest_bid = $row['bidamount'];
        }
    }
    echo "Heighest" .$highest_bid;
    if ($new_bid < $highest_bid) {
        
        $error="Dear ".$_SESSION['username'].", your bid is less than the highest bid ($highest_bid)";
        header("Location:productdetails.php?id=".$productid."&error=".$error);

    } else {
        echo "Product_id" . $productid . "bidamount" . $new_bid . "buyer_Id" . $bidderid;
        $insql = "INSERT INTO bids (product_id ,buyer_Id,bidamount) VALUES ($productid,$bidderid,$new_bid)";
        if (mysqli_query($conn, $insql)) {
            $message= "Bid stored successfully";
            header("Location:productdetails.php? id=".$productid."&message=".$message);
        } else {
            echo "Error storing bid: " . mysqli_error($conn);
        }
    }
} 
else {
    if ($new_bid >  $row2['startingprice']) {
        $insql1 = "INSERT INTO bids (product_id ,buyer_Id,bidamount) VALUES ($productid,$bidderid,$new_bid)";
        if ($conn->query($insql1) === TRUE) {
            $message= "Bid stored successfully";
            header("Location:productdetails.php? id=".$productid."&message=".$message);
        } 
        else {
            echo "Error storing bid: " . mysqli_error($conn);
          }
    }
    else{
        
        $error="Dear ".$_SESSION['username']. ", you bid is less than starting price";
        header("Location:productdetails.php?id=".$productid."&error=".$error);
    }
}
?>