<?php
$to = 'andytzjsu@gmail.com';
function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
}
   $name = trim(stripslashes($_GET['name']));
   $email = trim(stripslashes($_GET['email']));
   $subject = trim(stripslashes($_GET['subject']));
   $contact_message = trim(stripslashes($_GET['message']));
	if ($subject == '') { $subject = "Contact Form Submission"; }
   // Set Message
   $message .= "Email from: " . $name . "<br />";
   // Set From: header
   $from =  $name . " <" . $email . ">";
   // Email Headers
	$headers = "From: " . $from . "\r\n";
   ini_set("sendmail_from", $to); // for windows server
   $mail = mail($to, $subject, $message, $headers);

	if ($mail) { echo "OK"; }
   else { echo "Something went wrong. Please try again."; }
?>