<?php include ("./partials/nav.php");


if(isset($_GET["id"])){

    $id = $_GET["id"];
    $sql = "SELECT * FROM tbl_property where id=$id";
    
    $res = mysqli_query($conn, $sql);
    if($res == true){
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        $title = $row["title"];
        $location = $row["location"];
        $description = $row["description"];
        $price = $row["price"];
        $room = $row["room"];
        $bath = $row["bath"];
        $type = $row["type"];
        $image1 = $row["image1"];
        $image2 = $row["image2"];
        $image3 = $row["image3"];
       
    
        if($count >0){
            ?>


        <section class="property-single-pg">
            <div class="container">
                <div class="property-hd-sec">
                    <div class="card">
                        <div class="card-body">
                            <a href="#">
                                <h3><?=$title?></h3>
                                <p ><i class="la la-map-marker"></i><?=$location?>
                                    </p> 
                                       
                            </a>
                            <form  style="display:inline" action="map.php" method="post">
                                <input hidden type="text" value="<?=$location?>" name="location">
                                <button class="btn btn-sm" type="submit" name="submit" style="display: inline; background:navy; color:white">Search On Map</button>
                                </form> 
                            <ul class="mt-3">
                                <li><?=$bath?> Bathrooms</li>
                                <li><?=$room?> Bedrooms</li>
                                <li>Area 555 Sq Ft</li>
                            </ul>
                        </div><!--card-body end-->
                        <div class="rate-info">
                            <h5>₦ <?=$price?></h5>
                            <span><?=$type?></span>
                        </div><!--rate-info end-->
                    </div><!--card end-->
                </div><!---property-hd-sec end-->
                <div class="property-single-page-content">
                    <div class="row">
                        <div class="col-lg-8 pl-0 pr-0">
                            <div class="property-pg-left">
                                <div class="property-imgs">
                                    <div class="property-main-img">
                                        <div class="property-img">
                                            <img src="./images/homes/<?=$image1?>" alt="">
                                        </div><!--property-img end-->
                                        <div class="property-img">
                                            <img src="./images/homes/<?=$image2?>" alt="">
                                        </div><!--property-img end-->
                                        <div class="property-img">
                                            <img src="./images/homes/<?=$image3?>" alt="">
                                        </div><!--property-img end-->
                                        <div class="property-img">
                                            <img src="./images/homes/<?=$image4?>" alt="">
                                        </div><!--property-img end-->
                                        <div class="property-img">
                                            <img src="./images/homes/<?=$image5?>" alt="">
                                        </div><!--property-img end-->
                                    </div><!--property-main-img end-->
                                    <div class="property-thumb-imgs">
                                        <div class="row thumb-carous">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 thumb-img">
                                                <div class="property-img">
                                                    <img src="./images/homes/<?=$image1?>" alt="">
                                                </div><!--property-img end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 thumb-img">
                                                <div class="property-img">
                                                    <img src="./images/homes/<?=$image2?>" alt="">
                                                </div><!--property-img end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 thumb-img">
                                                <div class="property-img">
                                                    <img src="./images/homes/<?=$image3?>" alt="">
                                                </div><!--property-img end-->
                                            </div>
                                            
                                        </div>
                                    </div><!--property-thumb-imgs end-->
                                </div><!--property-imgs end-->
                                <div class="descp-text">
                                    <h3>Description</h3>
                                       <p><?=$description?></p>
                                </div><!--descp-text end-->
                                
                                
                               
                                       

                                <div class="similar-listings-posts">
                                    <h3>Similar Listings</h3>
                                    <div class="list-products">
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
                                        <div class="card">
                                            <a href="property.php?id=<?=$id?>" title="">
                                                <div class="img-block">
                                                    <div class="overlay"></div>
                                                    <img src="images/homes/<?=$image1?>" alt="" alt="" class="img-fluid">
                                                    <div class="rate-info">
                                                        <h5><?php if($price != "TBD") {echo "₦".$price ;} else { echo "Price: TBD";} ?></h5>
                                                        <?php if($type != ""){?>
                               <span><?=$type?></span>
                               <?php
                                        }
                                        ?>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="card_bod_full">
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
                                                    <div class="crd-links">
                                                        <a href="#" class="pull-left">
                                                            <i class="la la-heart-o"></i>
                                                        </a>
                                                        <a href="#" class="plf">
                                                            <i class="la la-calendar-check-o"></i> <?=getTime($time)?>
                                                        </a>
                                                    </div><!--crd-links end-->
                                                    <a href="property.php?id=<?=$id?>" title="" class="btn-default">View Details</a>
                                                </div>
                                            </div><!--card_bod_full end-->
                                            <a href="property.php?id=<?=$id?>" title="" class="ext-link"></a>
                                        </div><!--card end-->

                                        <?php
        
    }
         

      }
    //   else{
    //   echo "<h4 class='p-2 alert alert-info text-center' style='width: 100%'>No Similar Properties</h4>";
    //   }
 }     
        ?>
      




                                    </div><!-- list-products end-->
                                </div><!--similar-listings-posts end-->
                            </div><!--property-pg-left end-->
                        </div>
                        <div class="col-lg-4 pr-0">
                            <div class="sidebar layout2">
                                <div class="widget widget-form">
                                    <h3 class="widget-title">Contact Listing Agent</h3>
                                    <div class="contct-info">
                                        <img src="assets/images/resources/user-img.png" alt="">
                                        <div class="contct-nf">
                                            <h3>Desmond Nwosu</h3>
                                            <h4>Chides Agency</h4>
                                            <span><i class="la la-phone"></i>+234 8141680547</span>
                                        </div>
                                    </div><!--contct-info end-->
                                    <div class="post-comment-sec">
                                        <form>
                                            <div class="form-field">
                                                <input type="text" name="name" placeholder="Your Name">
                                            </div><!--form-field end-->
                                            <div class="form-field">
                                                <input type="text" name="email" placeholder="Your Email">
                                            </div><!--form-field end-->
                                            <div class="form-field">
                                                <input type="text" name="phone" placeholder="Your Phone">
                                            </div><!--form-field end-->
                                            <div class="form-field">
                                                <textarea name="message" placeholder="Your Message"></textarea>
                                            </div><!--form-field end-->
                                            <button type="submit" class="btn2">Contact</button>
                                        </form>
                                    </div><!--post-comment-sec end-->
                                </div><!--widget-form end-->
                               
                                
                                <div class="widget widget-posts">
                                    <h3 class="widget-title">Popular Listings</h3>
                                    <ul>
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
                                        <li>
                                            <div class="wd-posts">
                                                <div class="ps-img">
                                                    <a href="property.php?id=<?=$id?>" title="">
                                                        <img style="height:5rem" src="images/homes/<?=$image1?>" alt="">
                                                    </a>
                                                </div><!--ps-img end-->
                                                <div class="ps-info">
                                                    <h3><a href="14_Blog_Open.html" title=""><?=$title?></a></h3>
                                                    <strong><?php if($price != "TBD") {echo "₦".$price ;} else { echo "Price: TBD";} ?></strong>
                                                    <span><i class="la la-map-marker"></i><?=$location?></span>
                                                </div><!--ps-info end-->
                                            </div><!--wd-posts end-->
                                        </li>
                                        <?php
        
    }
         

      }
    //   else{
    //   echo "<h4 class='p-2 alert alert-info text-center' style='width: 100%'>No Similar Properties</h4>";
    //   }
 }     
        ?>
      

                                    </ul>
                                </div><!--widget-posts end-->
                              
                            </div><!--sidebar end-->
                        </div>
                    </div>
                </div><!--property-single-page-content end-->
            </div>
        </section><!--property-single-pg end-->

       


    <?php
      




    }
     }
     else{
 
         header("location: 404.php");
       
 
     }
     
 
 
 
 
 
 
 
 }
 else{
 
     header("location: 404.php");
   
 
 }
 
 include ("./partials/footer.php");
 
 ?>