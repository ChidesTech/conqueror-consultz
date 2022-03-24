<?php include ("./partials/sidebar.php")?>

<?php

       $id = $_SESSION["id"];
       $sql = "SELECT * FROM tbl_admin where id=$id ";
       $res = mysqli_query($conn, $sql);
        //Check whether Query is executed or not
        if($res==TRUE){
            // Count Rows to check if we have data in the database or not
            $count = mysqli_num_rows($res);  //To get all the rows n database
     


      if($count>0){
     
        while($rows= mysqli_fetch_assoc($res)){
         $username = $rows["username"];
         $prevPassword = $rows["password"];
        }
        

        if(isset($_SESSION['update-admin'])){
       echo  $_SESSION['update-admin'];
       unset( $_SESSION['update-admin']);
         }
        }
    }
        ?>
       
        <!-- <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Update Admin</h2>

            <form action=""  method="post" class="order">
               <fieldset>
                    <legend>Admin Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" value="<?php echo $fullname?>" name="full_name"  placeholder="Enter Full Name" class="input-responsive" required>
                    <div class="order-label">Username</div>
                    <input type="text" value="<?php echo $username?>" name="username" placeholder="Enter Username" class="input-responsive" required>
                    <div class="order-label">Password</div>
                    <input type="password"  name="password" placeholder="Enter Password" class="input-responsive" required>
           <input type="hidden" name="id"  value="<?php echo $id?>" >
                   

                   <input type="submit" name="submit" value="Update" class="btn ">
                </fieldset>

            </form>

        </div>
    </section>
       
       
        </div>
    </div> -->
    <div class="container-fluid">
        <form action="" method="post">
        
        <div class="p-3 mx-auto shadow rounded" style="width:100%; max-width:650px; margin-top:50px; border:1px solid navy;">
        <img src="<?=ROOT?>/images/logo.jpg" class="d-block mx-auto" style="width:90px" alt="">
        <h4 class="text-center mt-3 "  >Update Account</h4>
        <?php
        if(isset($_SESSION['admin'])){
       echo  $_SESSION['admin'];
       unset( $_SESSION['admin']);
         }
        ?>

        <div>
        <label  for="">Username</label>
       <input class="form-control mt-1 " value="<?php echo $username?>"  required type="text"  name="username" placeholder="Enter Username"  >
        </div>
        <div>
        <label class="mt-4"  for="">New Password</label>
       <input class="form-control mt-1 "    type="password"  name="password" placeholder="Enter Password"  >
        </div>
       
        <div>
        <label class="mt-4"  for="">Re-enter Password</label>
       <input class="form-control mt-1 "    type="password"  name="confirmPassword" placeholder="Re Enter Password"  >
        </div>
       
                  <!-- <input class="form-control mt-3"  required type="password"  name="password" placeholder="Enter Password"  > -->
                  
           <input type="hidden" name="id"  value="<?php echo $id?>" >
           <input name="submit" value="Update" type="submit" style="background-color: navy;color: white;width: 100%;"
         class="p-2 mt-3 btn  button"  >
                 
                 
        </div>
        </form>
        
        </div>
   


<?php include "./partials/footer.php"?>
<?php 
    // FORM VALUATION;

    if(isset($_POST['submit'])){
     
     $username = mysqli_real_escape_string($conn,$_POST["username"]);
     $id = $_POST["id"];
     $password = $_POST["password"];
     $confirmPassword = $_POST["confirmPassword"];
if($password == ""){
  $password = $prevPassword;
}
if($confirmPassword == ""){
  $confirmPassword = $prevPassword;
}
if($password != $confirmPassword ){
  $_SESSION['admin'] = "<div class='alert alert-danger p-2'>Passwords don't match.</div>";
  header("Location: ".SITEURL."admin/account.php");
}else{
    //SQL Query 
    $sql2 = "UPDATE tbl_admin SET
     username = '$username',
     password = '$password'
     WHERE id=$id
      ";
//   Save in Database
$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
// ;
 
if($res2==TRUE){
  $_SESSION['admin'] = "<div class='alert alert-success p-2'>Admin Updated Successfully</div>";
  header("Location: ".SITEURL."admin/account.php");

}else{
    $_SESSION['admin'] = "<div class='alert alert-danger p-2'>Error in Updating Admin</div>";
    header("Location: ".SITEURL."admin/account.php");
}

}
     
    


}
?>
