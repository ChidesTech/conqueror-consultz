<?php include ("./partials/nav.php");
(isset($_POST["prop_type"])) ? $prop_type = $_POST["prop_type"]: $prop_type = "";
(isset($_POST["type"])) ?  $type = $_POST["type"]:  $type ="";

(isset($_POST["location"])) ?   $location = $_POST["location"]: $location ="";

?>


  <!-- featured section starts  -->
  <section class="pager-sec bfr">
            <div class="container">
                <div class="pager-sec-details">
                    <h3>Listing</h3>
                    <ul>
                        <li><a href="#" title="">Home</a></li>
                        <li><span>Listing</span></li>
                    </ul>
                </div><!--pager-sec-details end-->
            </div>
        </section>


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
        $sql = "SELECT * FROM tbl_property WHERE location LIKE '%$location%' AND type LIKE '%$type%' AND prop_type LIKE '%$prop_type%'";
        echo $location;
        // echo $sql;
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
                                <div  class="img-block">
                                    <div style="height: 18rem" class="overlay"></div>
                                    <img style="height: 18rem ;object-fill:cover" src="images/homes/<?=$image1?>" alt="" class="img-fluid">
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
        echo "<h4 class='p-2 alert alert-info text-center' style='width: 100%'>No Property Found</h4>";
        }
   }     
          ?>
        










<?php include ("./partials/footer.php")?>
