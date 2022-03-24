<?php include ("./partials/sidebar.php")?>

  <style>
    .cover{
      height: 2.5rem;
      width: 3.5rem;
      
    }

    
  </style>
<h3 class="text-center" style="color:navy; text-shadow: 1px 1px 1px black">Properties</h3>
      
      


<div class="container-fluid " style="max-width:100%; margin-top:2rem">
<?php
        if(isset($_SESSION['home'])){
       echo  $_SESSION['home'];
        unset( $_SESSION['home']);
         }?>
<div class="card-group justify-content-center" >
 
 <table class="table table-striped ">
   
 
    <?php
        $sql = "SELECT * FROM tbl_property ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        ?>
          <tr style="color:navy; text-align:start; font-weight:bold; font-size:1.1rem" ><th>S.N</th>
          <th>Title</th><th>Cover</th><th>Rooms/Baths</th><th>Featured</th><th>Type</th>
     <th>
     <a href="add-property.php">
     <button style="background-color:navy; color:white" class="btn btn ">Add <i class="fa fa-plus"></i> </button>
    
    </a>
        </th>
    </tr>
        <?php
        while($rows= mysqli_fetch_assoc($res)){
          $id = $rows["id"];
          $title = $rows["title"];
          $location = $rows["location"];
          $description = $rows["description"];
          $room = $rows["room"];
          // $bed = $rows["bed"];
          $bath = $rows["bath"];
          $price = $rows["price"];
          $featured = $rows["featured"];
          $type = $rows["type"];
          $image1 = $rows["image1"];



          
          ?>
     

      <tr><td><?=$sn++."."?><td><?=$title?></td>
      <td><img class="cover"  src="../images/homes/<?=$image1?>" alt=""></td>
      <td><?=$room?>  / <?=$bath?></td>
      <td><?=ucfirst($featured)?></td><td><?=ucfirst($type)?></td>
   
   <td>
   <a href="<?php echo SITEURL?>property.php?id=<?php echo $id?>"><button style="padding: .25rem  .9rem" class="btn-sm  btn-info btn"><i class="fa fa-info"></i></button></a>
   <a href="<?php echo SITEURL?>admin/update-property.php?id=<?php echo $id?>"><button class="btn-sm btn-secondary btn"><i class="fa fa-edit"></i></button></a>
   <a href="<?php echo SITEURL?>admin/delete-property.php?id=<?php echo $id?>"> <button class="btn-sm btn  btn-danger"><i class="fa fa-trash"></i></button></a>
</td>
</tr>
<?php
        
      }
           
  
        }else{
        echo "<h6 class='p-2 alert alert-info' style='width: 100%'>No Property Added</h6>";
        echo '<a href="add-property.php">
        <button style="background-color:navy; color:white" class="btn btn-sm  p-2">Add Property  </button>
       
       </a>';
  
        }
  
          }
  
          
          ?>
 </table>

       
  </div>
</div>







    <?php
    include "./partials/footer.php"
    ?>
