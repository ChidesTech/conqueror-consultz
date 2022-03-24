<?php
  include('../config/constants.php');
  if(isset($_GET['id'])){

 $id = $_GET["id"];

$sql = "DELETE FROM tbl_message where id=$id";


$res = mysqli_query($conn, $sql);

if($res == TRUE){

  $_SESSION['admin_message'] = "<div class='alert alert-success p-2'>Message Deleted Successfully</div>";
  header("Location: ".SITEURL."admin/manage-message.php");
}else{
    $_SESSION['admin_message'] = "<div  class='error'>Error in Deleting Message</div>";
    header("Location: ".SITEURL."admin/manage-message.php");
}

  }
else{
  $_SESSION['admin_message'] = "<div class='alert alert-danger p-2'>Unauthorized Access</div>";
  header("Location: ".SITEURL."admin/manage-message.php");
}


?>