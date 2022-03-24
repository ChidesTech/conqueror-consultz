<?php 
include ("./partials/sidebar.php");

function get_value($key,$default=""){
   if(isset($_POST[$key])){
       return $_POST[$key];
   }
    return $default;
  }   
 
?>

   

    

<div class="container-fluid">
        <form action="" enctype="multipart/form-data" method="post">
<div class="pt-2 ps-3 pb-2 pe-3 mx-auto shadow rounded" style="width:100%; max-width:35rem; margin-top:0px; border:1px solid navy;">
<h4 class="text-center  "  >Add New Property</h4> 
<?php
        if(isset($_SESSION['home'])){
       echo  $_SESSION['home'];
        unset( $_SESSION['home']);
         }?>  

                  <input class="form-control mt-2" value="<?=get_value("title")?>"   type="text"  name="title" placeholder="Enter Title *"  >
                  <input class="form-control mt-2 "   type="text"  name="location" placeholder="Enter Location *"  >
                   <!-- <input class="form-control mt-2 "   type="email"  name="email" placeholder="Enter Email"  > -->
                 <textarea class="form-control mt-2" placeholder="Enter Description" name="description" id="" cols="30" rows="2"></textarea>
                   <div style="display: flex ; flex-direction:row; gap:.5rem">
                  <input class="form-control mt-2"   min="0" type="number"  name="room" placeholder="No. Of Bedrooms"  >
                  <input class="form-control mt-2"   min="0" type="number"  name="bath" placeholder="No. Of Baths"  >
                  
               </div>
                  <div style="display: flex ; flex-direction:row; gap:.5rem">

                  <input class="form-control mt-2"    type="text"  name="price" placeholder="Pricing"  >

                  </div>


                  <div style="display: flex;flex-direction: row; margin-top: .5rem; justify-content: space-around">
                  <!-- <div><input  type="radio" name="type" value="sale"> For Sale</div>
                  <div><input  type="radio" name="type" value="rent"> For Rent</div> -->
                  <select  class="form-control mt-2 me-1" name="type" id="">
                  <option value="">--- Select Type --</option>
                  <option value="sale">Sale</option>
                  <option value="rent">Rent</option>
                  </select>
                  <select class="form-control mt-2" name="prop_type" id="">
                  <option value="">--- Select Property Type ---</option>
                  <option value="land">Land</option>
                  <option value="building">Building</option>
                  </select>
                  <!-- <div><input  type="radio" name="type" value="both"> For Both</div> -->
                     </div>

                    <div style="display: flex;flex-direction: row; margin-top: .5rem; justify-content: space-around">
                  <div><input  type="radio" name="featured" value="yes"> Featured</div>
                  <div><input  type="radio" name="featured" value="no"> Not Featured</div>
                     </div>

                   

                  <div  class="alert alert-success p-1 mt-2 text-center">Cover Image</div>
                  <input class="form-control" style="margin-top:-.6rem"   type="file"  name="image1"   >

                  <div  class="alert alert-success p-1 mt-2 text-center">Other Images</div>
                  
                  <div  style="display: flex ; flex-direction:row; gap:.5rem; margin-top:-.6rem">
                  <input class="form-control mt-2"   type="file"  name="image2" placeholder="Enter image"  >
                  <input class="form-control mt-2"   type="file"  name="image3" placeholder="Enter image"  >
                  </div>
                 
           <input name="submit" value="Add" type="submit" style="background-color: navy;color: white;width: 100%;"
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
   //   ($_POST["bed"]!="")? $bed = $_POST["bed"]:$bed = 0;
     ($_POST["bath"]!="")? $bath = $_POST["bath"]:$bath = 0;
     ($_POST["price"]!="")? $price = $_POST["price"]:$price = "";
     (isset($_POST["featured"]))? $featured = $_POST["featured"]:$featured = "no";
     (isset($_POST["type"]))? $type = $_POST["type"]:$type = "";
     (isset($_POST["prop_type"]))? $prop_type = $_POST["prop_type"]:$prop_type = "";
      $time = getRealTime();
    



      
if ($title != "" AND $location !=""){
     function uploadImage($image_num){
      if(isset($_FILES[$image_num]["name"]) ){
         $image = $_FILES[$image_num]["name"];
         if($image!= ""){
         $ext = strtolower(end(explode(".", $image)));
          $image = "home".uniqid("", true).rand(0,99).".".$ext;
          $tmp = $_FILES[$image_num]["tmp_name"];
          $destination = "../images/homes/".$image;
          $upload = move_uploaded_file($tmp, $destination);
          if($upload == false ){
             $_SESSION["home"] = "<div class=' alert text-center alert-danger p-2'>Failed To Upload the Image</div>";
              header("Location: ".SITEURL."admin/add-property.php");
            die();
          }
         }
     }else{
      $_SESSION["home"] = "<div class='alert text-center alert-danger p-2'>Please Select An Image</div>";
      header("Location: ".SITEURL."admin/add-property.php");
   }
     return $image;
     }


  $image1 = uploadImage("image1");
   $image2 = uploadImage("image2");
    $image3 = uploadImage("image3");
   

     
     
  //SQL Query 
 if($image1){

  $sql = "INSERT INTO tbl_property SET
  title = '$title',
  location = '$location',
  time = '$time',
  description = '$description',
  room = $room,
  bath = $bath,
  featured = '$featured',
  type = '$type',
  prop_type = '$prop_type',
  image1 = '$image1',
  image2 = '$image2',
  image3 = '$image3',
  price = '$price'
   ";
//   Save in Database
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// ;

if($res==TRUE){
$_SESSION['home'] = "<div class='alert alert-success p-2'>Property Added Successfully</div>";
header("Location: manage-property.php");

}else{
 $_SESSION['home'] = "<div class=' alert alert-danger p-2'>Error In Adding Property</div>";
 header("Location: manage-property.php");
}
 }
else{
   $_SESSION["home"] = "<div class='alert text-center alert-danger p-2'>Please Select A Cover Image.</div>";
   header("Location: ".SITEURL."admin/add-property.php");

}

    
}else{
   $_SESSION["home"] = "<div class='alert text-center alert-danger p-2'>Please Fill All Necessary Fields.</div>";
   header("Location: ".SITEURL."admin/add-property.php");
}





    
    }
?>
