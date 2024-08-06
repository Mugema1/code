<?php

@include 'config.php';
session_start();

if(isset($_POST['submit'])){
    // $name = mysqli_real_escape_string($conn, $_POST['name']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    // $cpass = md5($_POST['cpassword']);

    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' && user_type = '$user_type' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

       $row = mysqli_fetch_array($result);
       if($row['user_type'] == 'admin'){

        $_SESSION['admin_name'] = $row['name'];
        header('location:admin-page.php');
        

       }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:user-page.php');
    }else{
        echo "incorrect password or email!";
    }
}
       
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
           <h3>login now</h3> 

           <?php
           if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
           };

           ?>



           <input type="email" name="email" required placeholder="enter your email">
           <input type="password" name="password" required placeholder="enter your password">

           <select name="user_type" id="">
            <option value="user">user</option>
            <option value="admin">admin</option>
           </select>
           
           <input type="submit" name="submit" value="login now" class="form-btn">
           <p>don't have an account? <a href="register-form.php">register now</a></p>
        </form>
    </div>
</body>
</html>