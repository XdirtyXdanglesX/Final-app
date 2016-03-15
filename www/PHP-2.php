<?php

$username=$_POST['username'];
$password=$_POST['password'];
$login = $_GET['login'];

    if($login=='yes') {
    
    $con = mysql_connect("localhost","root","Puzzles1");
    
    mysql_select_db("login");
    
    $get = mysql_querey("SELECT count(id) FROM login WHERE user=$ 'username' and pass='$password'");
    
    $result = mysql_result($get, 0);
    
    if($result!=1) {
        echo"incalid login.";
    }
    else {
        echo "Login Successful Welcome Back!";
        $_SESSION['username'] = $username;
        }
    }

?>