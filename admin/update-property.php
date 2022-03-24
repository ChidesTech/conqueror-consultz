<?php 
include ("./partials/sidebar.php");?>
<?php
if(isset($_GET["id"])

 ){
    $id = $_GET["id"];
   

    $sql = "SELECT * FROM tbl_property WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $title = $row["title"];
    $location = $row["location"];
    $description = $row["description"];
    $price = $row["price"];
    $room = $row["room"];
    $bath = $row["bath"];
    $type = $row["type"];
    $prop_type = $row["prop_type"];
    $current_image1 = $row["image1"];
    $current_image2 = $row["image2"];
    $current_image3 = $row["image3"];
    $current_image4 = $row["image4"];
    $current_image5 = $row["image5"];
    $current_image6 = $row["image6"];
    $current_image7 = $row["image7"];
    $featured = $row["featured"];

}else{
    $_SESSION["book"] = "<div class='error'>Unauthorized Access</div>";
    header("Location: ".SITEURL."admin/manage-book.php");
}
?>
      

    

<div class="container-fluid">
        <form action="" enctype="multipart/form-data" method="post">
<div class="pt-2 ps-3 pb-2 pe-3 mx-auto shadow rounded" style="width:100%; max-width:35rem; margin-top:0px; border:1px solid navy;">
<img src="<?=ROOT?>/images/logo.jpg" class="d-block mx-auto" style="width:90px" alt="">
<h4 class="text-center  "  >Update Property</h4>   

                  <input class="form-control mt-2" value="<?=$title?>"  type="text"  name="title" placeholder="Enter Title"  >
                  <input class="form-control mt-2 " value="<?=$location?>"    type="text"  name="location" placeholder="Enter Location"  >
                   <!-- <input class="form-control mt-2 " value=""    type="email"  name="email" placeholder="Enter Email"  > -->
                 <textarea class="form-control mt-2"   placeholder="Enter Description" name="description" id="" cols="30" rows="2"><?=$description?></textarea>
                   <div style="display: flex ; flex-direction:row; gap:.5rem">
                  <input class="form-control mt-2"  value="<?=$room?>"   min="0" type="number"  name="room" placeholder="No. Of Rooms"  >
                  <input class="form-control mt-2"  value="<?=$bath?>"   min="0" type="number"  name="bath" placeholder="No. Of Baths"  >
                  
                </div>
                  <div style="display: flex ; flex-direction:row; gap:.5rem">
                  <input class="form-control mt-2"  value="<?=$price?>"    type="text"  name="price" placeholder="Pricing"  >
                  
                </div>


                  <div style="display: flex;flex-direction: row; margin-top: .5rem; justify-content: space-around">
                  <select class="form-control mt-2" name="type" id="">
                 <option  <?php if($type==""){echo "selected"; }?> value=""> --- Choose Type ---</option>
                 <option  <?php if($type=="sale"){echo "selected"; }?> value="sale"> For Sale</option>
                 <option  <?php if($type=="rent"){echo "selected"; }?> value="rent"> For Rent</option>
                  </select>
                  <select class="form-control mt-2" name="prop_type" id="">
                 <option  <?php if($prop_type==""){echo "selected"; }?> value=""> --- Choose Property Type ---</option>
                 <option  <?php if($prop_type=="land"){echo "selected"; }?> value="land">Land</option>
                 <option  <?php if($prop_type=="building"){echo "selected"; }?> value="building"> Building</option>
                  </select>
                     </div>

                    <div style="display: flex;flex-direction: row; margin-top: .5rem; justify-content: space-around">
                  <div><input  type="radio" name="featured" <?php if($featured=="yes"){echo "checked"; }?> value="yes"> Featured</div>
                  <div><input  type="radio" name="featured" <?php if($featured=="no"){echo "checked"; }?> value="no"> Not Featured</div>
                     </div>

                   <div class="alert text-center alert-success p-1">Cover Image</div>
                  <input class="form-control " style="margin-top: -.6rem"   type="file"  name="image1"   >

                  <div class="alert text-center alert-success p-1 mt-3">Other Images</div>
                  
                  
                  <div  style="display: flex ; flex-direction:row; gap:.5rem; margin-top:-.6rem">
                  <input class="form-control mt-2"   type="file"  name="image2" placeholder="Enter image"  >
                  <input class="form-control mt-2"   type="file"  name="image3" placeholder="Enter image"  >
                  </div>
                  
                 

                  
                  
                  
           <input name="submit" value="Update" type="submit" style="background-color: navy;color: white;width: 100%;"
         class="p-2 mt-2 btn  button"  >
                 
                 
        </div>
        </form>
        
        </div>
   
       

<?php include "./partials/footer.php"?>
<?php 
    // FORM VALUATION;

    if(isset($_POST['submit'])){
     $title =mysqli_real_escape_string($conn,$_POST["title"]);
     $location = mysqli_real_escape_string($conn,$_POST["location"]);
     ($_POST["description"] != "")? $description = mysqli_real_escape_string($conn,$_POST["description"]):$description = "Property Description";
     ($_POST["room"]!="")? $room = $_POST["room"]:$room = 0;
     ($_POST["bath"]!="")? $bath = $_POST["bath"]:$bath = 0;
     ($_POST["price"]!="")? $price = $_POST["price"]:$price = "";
     (isset($_POST["featured"]))? $featured = $_POST["featured"]:$featured = "";
     (isset($_POST["type"]))? $type = $_POST["type"]:$type = "";
     (isset($_POST["prop_type"]))? $prop_type = $_POST["prop_type"]:$prop_type = "";
    
     function updateImage($image_num, $current_image_num){
        if(isset($_FILES[$image_num]["name"]) ){
           $image = $_FILES[$image_num]["name"];
           if($image!= ""){
           $ext = strtolower(end(explode(".", $image)));
            $image = "home".uniqid("", true).rand(0,99).".".$ext;
            $tmp = $_FILES[$image_num]["tmp_name"];
            $destination = "../images/homes/".$image;
            $upload = move_uploaded_file($tmp, $destination);
            $path = "../images/homes/".$current_image_num;
            $remove = unlink($path);
            if($upload == false ){
               $_SESSION["home"] = "<div class=' alert text-center alert-danger p-2'>Failed To Upload the Image</div>";
                header("Location: ".SITEURL."admin/add-property.php");
              die();
            }
           }else{
       $image = $current_image_num;

           }
       }else{
       $image = $current_image_num;
     }
       return $image;
       }
    $image1 = updateImage("image1", $current_image1);
     $image2 = updateImage("image2", $current_image2);
      $image3 = updateImage("image3", $current_image3);
     
  
     
  //SQL Query 
  $sql = "UPDATE tbl_property SET
  title = '$title',
  location = '$location',
  description = '$description',
  room = $room,
  bath = $bath,
  featured = '$featured',
  type = '$type',
  prop_type = '$prop_type',
  price = '$price',
  image1 = '$image1',
  image2 = '$image2',
  image3 = '$image3'
  WHERE id=$id
   ";
//   Save in Database
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// ;

if($res==TRUE){
$_SESSION['home'] = "<div class='alert alert-success p-2'>Property Updated Successfully</div>";
header("Location: manage-property.php");

}else{
 $_SESSION['home'] = "<div class=' alert alert-danger p-2'>Error In Updating Property</div>";
 header("Location: manage-property.php");
}


    
 





    
    }
?>
