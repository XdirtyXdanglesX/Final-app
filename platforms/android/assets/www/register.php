<?php
      session_start(); 
    //1. Connect to database
      $db_uid ="root";
      $db_pwd = "";
      $connection = "mysql:host=localhost; dbname=login_page;";
      
      
      $con = new PDO($connection,$db_uid, $db_pwd) ;
      
      $username = $_POST['username']; 
      $password = $_POST['password'];
      
      //password length
      if ((strlen($password) < 5) ) {
            die("Your password must be between 5 and 16 characters. Please type in a new password");
      } 
      
      //Create account
      $password = md5($password); 
      
      //adding to database
      $query = "INSERT INTO register(username, password)
              VALUE(?, ?)"; 
                  
      $statment = $con->prepare($query);
      $statment->bindvalue(1, $username, PDO::PARAM_STR);
      $statment->bindvalue(2, $password, PDO::PARAM_STR);
      $statment->execute();
  
  
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $con->lastInsertId(); 
?>