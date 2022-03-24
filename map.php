<?php 
  include ("./partials/nav.php");

if(isset($_POST["submit"])){
    $location = $_POST["location"];
    ?>
    <iframe src="https://maps.google.com/maps?q=<?=$location?>&output=embed" width="100%"  height="1000" frameborder="0">     </iframe>

    <?php
}

 include ("./partials/footer.php");
 
 ?>