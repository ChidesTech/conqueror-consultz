<?php include ("/partials/sidebar.php")?>

  
<h3 class="text-center" style="color:navy; text-shadow: 1px 1px 1px black">Landed Properties</h3>
      
      


<div class="container-fluid " style="max-width:100%; margin-top:2rem">
<?php
        if(isset($_SESSION['land'])){
       echo  $_SESSION['land'];
        unset( $_SESSION['land']);
         }?>
<div class="card-group justify-content-center" >
 
 <table class="table table-striped ">
   
 
    <?php
        $sql = "SELECT * FROM tbl_land ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        ?>
          <tr style="color:navy; text-align:start; font-weight:bold; font-size:1.1rem" ><th>S.N</th>
          <th>Title</th><th>Cover</th><th>Location</th><th>Featured</th>
     <th>
     <a href="add-land.php">
     <button style="background-color:navy; color:white" class="btn btn ">Add <i class="fa fa-plus"></i> </button>
    
    </a>
        </th>
    </tr>
        <?php
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $title = $rows["title"];
          $location = $rows["location"];
          $cover = $rows["image1"];
         
          $price = $rows["price"];
          $featured = $rows["featured"];
         
          ?>
     

      <tr><td><?=$sn++."."?><td><?=$title?></td>
      <td><img style="height: 2.5rem; width:3.5rem;" src="../images/lands/<?=$cover?>" alt=""> </td>
      <td><?=$location?></td><td><?=ucfirst($featured)?></td>
   
   <td>
   <a href="<?php echo SITEURL?>land.php?id=<?php echo $id?>"><button style="padding: .25rem  .9rem" class="btn-sm  btn-info btn"><i class="fa fa-info"></i></button></a>
   <a href="<?php echo SITEURL?>admin/update-land.php?id=<?php echo $id?>"><button class="btn-sm btn-secondary btn"><i class="fa fa-edit"></i></button></a>
   <a href="<?php echo SITEURL?>admin/delete-land.php?id=<?php echo $id?>"> <button class="btn-sm btn  btn-danger"><i class="fa fa-trash"></i></button></a>
</td>
</tr>
<?php
        
      }
           
  
        }else{
        echo "<h5 class='p-2 alert alert-info' style='width: 100%'>No Land Added</h5>";
        echo '<a href="add-land.php">
        <button style="background-color:navy; color:white" class="btn btn ">Add Land <i class="fa fa-plus"></i> </button>
       
       </a>';
  
        }
  
          }
  
          
          ?>
 </table>

       
  </div>
</div>







    <?php
    include "/partials/footer.php"
    ?>
