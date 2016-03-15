<?php
  
  session_start(); 
  
  //1. Connect to database
  $db_uid ="root";
  $db_pwd = "";
  $connection = "mysql:host=localhost; dbname=login_page"; 
  
  //Define values 
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  
  $connection = new PDO($connection,$db_uid,$db_pwd);
  
    
    $query = "SELECT password, id FROM register WHERE username = ?";
    
    $statment = $connection->prepare($query);
    $statment->bindvalue(1,$username,PDO::PARAM_STR);
    $statment->execute();
    
    $row = $statment->fetch(PDO::FETCH_ASSOC);
    
    if(strcmp(md5($password),$row['password'])==0) {
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $row['id'];
      echo "cats";
    }else {
      echo ("login failed"); 
    }
?>