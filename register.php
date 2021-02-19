<?php

if(!isset($_SESSION)){
    session_start();
    
 }


include_once("connections/connection.php");

$con = connection();

 if(isset($_POST['register'])){
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

   $sql = "INSERT INTO `users_lists`( `username`, `password`) VALUES ('$user', '$pass')";
   
  $con->query($sql) or die ($con->error);   
      

  



  echo header("Location: login.php");

    //  echo header("Location: index.php");
 

    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Thesis Archive</title>
    <link rel="stylesheet" href="css/style.css">

  

</head>


<body>  
        
          <h1>Registration</h1>
          <a style="text-decoration: none; color: black;" href="login.php">  <-BACK</a>
       <form action="" method="post">

           <label>Username</label>
           <input type="text" name="username" id="username">

           <label>Password</label>
           <input type="password" name="password" id="password">
           <button type="submit" name="register">Register</button>
           <button type="" name=""><a  href="login.php">Login </a></button>
         
           

           </form>
</body>
</html>