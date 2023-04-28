<!-- 
File name: login.php
Author: Jill Lin, Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for display and functionality. 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <script src="./js/loginScript.js" defer></script>
</head>

<body>
<?php include("headerM.php"); ?>
<main>
    <div class="container">
        <h1>Sign in to your account</h1>
        <hr>
        <form id="loginform" action="loginaction.php" method="POST" onsubmit="return validateLogin();">

            <div class="textfield">
                <label for="email">Email Address</label><br>
                <input type="text" name="email" id="email" placeholder="Email" required="required" 
                value = "<?php echo isset($_COOKIE[""]) ? $COOKIE[""] : ""; ?>">
            </div>

            <div class="textfield">
                <label for="pass">Password</label><br>
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>
            <p><?php $err = isset($_GET["err"]) ? $_GET["err"] : ""; 
            switch ($err){
                case 1:
                    echo "Email Address or Password is not correct.";
                    break;

                case 2:
                    echo "Email Address or Password should not be null.";
                    break;

                case 3:
                    echo "DB connection failure.";
                    break;
            }
            ?></p>
            <button type="submit" id="signin">Sign in</button>
        </form>
    </div>

</main>
<?php include 'footerM.php'; ?>