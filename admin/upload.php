<?php
    include "/partials/header.php";

	 	require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
try{
    $client = S3Client::factory([
        'credentials' => array(
        'key'    => "",
        'secret' => "",
        ),
        'region'  => 'ca-central-1',
        'version' => "latest"
    ]);
}
catch(Exception $e){
die("Error: ". $e->getMessage());
}

if(isset($_POST["submit"])){
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $author =  mysqli_real_escape_string($conn,$_POST["author"]);
    $description =  mysqli_real_escape_string($conn,$_POST["description"]);
    $price = $_POST["price"];
    $category =  mysqli_real_escape_string($conn,$_POST["category"]);

if(isset($_POST["featured"])){
  $featured = $_POST["featured"];
}else{
  $featured = "Yes";
    
}
 if(isset($_FILES['image'])){
		$file_name = $_FILES['image']['name'];   
	 	$temp_file_location = $_FILES['image']['tmp_name']; 
         $ext = strtolower(end(explode(".", $file_name)));
         $file_name = "book".uniqid("", true).".".$ext;
        //  $tmp = $_FILES["image"]["tmp_name"];
    	
            $result = $client->putObject(array(
	 		'Bucket' => '',
			 'Key'    => $file_name,
			 'SourceFile' => $temp_file_location,			
           'ACL'    => 'public-read'		
        ));
        $url =   $result->get('ObjectURL');


        $sql2 = "INSERT INTO tbl_book SET
        title = '$title',
        author = '$author',
        book_details = '$description',
        price = $price,
        image_name = '$url',
        category_id = $category,
        featured = '$featured'
  
      ";
  
      $res2 = mysqli_query($conn, $sql2);
  
      if($res2==true){
          $_SESSION["book"] = "<div class='success'>Book Added Successfully</div>";
          header("Location: ".SITEURL."admin/manage-book.php");
  
      }else{
          $_SESSION["book"] = "<div class='error'>Failed To Add Book</div>";
          header("Location: ".SITEURL."admin/manage-book.php");
  
  
      }
  }else{
      $_SESSION["book"] = "<div class='error'>Please Select An Image</div>";
      header("Location: ".SITEURL."admin/add-book.php");
  
  }


















 }





     
	 
?>
   <img src='<?php echo $url?>' alt="">

<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">         
	<input type="file" name="image" />
	<input type="submit"/>
</form>      
