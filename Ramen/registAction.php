<!-- 
File name: registAction.php
Author: Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for interaction with database and functionality. 
-->

<?php
//declaration
$name = isset($_POST['loginRegist']) ? $_POST['loginRegist'] : "";
$email = isset($_POST['emailRegist']) ? $_POST['emailRegist'] : "";
$pass = isset($_POST['passRegist']) ? $_POST['passRegist'] : "";
$pass2 = isset($_POST['passRegist2']) ? $_POST['passRegist2'] : "";

//Register if the password are same
if($pass == $pass2){
    //connect DB“localhost
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'ichiban', 3308);
    $sql_select = "SELECT email FROM USERS WHERE email = '$email'";
    if(isset($conn)){
        $ret = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($ret);

        //compare the email to check if the user exists
        if($email == $row['email'] )
        {
            echo $row['email'];
            //Erro message of "user exists"
            header("Location:registration.php?err=1");
        }else{
            //Insert new user
            $sql_insert = "INSERT INTO USERS(userName, email, password) VALUE('$name', '$email', '$pass')"; 
            mysqli_query($conn, $sql_insert);
            //success login, jump to login.php
            header("Location:registration.php?err=2");
        }
    
        mysqli_close($conn);
    }
} ?>