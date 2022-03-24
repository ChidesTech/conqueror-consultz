<?php

include('../config/constants.php');

if(isset($_GET['id']) 

){
    $id = $_GET["id"];
    $sql = "SELECT * FROM tbl_property WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $current_image1 = $row["image1"];
    $current_image2 = $row["image2"];
    $current_image3 = $row["image3"];
    
    $featured = $row["featured"];


   function deleteImage($image){
     $image_name = $image;
     $path = "../images/homes/".$image_name;
     $remove = unlink($path);
    }

    deleteImage($current_image1);
    deleteImage($current_image2);
    deleteImage($current_image3);
    
    

    $sql = "DELETE FROM tbl_property where id=$id";
   
    // Execute Query
    
    $res = mysqli_query($conn, $sql);
    
    if($res == TRUE){
      //Session Variable to display Message
      $_SESSION['home'] = "<div class='p-2 alert alert-success'>Property Deleted Successfully</div>";
      header("Location: ".SITEURL."admin/manage-property.php");
    }else{
        $_SESSION['home'] = "<div  class='p-2 alert alert-danger'>Error In Deleting Property</div>";
        header("Location: ".SITEURL."admin/manage-property.php");
    }


}else{
    $_SESSION['home'] = "<div  class='error'>Unauthorized Access</div>";
    header("Location: ".SITEURL."admin/manage-property.php");
}




?>