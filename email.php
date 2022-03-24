<?php
include('Mail.php'); // includes the PEAR Mail class, already on your server.

$username = 'dnwosu008@gmail.com'; // your email address
$password = 'iluvumum'; // your email address password

$from = "dnwosu008@gmail.com";
$to = "chidestechnologies@gmail.com";
$subject = "Hey Chides";
$body= "Hey Desmond Welcome to QServers.net Secure Mailing Platform.";

$headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject); // the email headers
$smtp = Mail::factory('smtp', array ('host' =>'localhost', 'auth' => true, 'username' => $username, 'password' => $password, 'port' => '25')); // SMTP protocol with the username and password of an existing email account in your hosting account
$mail = $smtp->send($to, $headers, $body); // sending the email

if (PEAR::isError($mail)){
echo("<p>" . $mail->getMessage() . "</p>");
}
else {
echo("<p>Message successfully sent!</p>");
// header("Location: http://www.example.com/"); // you can redirect page on successful submission.
}
?>