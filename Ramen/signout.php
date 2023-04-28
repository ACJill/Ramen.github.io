<!-- 
File name: signout.php
Author: Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for sign out functionality. 
-->

<?php
if (!session_id()) 
     session_start();

$_SESSION = array(); //clear the session data

if(isset($_COOKIE[session_name()])){ //verify the cookie, when it exists, set it 'expired'

setcookie(session_name(),'',time()-1,'/');

}

session_destroy(); //drop the session

header("Location:login.php");

?>