<!-- 
File name: regisation.php
Author: Jill Lin, Miao Yang 
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
    <title>Registrarion Form</title>
    <script src="./js/regisScript.js" defer></script>
    <link rel="stylesheet" href="./css/registration.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
</head>

<body>
<?php include("headerM.php"); ?>

    <main>
    <div class="formcontainer">
        <h1>Join Ichiban and get special offers from time to time!</h1>
        <hr>
        <form action="registAction.php" method="post" onsubmit="return validate()">

            <div class="textfield">
                <label for="email">Email Address</label><br>
                <input type="text" name="emailRegist" id="email" placeholder="Email">
            </div>

            <div class="textfield">
                <label for="login">User Name</label><br>
                <input type="text" name="loginRegist" id="login" placeholder="User name" autocomplete="new-password">
            </div>

            <div class="textfield">
                <label for="pass">Password</label><br>
                <input type="password" name="passRegist" id="pass" placeholder="Password" autocomplete="new-password">
            </div>

            <div class="textfield">
                <label for="pass2">Re-type Password</label><br>
                <input type="password" name="passRegist2" id="pass2" placeholder="Password">
            </div>

            <div class="checkbox">
                <input type="checkbox" name="newsletter" id="newsletter">
                <label for="newsletter">I agree to receive monthly newsletters and coupon</label>
            </div>

            <div class="checkbox">
                <input type="checkbox" name="terms" id="terms">
                <label for="terms">I agree to the <a href="terms.php">terms and conditions</a></label>
            </div>
            <p><?php $err = isset($_GET["err"]) ? $_GET["err"] : ""; 
                switch ($err){
                    case 1:
                        echo "Email Address does exist! Login Please! ";
                        break;

                    case 2:
                        echo "Successful Registration! Login Please! ";
                        break;
                }
                ?></p>
            <button type="submit" id="signup">Sign-Up</button>
            <button type="reset" id="reset">Reset</button>

        </form>
    </div>
    </main>
    <?php include 'footerM.php'; ?>