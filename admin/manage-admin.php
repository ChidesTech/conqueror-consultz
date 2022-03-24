?>
<?php include ("./partials/sidebar.php");

if(isset($_SESSION["rank"]) &&  $_SESSION["rank"] == "admin"){
   ?>

<h3 class="text-center" style="color:navy; text-shadow: 1px 1px 1px black">Realtors</h3>
      
      


<div class="container-fluid " style="max-width:100%; margin-top:2rem">
<?php
        if(isset($_SESSION['admin'])){
       echo  $_SESSION['admin'];
        unset( $_SESSION['admin']);
         }?>
<div class="card-group justify-content-center" >
 
 <table class="table table-striped ">
   
 
    <?php
        $sql = "SELECT * FROM tbl_admin ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        ?>
          <tr style="color:navy; "><th>S.N</th><th>Email</th><th>Full Name</th><th>Username</th>
     <th>
     <a href="add-admin.php">
     <button style="background-color:navy; color:white" class="btn btn ">Add <i class="fa fa-plus"></i> </button>
    
    </a>
        </th>
    </tr>
        <?php
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $email = $rows["email"];
          $username = $rows["username"];
          $password = $rows["password"];
          $fullname = $rows["fullname"];
          ?>
     

      <tr><td><?=$sn++?><td><?=$email?></td><td><?=$fullname?></td><td><?=$username?></td>
   
   <td>
   <a href="<?php echo SITEURL?>admin/update-admin.php?id=<?php echo $id?>"><button class="btn-sm btn-secondary btn"><i class="fa fa-edit"></i></button></a>
   <a href="<?php echo SITEURL?>admin/delete-admin.php?id=<?php echo $id?>"> <button class="btn-sm btn  btn-danger"><i class="fa fa-trash"></i></button></a>
</td>
</tr>
<?php
        
      }
           
  
        }else{
        echo "<h6 class='p-2 alert alert-info' style='width: 100%'>No Realtor Added</h6>";
        echo '<a href="add-admin.php">
        <button style="background-color:navy; color:white" class="btn btn-sm p-2 ">Add Realtor </button>
       
       </a>';
  
        }
  
          }
  
          
          ?>
 </table>

       
  </div>
</div>



  <?php
}
else{
  header("Location: index.php");
}
?>




  








    <?php
    include "./partials/footer.php"
    ?>
