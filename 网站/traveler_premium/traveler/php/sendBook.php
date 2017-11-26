<?php

// Replace this with your own email address
$to = 'joefrey.mahusay@gmail.com';

function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
}

if($_POST) {

   $name = trim(stripslashes($_POST['name']));
   $email = trim(stripslashes($_POST['email']));
   $activities = trim(stripslashes($_POST['activities']));
   $destination = trim(stripslashes($_POST['destination']));
   $date_start = trim(stripslashes($_POST['datestart']));

   
	if ($subject == '') { $subject = "Booking Trip Submission"; }

   // Set Message
   $message .= "Name: " . $name . "<br />";
	 $message .= "Email address: " . $email . "<br />";
   $message .= "Activities: " . $activities . "<br />";
   $message .= "Destination: " . $destination . "<br />";
   $message .= "Date Start: " . $date_start . "<br />";
   $message .= "<br /> ----- <br /> This email was sent from your site " . url() . " booking form. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   ini_set("sendmail_from", $to); // for windows server
   $mail = mail($to, $subject, $message, $headers);

	if ($mail) { echo "OK"; }
   else { echo "Something went wrong. Please try again."; }

}

?>