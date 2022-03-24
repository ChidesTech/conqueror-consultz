<?php
  include('../config/constants.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chides Estate</title>

    <!-- font awesome cdn link  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->

    <!-- custom css file link  -->
   
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/js/lib/slick/slick.css">
    <link rel="stylesheet" href="assets/js/lib/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/color.css">

   

</head>
<style>
 html{
     font-size: 100%;
 }
</style>
<body  
 style="background: white; background-size: cover;
    background-position: center;" 
    >
      

       

        

    
         <div style="margin-top:-3rem" class="popup" id="sign-popup">
            <h3>Sign In to your Account</h3>
            <?php if(isset($_SESSION['login'])){
    echo  $_SESSION['login'];
    unset( $_SESSION['login']);
        }?>

            <div class="popup-form">
           
                <form method="post">
                    <div class="form-field">
                        <input type="email" name="email" placeholder="email">
                    </div>
                    <div class="form-field">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-cp">
                        <div class="form-field">
                            <!-- <div class="input-field">
                                <input type="checkbox" name="ccc" id="cc1">
                                <label for="cc1">
                                    <span></span>
                                    <small>Remember me</small>
                                </label>
                            </div> -->
                        </div>
                        <a href="#" title="">Forgot Password?</a>
                    </div><!--form-cp end-->
                    <button style="background:indigo" type="submit" name="submit" class="btn2">Sign In</button>
                </form>
                <!-- <a href="#" title="" class="fb-btn"> <i class="fa fa-facebook"></i>Sign In With Facebook</a> -->
            </div>
        </div><!--popup end-->
    </body>

    

    
</html>

<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password =  $_POST["password"];
   
    $sql = "SELECT * FROM tbl_admin WHERE email= '$email' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    if($count==1){
        $_SESSION['user'] = $row["email"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['username'] = $row["username"];
        $_SESSION['rank'] = $row["rank"];
        $_SESSION['id'] = $row["id"];

       header("Location: ".SITEURL."admin/index.php");
    }else{
       $_SESSION['login'] = "<div style='margin-bottom:-2rem'  class='alert-danger alert p-2 mt-1' >Invalid Login Credentials</div>";
       header("Location: ".SITEURL."admin/login.php");

    }

}


?>