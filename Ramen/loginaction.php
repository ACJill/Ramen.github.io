<!-- 
File name: loginaction.php
Author: Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for interaction with database and functionality. 
-->

<?php
//declaration
$email = isset($_POST['email']) ? $_POST['email'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";

//check if the email and password is not empty
if(!empty($email) && !empty($pass)){
    //connect DB localhost
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'ichiban', 3308);
    $sql_select = "SELECT userID, email, password, userName, phone FROM USERS WHERE email = '$email'";


    //check the connection is successful
    if(isset($conn)){
        
        $ret = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($ret);
        
        //compare the email and password
        if($email == $row['email'] && $pass == $row['password'])
        {
        //create a cookie
        setcookie("cookie", $email, time() + 7* 24 *3600);

        //open a session and write into a log
        session_start();
        $_SESSION["userID"] = $row['userID'];
        $_SESSION["userName"] = $row['userName'];
        $_SESSION["phone"] = $row['phone'];

        //success login, jump to index.php
        header("Location:index.php");
        mysqli_close($conn);
        }
        else{
            header("Location:login.php?err=1");
        }
    }
    else{
        header("Location:login.php?err=3");
    } 

}
else{
    header("Location:login.php?err=2");
} 



?>