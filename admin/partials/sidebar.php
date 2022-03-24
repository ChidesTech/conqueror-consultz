<?php include("../config/constants.php");
 if(!isset($_SESSION['user'])){
       
    $_SESSION['login'] = "<div style='margin-bottom:-2rem'  class='alert-danger alert p-2 mt-1' >Unauthorized Access</div>";
    header("Location: ".SITEURL."admin/login.php");

      }
      
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="fontawesome/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo ASSETS?>all.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS?>admin.css">
    <link rel="stylesheet" href="<?php echo ASSETS?>dashboard.css">
</head>
<body>
    <input style="display:none;" type="checkbox" name="" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span  class="fas fa-home"></span> <span  style="font-size: 1.6rem">Conqueror Consultz </span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li >
                    <a class="active" href="<?php echo SITEURL?>"><span  class="fa fa-home"></span><span>Home</span></a></a>
                </li>
                <li >
                    <a class="active" href="<?php echo ADMIN?>index.php"><span  class="far fa-calendar-alt"></span><span>Dashboard</span></a></a>
                </li>
                <?php
                if (isset($_SESSION["rank"]) && $_SESSION["rank"] == "admin"){
                  ?>
                  <li>
                    <a href="<?=ADMIN?>manage-admin.php"><span  class="fa fa-users"></span><span>Realtors</span></a>
                </li>
                  <?php };?>


              
               
                <li>
                    <a href="<?php echo ADMIN?>manage-property.php"><span  class="fas fa-home"></span><span>Properties</span></a>
                </li>
                <!-- <li>
                    <a href="<?php echo ADMIN?>manage-land.php"><span  class="fas fa-map-marker-alt"></span><span>Lands</span></a>
                </li> -->
                <li>
                    <a href="<?php echo ADMIN?>manage-message.php"><span  class="fas fa-envelope"></span><span>Inbox</span></a>
                </li>
                <li>
                    <a href="<?php echo ADMIN?>account.php"><span  class="fas fa-cog"></span><span>Account</span></a>
                </li>
                 <li>
                    <a href="<?php echo ADMIN?>logout.php"><span class="fas fa-sign-out-alt"></span><span>Logout</span></a>
                </li>
                <!--<li>
                    <a href=""><span  class="far fa-clipboard"></span><span>Reservations</span></a>
                </li> -->
                
               
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">
                <h2>
                    <label for="nav-toggle">
                        <span  class="fa fa-bars"></span>
                    </label>
                 
                </h2>

               
            </div>
            <span  style="background: blue; color: orangered; padding: 4px 12px; border-radius: 20%; font-size: 1.4rem"><?=substr($_SESSION["username"], 0,1)?> </span> 

        </header>
<main style="padding-left: 0; padding-right:0">
