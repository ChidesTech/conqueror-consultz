<?php include ("./partials/sidebar.php")?>

<?php

       $id = $_GET["id"];
       $sql = "SELECT * FROM tbl_admin where id=$id ";
       $res = mysqli_query($conn, $sql);
        //Check whether Query is executed or not
        if($res==TRUE){
            // Count Rows to check if we have data in the database or not
            $count = mysqli_num_rows($res);  //To get all the rows n database
     


      if($count>0){
     
        while($rows= mysqli_fetch_assoc($res)){
         $fullname = $rows["fullname"];
         $username = $rows["username"];
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
        <h4 class="text-center mt-3 "  >Update Realtor</h4>
        <?php
        if(isset($_SESSION['admin'])){
       echo  $_SESSION['admin'];
       unset( $_SESSION['admin']);
         }
        ?>

        <div>
        <label  for="">Full Name</label>
        <input class="form-control mt-1" value="<?php echo $fullname;?>" required type="text"  name="fullname" placeholder="Enter Full Name"  >
        </div>
        <br>
        <div>
        <label  for="">Userame</label>
       <input class="form-control mt-1 " value="<?php echo $username?>"  required type="text"  name="username" placeholder="Enter Username"  >
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
     $fullname = mysqli_real_escape_string($conn,$_POST["fullname"]);
     $username = mysqli_real_escape_string($conn,$_POST["username"]);
     $id = $_POST["id"];

      //SQL Query 
    $sql2 = "UPDATE tbl_admin SET
     fullname = '$fullname',
     username = '$username'
     WHERE id=$id
      ";
//   Save in Database
$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
// ;
 
if($res2==TRUE){
  $_SESSION['admin'] = "<div class='alert alert-success p-2'>Admin Updated Successfully</div>";
  header("Location: ".SITEURL."admin/manage-admin.php");

}else{
    $_SESSION['admin'] = "<div class='alert alert-danger p-2'>Error in Updating Admin</div>";
    header("Location: ".SITEURL."admin/add-admin.php");
}
}
?>
