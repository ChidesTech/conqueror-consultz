<?php include_once("./config/constants.php");?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<style>
   option{
       padding-left:1rem;
       border:none;
   }


   .button{
       color:orangered;
       transition: .4s ease-in-out;
   }
.button:hover{
    background: orangered;
    color:white;

}
   .location, select{
    font-size: 1.4rem;
    text-transform: none;
    margin:none;
    border:none;

    border-right:1px solid rgb(206, 203, 203);

   }
   .location{
    border-radius:3rem 0 0 3rem;
    font-size: 1.2rem;
    outline:none;

   }
   .location::placeholder{
   color:black;
   font-size: 1.3rem;
color: rgba(0, 0, 0, 0.8)
   }

   .buttons{
    border-radius: 0 6rem 6rem 0
       
   }


   .nav-link:hover{
       background: orangered;
   }

   .brand-name{
       font-size: 1.8rem;
   }
   @media (max-width:991px){
    
    select,.location, .buttons{
    border-radius:  5px !important;
    font-size: 1rem;

    }

    
    
  
  }
  @media (max-width:768px){


  .brand-name{
       font-size: 1.5rem;
   }
  }
  </style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Conqueror Consultz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/js/lib/slick/slick.css">
    <link rel="stylesheet" href="assets/js/lib/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/color.css">
    <link rel="stylesheet" type="text/css" href="assets/all.min.css">

</head>


<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <div class="wrapper">

      	<header>
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand" href="index.php">
                                    <!-- <img src="assets/images/logo.png" alt=""> -->
                                    <h1 class="brand-name" style="font-weight:bolder; color: orangered; text-shadow: 1px 0 1px navy;">Conqueror Consultz</h1>
                                </a>
                                <button class="menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                                    <span class="icon-spar"></span>
                                    <span class="icon-spar"></span>
                                    <span class="icon-spar"></span>
                                </button>

                                <div class="navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="index.php" >
                                            <i class="fa fa-home"></i>   HOME
                                            </a>
                                            
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="listing.php" >
                                            <i class="fa fa-list"></i>    LISTING
                                            </a>
                                            
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="about.php" >
                                             <i class="fa fa-info"></i>   ABOUT
                                            </a>
                                            
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="contact.php" >
                                            <i class="fa fa-phone"></i>    CONTACT
                                            </a>
                                            
                                        </li>
                                    </ul>
                                    <div class="d-inline my-2 my-lg-0">
                                        <ul class="navbar-nav">



                                        <?php if(isset($_SESSION["user"])){ ?>  
               
                <li class="nav-item submit-btn">
                                                <a href="<?php SITEURL?>admin/index.php" class="my-2 my-sm-0 nav-link sbmt-btn">
                                                    <i class="icon-plus"></i>
                                                    <span>User Dashboard</span>
                                                </a>
                                            </li>
                <?php
              }else{
                    ?>
                <li class="nav-item signin-btn">
                                                <a href="<?php SITEURL?>admin/login.php" class="nav-link">
                                                    <i class="la la-sign-in"></i>
                                                    <span><b class="signin-op">Sign in</span>
                                                </a>

                                            </li>


                <?php
              }
                ?>
                                           



                                            
                                        </ul>
                                    </div>
                                    <a href="#" title="" class="close-menu"><i class="la la-close"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header><!--header end-->

       

        <section class="form_sec">
            <h3 class="vis-hid">Invisible</h3>
            <div class="container">
            <form style="background: transparent; border:none; box-shadow:none" method="post" class="container" action="listing.php">
   <div class="row">
    <!-- <select class="col-lg-3 col-md-6 col-sm-12  form-group"  name="" id="">
    <option  disabled hidden selected value=""> Location </option>
    <option value="">Sale</option>
    <option value="">Rent</option>
    </select> -->
    <input  name="location" placeholder="Location" class="pl-2 col-lg-3 col-md-6 col-sm-12  form-group location" type="text">
    <select class="col-lg-3 col-md-6 col-sm-12  form-group" name="prop_type" id="">
    <option  disabled hidden selected value="">Property Type</option>
    <option value="land">Land</option>
    <option value="building">Building</option>
    </select>
    <select class="col-lg-3 col-md-6 col-sm-12  form-group" name="type" id="">
    <option  disabled hidden selected  value="">Purpose</option>
    <option value="sale">Sale</option>
    <option value="rent">Rent</option>
    </select>
   <button type="submit" style="border: none; "   class="col-lg-3 button col-md-6 col-sm-12 form-group buttons">
   <i style="font-weight:bold; font-size:1.4rem" class="fa fa-search"></i></button>
   </div>

   </form>

            </div>
        </section><!--form_sec end-->


        <style>
           .pager-sec-details h3, .pager-sec-details li span,.pager-sec-details li a {
          color: orangered !important;
            }

.text-warning{
  color: orangered !important;
}
            
        </style>