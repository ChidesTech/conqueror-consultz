<?php
  include('../config/constants.php');
  if(isset($_GET['id'])){

 $id = $_GET["id"];

$sql = "DELETE FROM tbl_admin where id=$id";


$res = mysqli_query($conn, $sql);

if($res == TRUE){

  $_SESSION['admin'] = "<div class='alert alert-success p-2'>Admin Deleted Successfully</div>";
  header("Location: ".SITEURL."admin/manage-admin.php");
}else{
    $_SESSION['admin'] = "<div  class='error'>Error in Deleting Admin</div>";
    header("Location: ".SITEURL."admin/manage-admin.php");
}

  }
else{
  $_SESSION['admin'] = "<div class='alert alert-danger p-2'>Unauthorized Access</div>";
  header("Location: ".SITEURL."admin/manage-admin.php");
}


?>