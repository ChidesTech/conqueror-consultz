
<?php include ("./partials/sidebar.php");

   ?>

<style>
    li span:first-child{
        font-weight:bolder !important;
    }
    li span:last-child{
        font-weight:300 !important;
    }
   
</style>


<h4 class="text-center" style="color:navy; text-shadow: 1px 1px 1px black">Messages</h4>
<div class="container-fluid " style="max-width:100%; margin-top:2rem">


<?php
if(isset($_SESSION['admin_message'])){
  echo  $_SESSION['admin_message'];
   unset( $_SESSION['admin_message']);
    }

        $sql = "SELECT * FROM tbl_message ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){

        ?>

          
        <?php
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $name = $rows["name"];
          $email = $rows["email"];
          $phone = $rows["phone"];
          $message = $rows["message"];
         
          ?>
<div class="card" style="width:100%">
     
     <div class="card-body">
    <h6 class="card-title"><span style="text-shadow: 1px 0 0 black; color: navy">Name :</span>  <?=$name?></h6>
    <h6 class="card-title mb-2"><span style="text-shadow: 1px 0 0 black; color: navy">Email :</span> <?=$email?></h6>
    <h6 class="card-title mb-3"><span style="text-shadow: 1px 0 0 black; color: navy">Contact :</span> 0<?=$phone?></h6>
    <p class="card-text"><span style="text-shadow: 1px 0 0 black; color: navy">Message :</span> <?=$message?></p>
    <a href="mailto:<?=$email?>" style="background-color: red; color:white" class="card-link btn "><i class="fa fa-envelope"></i></a>
    <a href="https://wa.me/message/+234<?=$phone?>" style="background-color: green; color:white" class="card-link btn "><i class="fab fa-whatsapp"></i></a>
    <a href="<?php echo SITEURL?>admin/delete-message.php?id=<?php echo $id?>" style="float:right;" class="card-link btn btn-danger"><i class="fa fa-trash-alt"></i></a>
</div>
</div>

     
<?php
        
      }
           
  
        }else{
        echo "<h6 class='p-2 alert alert-info' style='width: 100%'>No Message In Inbox</h6>";
        
        
  
        }
  
          }
  
          
          ?>


        </div>






    <?php
    include "./partials/footer.php"
    ?>
