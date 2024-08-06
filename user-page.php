<?php
 @include 'config.php';

 session_start();
 if(!isset( $_SESSION['user_name'])){
   header('location:login-form.php');
 }
 ?>
 


<!DOCTYPE html>
 <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <title>user page</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
 </head>
 <body>
    <div class="container">
        <div class="content">
            <h3>hi, <span>user</span></h3>
            <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>this is a user page</p>
            <a href="login-form.php" class="btn">login</a>
            <a href="register-form.php" class="btn">register</a>
            <a href="logout.php" class="btn">logout</a>
</div>
    </div>

 </body>
 </html>