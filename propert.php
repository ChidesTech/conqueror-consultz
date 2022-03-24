
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
        $price = $row["price"];
        $room = $row["room"];
        $type = $row["type"];
        $image1 = $row["image1"];
        $image2 = $row["image2"];
        $image3 = $row["image3"];
        $image4 = $row["image4"];
        $image5 = $row["image5"];
    
        if($count >0){
            ?>


<body>
        
    <div class="jumbotron">
     <h1 class="text-center"><?=$title?></h1>
     <h3><?=$location?></h3>
    </div>
    <div class="details">

    <div class="cover">
    <img  src="./images/homes/<?=$image1?>" alt="">
    </div>
   <div class="info">
       <div>
           <h3><strong>Price:</strong>  <?php if($price != "") {echo "₦".$price ;} else { echo "Price: TBD";} ?></h3>
           <h3><strong>Number Of Bedrooms:</strong>  <?=$room?></h3>
           <h3><strong>Number Of Bathrooms:</strong>  7</h3>
           
       </div>
       <div>
       <h3><strong>Sale Type:</strong> For  <?=$type?></h3>
       <h3><strong>Location:</strong>  <?=$location?></h3>
       <h3><strong>City:</strong>  Awka</h3>
       </div>
   </div>
   
   <h3 style="padding: 0 5%;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste minima facilis eos dolor, temporibus unde optio aperiam nemo expedita ipsam reiciendis fugiat enim placeat! Ipsam, laudantium! Cupiditate, delectus impedit mollitia accusantium dolore similique architecto dolorem.</h3>
 <h2 style="color: navy; text-shadow: 1px 1px 1px black" class="text-center mb-5 mt-5">Other Images</h2>
   
   <div class="image-group">
  <?php if($image2 != ""){ ?> <img src="./images/homes/<?=$image2?>" alt="">  <?php }; ?>
  <?php if($image3 != ""){ ?> <img src="./images/homes/<?=$image3?>" alt="">  <?php }; ?>
  <?php if($image4 != ""){ ?> <img src="./images/homes/<?=$image4?>" alt="">  <?php }; ?>
  <?php if($image5 != ""){ ?> <img src="./images/homes/<?=$image5?>" alt="">  <?php }; ?>
 
  
</div>
</div>

</body>

















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




