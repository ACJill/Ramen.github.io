<!-- 
File name: headerM.php
Author: Jill Lin, Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for display and functionality. 
-->

<header>
        <div id="Heading">
            <img src="./img/logo2.png" class="logo" alt="Ichiban Ramen">
            <nav>
                <p><a href="index.php" class="flexbox">Home</a> </p>
                <p><a href="shoppingCart.php" class="flexbox">ORDER</a></p>
                <p><a href="registration.php" class="flexbox">Register</a> </p>
                <p><a class="flexbox"
                    <?php
                    if (!session_id()) session_start();
                    if(isset($_SESSION["userName"])){
                        echo "href=index.php"; //if the account has logged in successfully
                    }
                    else{
                        echo "href=login.php";
                    }
                    ?>>
                    <?php
                    if(isset($_SESSION["userName"])){
                        echo $_SESSION["userName"];
                    }
                    else{
                        echo "Sign in";
                    }
                    ?></a></p>
                
                    <?php
                    //if the account has logged in successfully,the sign out  box shows
                    if(isset($_SESSION["userName"])){
                       echo "<p><a href=signout.php"." class="."'flexbox box4'".">Sign Out</a></p>";
                    }
                    ?>
            </nav>
        </div>
</header>
