<!-- 
File name: orderplace.php
Author: Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for display, interaction with database and functionality. 
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check out</title>
    <link rel="stylesheet" href="./css/checkout.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <script src="./js/checkOut.js" defer ></script>
</head>

<body>
    <?php include("headerM.php"); ?>

<main>

    <div class="list">
    <br><br>
    <h1>
    <?php
    if(isset($_SESSION["userName"]))
    {
        echo "Thank you,  ".$_SESSION["userName"] .",</h1>";
        echo "<h1>Your order No. ".strtotime("now")." is placed successfully!";
    }    
    ?></h1><br>
    </div>
</main>
<?php include 'footerM.php'; ?>
<?php

//declaration
$orderdate = date('Y-m-d H:i:s');
$chpayment = $_GET["paymentValue"];
$chdiscount = $_GET["discountValue"];


//onclick = place the order
//connect DB localhost
$conn = mysqli_connect('127.0.0.1', 'root', '', 'ichiban', 3308);

//check the connection is successful
if((isset($conn))&&(isset($_SESSION["userName"]))){
    //Insert new order
    $chuserID = $_SESSION["userID"];
    $sql_insert = "INSERT INTO ORDERS (date, userID, payment, discount) VALUES ('$orderdate', '$chuserID', '$chpayment', '$chdiscount')"; 
    mysqli_query($conn, $sql_insert);

    mysqli_close($conn);
    }
?>