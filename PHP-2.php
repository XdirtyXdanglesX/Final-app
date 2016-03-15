<?php



$connect= $con['connect'];
$username = $_POST['username'];
$password = $_POST['password'];

    $connection = "mysqli:host=localhost;dbname=login_page";
    
if ($username && $password)

{

    mysqli_select_db($con, "login_page") or die ("couldnt find database");
    
    $query = mysqli_query("SELECT * FROM users WHERE username = '$username'");
    
    $numrows = mysqli_num_rows ($query);
    
    if ($numrows!==0)
    {
        while($row = mysqli_fetch_assoc($query))
        
        {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
                       
        }
        
        if($dbusername == $username && $dbpassword == $password)
       {
            echo "Welcome user";
            @$_SESSION['username'] = $username;
       }
        else{
             echo ("Your password is incorrect!");
        }
        else{
            die("That user does not exist!");   
        }
        else{
            die("Please enter a username and password!");
        }
    }
}
?>