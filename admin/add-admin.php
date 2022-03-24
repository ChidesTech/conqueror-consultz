<?php 
include ("./partials/sidebar.php");?>

      

    

<div class="container-fluid">
        <form action="" method="post">
        
        <div class="p-3 mx-auto shadow rounded" style="width:100%; max-width:650px; margin-top:50px; border:1px solid navy;">
        <img src="<?=ROOT?>/images/logo.jpg" class="d-block mx-auto" style="width:90px" alt="">
        <h4 class="text-center mt-3 "  >Add Realtor</h4>
        <?php
        if(isset($_SESSION['admin'])){
       echo  $_SESSION['admin'];
       unset( $_SESSION['admin']);
         }
        ?>
                  <input class="form-control mt-3"  required type="text"  name="fullname" placeholder="Enter Full Name"  >
                  <input class="form-control mt-3 "  required type="text"  name="username" placeholder="Enter Username"  >
                   <input class="form-control mt-3 "  required type="email"  name="email" placeholder="Enter Email"  >
                  <input class="form-control mt-3"  required type="password"  name="password" placeholder="Enter Password"  >
                  
                  
           <input name="submit" value="Add" type="submit" style="background-color: navy;color: white;width: 100%;"
         class="p-2 mt-3 btn  button"  >
                 
                 
        </div>
        </form>
        
        </div>
   
       

<?php include "./partials/footer.php"?>
<?php 
    // FORM VALUATION;

    if(isset($_POST['submit'])){
     $fullname =mysqli_real_escape_string($conn,$_POST["fullname"]);
     $username = mysqli_real_escape_string($conn,$_POST["username"]);
     $email = mysqli_real_escape_string($conn,$_POST["email"]);
     $password = $_POST["password"];
      



     $sql = "SELECT * FROM tbl_admin WHERE email= '$email' ";

     $res = mysqli_query($conn, $sql);
 
     $count = mysqli_num_rows($res);
 
     if($count==1){
         $_SESSION['admin'] = "<div class=' text-center alert alert-danger p-2'>Email Already In Use</div>";
 
        header("Location: ".SITEURL."admin/add-admin.php");
         exit();
 
     }else{
      
  //SQL Query 
  $sql2 = "INSERT INTO tbl_admin SET
  fullname = '$fullname',
  username = '$username',
  email = '$email',
  password = '$password'
   ";
//   Save in Database
$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
// ;

if($res2==TRUE){
$_SESSION['admin'] = "<div class='alert alert-success p-2'>Admin Added Successfully</div>";
header("Location: manage-admin.php");

}else{
 $_SESSION['admin'] = "<div class=' alert alert-danger p-2'>Error in adding Admin</div>";
 header("Location: manage-admin.php");
}


     }
 





    
    }
?>
