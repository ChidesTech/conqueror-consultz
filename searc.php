<?php include ("./partials/nav.php");
(isset($_POST["sale_rent"])) ? $sale_rent = $_POST["sale_rent"]: $sale_rent = "";
(isset($_POST["house_land"])) ?  $house_land = $_POST["house_land"]:  $house_land ="";
(isset($_POST["room"])) ?  $room = $_POST["room"]: $room ="";
(isset($_POST["bath"])) ?   $bath = $_POST["bath"]: $bath ="";
(isset($_POST["location"])) ?   $location = $_POST["location"]: $location ="";
?>


  <!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>Result</span> </h1>
    <?php
    if($house_land == "tbl_property" ){?>

<div class="box-container">

    <?php
    $sql = "SELECT * FROM tbl_property WHERE type LIKE '%$sale_rent%' AND room LIKE '%$room%' AND bath LIKE '%$bath%' AND location LIKE '%$location%' ";
        //  echo $sql;
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $title = $rows["title"];
          $location = $rows["location"];
          $description = $rows["description"];
          $room = $rows["room"];
          $bed = $rows["bed"];
          $bath = $rows["bath"];
          $price = $rows["price"];
          $featured = $rows["featured"];
          $type = $rows["type"];
          $image1 = $rows["image1"];
          $time = $rows["time"];

          ?>
     
     <div class="box">
            <div class="image-container">
                <img src="images/homes/<?=$image1?>" alt="">
                <div class="info">
                     <h3><?=getTime($time)?></h3>
                    <h3>For <?=$type?></h3>
                </div>
                <div class="icons">
                    <a href="#" class="fas fa-film"><h3>1</h3></a>
                    <a href="#" class="fas fa-camera"><h3>4</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>
                        <?php if($price != "") {echo "₦".$price ;} else { echo "Price: TBD";} ?></h3>
                    <a href="wishlist.php?id=<?=$id?>" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                </div>
                <div class="location">
                    <h3><?=$title?></h3>
                    <p><?=$location?></p>
                </div>
                <div class="details">
                    <!-- <h3> <i class="fas fa-expand"></i> <?=$room?> rooms </h3> -->
                    <h3> <i class="fas fa-bed"></i> <?=$room?> bedrooms </h3>
                    <h3> <i class="fas fa-bath"></i> <?=$bath?> baths </h3>
                </div>
                <div class="buttons">
                    <a href="#" class="p-3 btn">Request Info</a>
                    <a style="background:navy; color: white" href="property.php?id=<?=$id?>" class="p-3 btn">View Details</a>
                </div>
            </div>
        </div>


    
<?php
        
      }
          
  
        }else{
        echo "<h4 class='p-2 alert alert-info text-center' style='width: 100%'>No Result Found</h4>";
       
  
        }
  
          }
  
          
          ?>


        
    </div>



    
<?php
    }
    ?>
<?php
    if($house_land == "tbl_land" ){ ?>
<div class="box-container">
    <?php
        $sql = "SELECT * FROM tbl_land where location LIKE '%$location%' ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $title = $rows["title"];
          $location = $rows["location"];
          $description = $rows["description"];
          $price = $rows["price"];
          $featured = $rows["featured"];
          $image1 = $rows["image1"];
          $time = $rows["time"];

          ?>
      <div class="box">
            <div class="image-container">
                <img src="images/lands/<?=$image1?>" alt="">
                <div class="info">
                </h3>
                    <!-- <h3>for rent</h3> -->
                    <h3><?=getTime($time)?></h3>

                </div>
                <div class="icons">
                    <a href="#" class="fas fa-film"><h3>1</h3></a>
                    <a href="#" class="fas fa-camera"><h3>4</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3> <?php if($price != "") {echo "₦".$price ;} else { echo "Price: TBD";} ?></h3>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                </div>
                <div class="location">
                    <h3><?= $title?></h3>
                    <p><?= $location?></p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i> 300 sqft </h3>
                    <!-- <h3> <i class="fas fa-bed"></i> 3 beds </h3>
                    <h3> <i class="fas fa-bath"></i> 5 baths </h3> -->
                </div>
                <div class="buttons">
                    <a href="#" class=" p-3 btn">Request Info</a>
                    <a style="background:navy; color: white" href="land.php?id=<?=$id?>" class="p-3 btn">View Details</a>
                </div>
            </div>
        </div>


    
<?php
        
      }
           
  
        }else{
        echo "<h4 class='p-2 alert text-center alert-info' style='width: 100%'>No Result Found</h4>";
       
  
        }
  
          }
  
          
          ?>
    
    </div>

    <?php } ?>

    
    
</section>



















<!-- javascript part  -->
<!-- <script>

let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    navbar.classList.toggle('active');
    menu.classList.toggle('fa-times');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    menu.classList.remove('fa-times');
}

</script> -->
<script>

    $(document).ready(()=>{
      $(".counter").counterUp({
        delay:12,
        time:1200
      })
    })
  </script>
  

<?php include ("./partials/footer.php")?>
