<?php include ("./partials/header.php")?>

    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <style>
      
   option{
       padding-left:1rem;
       border:none;
   }


   .location, select{
    font-size: 1.2rem;
    text-transform: none;
    margin:none;

    border-right:1px solid rgb(206, 203, 203);

   }
   .location{
    border-radius:3rem 0 0 3rem;
    font-size: 1.2rem;
    outline:none;

   }
   .location::placeholder{
   color:black;
   font-size: 1.5rem;
color: rgba(0, 0, 0, 0.8)
   }

   .buttons{
    border-radius: 0 6rem 6rem 0;

       
   }


   .brand-name{
       font-size:1.6rem;
       color: orangered;
       text-shadow: 2px 0 2px navy;
       font-weight: bold;
   }

   .dropdown .nav-link{
       color:navy !important;
       /* text-decoration:underline !important; */
       color:orangered !important;
       border-radius:5% !important;
   }

  .dropdown .nav-link:hover{
       color:navy !important;
       /* text-decoration:underline !important; */
       background:orangered !important;
       border-radius:5% !important;
   }

   @media (max-width:991px){
    
    .location, select, .buttons{
    border-radius:  5px !important;
    font-size: 1rem;

    }
    .brand-name{
       font-size:1.4rem;
    
   }
    
   .location::placeholder{
   color:black;
   font-size: 1rem;
color: rgba(0, 0, 0, 0.8)
   }

   .nav-purple{
       background: navy !important;
   }
  
  }
   
  </style>

    <div class="wrapper">

        <header class="pb">

            <div class="header">
                <div class="container">
                    <div class="row">
                        <div   class="col-xl-12 nav-purple">
                            <nav    class="navbar fixed navbar-expand-lg navbar-light">
                                <a class="navbar-brand" href="<?=SITEURL?>">
                                    <!-- <img src="assets/images/logo2.png" alt=""> -->
                                   <h1 style=" letter-spacing: 2px; " class=" brand-name"><i class="fa fa-home"></i> Conqueror Consultz</h1 >
                                </a>
                                <button style="position:absolute; right:1%" class="menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                                    <span class="text-warning icon-spar"></span>
                                    <span class="text-warning icon-spar"></span>
                                    <span class="text-warning icon-spar"></span>
                                </button>

                                <div class="navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown active">
                                           <a class="nav-link " href=""><i class="fa fa-home"></i> HOME</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="<?=SITEURL?>listing.php" >
                                              <i class="fa fa-list"></i> LISTING
                                            </a>
                                           
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="<?=SITEURL?>about.php" >
                                               <i class="fa fa-info"></i> ABOUT
                                            </a>
                                           
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="<?=SITEURL?>contact.php" >
                                               <i class="fa fa-phone"></i> CONTACT
                                            </a>
                                           
                                        </li>
                                    </ul>
                                    <div class="d-inline my-2 my-lg-0">
                                        <ul class="navbar-nav">
                                        <?php if(isset($_SESSION["user"])){ ?>  
               
               <li class="nav-item submit-btn">
                                               <a style="border-color: gold" href="<?php SITEURL?>admin/index.php" class="my-2 my-sm-0 nav-link sbmt-btn">
                                                   <i class="text-warning icon-plus"></i>
                                                   <span class="text-warning">User Dashboard</span>
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

       

        <section class="banner hp2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-content">
                            <h1 style="color: orangered">Real Estate . Project Management . Education Consultation</h1>
                        </div>
                        
                        
   
   <form style="background: transparent; border:none; box-shadow:none" method="post" class="container" action="listing.php">
   <div class="row">
    <!-- <select class="col-lg-3 col-md-6 col-sm-12  form-group"  name="" id="">
    <option  disabled hidden selected value=""> Location </option>
    <option value="">Sale</option>
    <option value="">Rent</option>
    </select> -->
    <input name="location" placeholder="Location" class="pl-2 col-lg-3 col-md-6 col-sm-12  form-group location" type="text">
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
   <button type="submit" style="background:navy; color:white; border: 1px solid navy; border-left:none"   class="col-lg-3 col-md-6 col-sm-12 form-group buttons">
   <i style="font-weight:bold; font-size:1.4rem; color: orangered" class="fa fa-search"></i></button>
   </div>

   </form>

   


                           


                    </div>
                </div>
            </div>
        </section>


        <div class="alert alert-success" role="alert">
            <strong>Added to Favourites</strong> You can check your favourite items here <a href="#" class="alert-link">Favourite Items</a>.
            <a href="#" title="" class="close-alert"><i class="la la-close"></i></a>
        </div>

        <section class="explore-feature section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-heading">
                            <span>Explore Features</span>
                            <h3>Our Services</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4">
                        <a href="#" title="">
                            <div class="card">
                                <div class="card-body">
                                    <i class="text-warning icon-home"></i>
                                    <h3>Real Estate</h3>
                                    <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                    </p>
                                </div>
                            </div><!--card end-->
                        </a>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4">
                        <a href="#" title="">
                            <div class="card">
                                <div class="card-body">
                                    <i class="text-warning fa fa-tasks"></i>
                                    <h3>Project Management</h3>
                                    <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4">
                        <a href="#" title="">
                            <div class="card">
                                <div class="card-body">
                                    <i class="text-warning fas fa-book-reader"></i>
                                    <h3>Educational Consultation</h3>
                                    <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit conseat ipsum, nec sagittis sem nibh.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                   
                </div>
            </div>
        </section>

        


        <section class="popular-listing hp2 section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-heading">
                            <span>Discover</span>
                            <h3>Featured Listing</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                <?php
        $sql = "SELECT * FROM tbl_property where featured='yes'";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $title = $rows["title"];
          $location = $rows["location"];
          $time = $rows["time"];
          $description = $rows["description"];
          $room = $rows["room"];
          
          $bath = $rows["bath"];
          $price = $rows["price"];
          $featured = $rows["featured"];
          $type = $rows["type"];
          $image1 = $rows["image1"];
          ?>
     
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <a href="property.php?id=<?=$id?>" title="">
                                <div style="height: 18rem" class="img-block">
                                    <div class="overlay"></div>
                                    <img style="height: 18rem; object-fill:cover" src="images/homes/<?=$image1?>" alt="" class="img-fluid">
                                    <div class="rate-info">
                                        <h5> <?php if($price != "") {echo "₦".$price ;} else { echo "Price: TBD";} ?></h5>
                                        <?php if($type != ""){?>
                               <span><?=$type?></span>
                               <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="property.php?id=<?=$id?>" title="">
                                    <h3><?=$title?></h3>
                                    <p><i class="la la-map-marker"></i><?=$location?></p>
                                </a>
                                <ul>
                                    <li><?=$bath?> Bathrooms</li>
                                    <li><?=$room?> Beds</li>
                                    <li>Area 555 Sq Ft</li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <!-- <a href="#" class="pull-left">
                                    <i class="la la-heart-o"></i>
                                </a> -->
                                <a href="#" class="pull-right">
                                    <i class="la la-calendar-check-o"></i> <?=getTime($time)?></a>
                            </div>
                            <a href="property.php?id=<?=$id?>" title="" class="ext-link"></a>
                        </div>
                    </div>
                    <?php
        
      }
           
  
        }else{
        echo "<h4 class='p-2 alert alert-info text-center' style='width: 100%'>No Featured Property Added</h4>";
        }
   }     
          ?>

       
                    <div class="col-lg-12">
                        <div class="load-more-posts">
                            <a href="listing.php" title="" class="btn2">See All</a>
                        </div><!--load-more end-->
                    </div>
                </div>
            </div>
        </section>

        

       
        <section class="discover-propt">
            <div class="overlay-bg"></div>
            <div class="container">
                <div class="discover-text">
                    <h3>Discover the Best Properties</h3>
                    <p>Aenean sollicitudin, lorem quis bibendum aucto elit consequat ipsumas nec sagittis sem nibh id elit. Duis sed odio sit amet nibhulpu tate cursus a sit amet mauris. Morbi accumsan ipsum torquent.</p>
                    <a href="<?=SITEURL?>listing.php" class="btn btn-default">Get Started Now</a>
                </div><!--discover-text end-->
            </div>
        </section><!--discover-propt end-->

        <section class="popular-listing hp2 section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-heading">
                            <span>Discover</span>
                            <h3>All Listing</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                <?php
        $sql = "SELECT * FROM tbl_property";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $title = $rows["title"];
          $location = $rows["location"];
          $time = $rows["time"];
          $description = $rows["description"];
          $room = $rows["room"];
          
          $bath = $rows["bath"];
          $price = $rows["price"];
          $featured = $rows["featured"];
          $type = $rows["type"];
          $image1 = $rows["image1"];
          ?>
     
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <a href="property.php?id=<?=$id?>" title="">
                                <div style="height: 18rem" class="img-block">
                                    <div  class="overlay"></div>
                                    <img style="height: 18rem; object-fill:cover" src="images/homes/<?=$image1?>" alt="" class="img-fluid">
                                    <div class="rate-info">
                                        <h5> <?php if($price != "") {echo "₦".$price ;} else { echo "Price: TBD";} ?></h5>
                                        <?php if($type != ""){?>
                               <span><?=$type?></span>
                               <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="property.php?id=<?=$id?>" title="">
                                    <h3><?=$title?></h3>
                                    <p><i class="la la-map-marker"></i><?=$location?></p>
                                </a>
                                <ul>
                                    <li><?=$bath?> Bathrooms</li>
                                    <li><?=$room?> Beds</li>
                                    <li>Area 555 Sq Ft</li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <!-- <a href="#" class="pull-left">
                                    <i class="la la-heart-o"></i>
                                </a> -->
                                <a href="#" class="pull-right">
                                    <i class="la la-calendar-check-o"></i> <?=getTime($time)?></a>
                            </div>
                            <a href="property.php?id=<?=$id?>" title="" class="ext-link"></a>
                        </div>
                    </div>
                    <?php
        
      }
           
  
        }else{
        echo "<h4 class='p-2 alert alert-info text-center' style='width: 100%'>No Property Added</h4>";
        }
   }     
          ?>


<section class="testimonial-sec section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-heading">
                            <span>Clients Say</span>
                            <h3>Testimonials</h3>
                        </div>
                    </div>
                </div>
                <div class="testimonail-sect">
                    <div class="comment-carousel">
                        <div class="comment-info">
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elitco nsequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accum sanpsum velit. Nam nec tellus a odio tinci.</p>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="assets/images/resources/cm-img3.png" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <h3>Kritsofer Nolan</h3>
                                    <h4>Property Owner</h4>
                                </div>
                            </div><!--cm-info-sec end-->
                        </div><!--comment-info end-->
                        <div class="comment-info">
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elitco nsequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accum sanpsum velit. Nam nec tellus a odio tinci.</p>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="assets/images/resources/cm-img2.png" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <h3>Kritsofer Nolan</h3>
                                    <h4>Property Owner</h4>
                                </div>
                            </div><!--cm-info-sec end-->
                        </div><!--comment-info end-->
                        <div class="comment-info">
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elitco nsequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accum sanpsum velit. Nam nec tellus a odio tinci.</p>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="assets/images/resources/cm-img3.png" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <h3>Kritsofer Nolan</h3>
                                    <h4>Property Owner</h4>
                                </div>
                            </div><!--cm-info-sec end-->
                        </div><!--comment-info end-->
                        <div class="comment-info">
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elitco nsequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accum sanpsum velit. Nam nec tellus a odio tinci.</p>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="assets/images/resources/cm-img2.png" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <h3>Kritsofer Nolan</h3>
                                    <h4>Property Owner</h4>
                                </div>
                            </div><!--cm-info-sec end-->
                        </div><!--comment-info end-->
                        <div class="comment-info">
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elitco nsequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accum sanpsum velit. Nam nec tellus a odio tinci.</p>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="assets/images/resources/cm-img3.png" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <h3>Kritsofer Nolan</h3>
                                    <h4>Property Owner</h4>
                                </div>
                            </div><!--cm-info-sec end-->
                        </div><!--comment-info end-->
                        <div class="comment-info">
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elitco nsequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accum sanpsum velit. Nam nec tellus a odio tinci.</p>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="assets/images/resources/cm-img2.png" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <h3>Kritsofer Nolan</h3>
                                    <h4>Property Owner</h4>
                                </div>
                            </div><!--cm-info-sec end-->
                        </div><!--comment-info end-->
                    </div><!--comment-carousel end-->
                </div><!--testimonail-sect end-->
            </div>
        </section>





        

       
        <?php include ("./partials/footer.php")?>







    



</body>


</html>