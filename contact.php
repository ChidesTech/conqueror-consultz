<?php include ("./partials/nav.php");

if(isset($_SESSION['message'])){
  echo  $_SESSION['message'];
   unset( $_SESSION['message']);
    }
?>

<div class="alert alert-success " role="alert">
      <strong>Message Sent Successfully</strong> You will receive a response soon via mail, whatsapp or call.
      <a href="#" title="" class="close-alert"><i class="la la-close"></i></a>
  </div>
<section class="pager-sec bfr">
            <div class="container">
                <div class="pager-sec-details">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="<?=SITEURL?>" title="">Home</a></li>
                        <li><span>Contact</span></li>
                    </ul>
                </div><!--pager-sec-details end-->
            </div>
        </section>


       
  <div class="contact-sec">
        	<div class="container">
        		<div class="contact-details-sec">
        			<div class="row">
        				<div class="col-lg-8 col-md-8 pl-0">
        					<div class="contact_form">
        						<h3>Contact</h3>
        						<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpu tate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>
        						<form class="js-ajax-form" method="post">
                                    <div class="form-group no-pt">
                                        <div class="missing-message">
                                            Populate Missing Fields
                                        </div>
                                        <div class="success-message">
                                            <i class="fa fa-check text-primary"></i> Thank you!. Your message is successfully sent...
                                        </div>
                                        <div class="error-message">Populate Missing Fields</div>
                                    </div><!--form-group end-->
                                    <div class="form-fieldss">
            							<div class="row">
            								<div class="col-lg-4 col-md-4 pl-0">
            									<div class="form-field">
            										<input type="text" name="name" placeholder="Your Name" id="name">
            									</div><!-- form-field end-->
            								</div>
            								<div class="col-lg-4 col-md-4">
            									<div class="form-field">
            										<input type="email" name="email" placeholder="Your Email" id="email">
            									</div><!-- form-field end-->
            								</div>
            								<div class="col-lg-4 col-md-4 pr-0">
            									<div class="form-field">
            										<input type="number" min="0" name="phone" placeholder="Your Phone">
            									</div><!-- form-field end-->
            								</div>
            								<div class="col-lg-12 col-md-12 pl-0 pr-0">
            									<div class="form-field">
            										<textarea name="message" placeholder="Your Message"></textarea>
            									</div><!-- form-field end-->
            								</div>
            								<div class="col-lg-12 col-md-12 pl-0">
            									<button name="submit" type="submit" class="btn-default submit">Send Message</button>
            								</div>
                                            
            							</div>
                                    </div><!--form-fieldss end-->
        						</form>
        					</div><!--contact_form end-->
        				</div>
        				<div class="col-lg-4 col-md-4 pr-0">
        					<div class="contact_info">
        						<h3>Contact Information</h3>
        						<ul class="cont_info">
        							<li><i class="la la-map-marker"></i> 46, Okpandu Street, Umuayom, Amenyi, Awka, Anambra State.</li>
        							<li><i class="la la-phone"></i> +2349038786863</li>
        							<li><i class="la la-envelope"></i><a href="mailto:info@conquerorconsultz.com" title="">info@conquerorconsultz.com</a></li>
        						</ul>
        						<ul class="social_links">
        							<li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
        							<li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>
        							<li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>
        						</ul>
        					</div><!--contact_info end-->
        				</div>
        			</div>
        		</div><!--contact-details-sec end-->
        	</div>
        </div><!--contact-sec end-->
  




<?php 
if(isset($_POST["submit"])){
    $name =mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
    $message = mysqli_real_escape_string($conn,$_POST["message"]);

    if($name!="" && $email!="" && $phone!="" && $message!="" ){

        $sql = "INSERT INTO tbl_message SET
        name = '$name',
        email = '$email',
        phone = $phone,
        message = '$message'
       
         ";
      //   Save in Database
      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      // ;
      
      if($res==TRUE){
      $_SESSION['message'] = '
      <script>
        $(".alert-success").addClass("active");
       </script>
      ';
      header("Location: contact.php");
      
      
      }else{
       $_SESSION['message'] = "<div class=' alert alert-danger p-2'>Error In Sending Message</div>";
       header("Location:".SITEURL."contact.php");

      }
       
     
      
          
      }
      
      else{
         $_SESSION["message"] = '
         <div class="alert alert-success alert-danger active" role="alert">
         <strong>Please Fill All Necessary Fields</strong> 
         <a href="#" title="" class="close-alert"><i class="la la-close"></i></a>
     </div>';
         header("Location: ".SITEURL."admin/add-property.php");
      }
      
      
      
      
      
          
          
}


















include ("./partials/footer.php")?>
