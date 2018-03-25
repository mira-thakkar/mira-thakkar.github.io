<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['subject'])     ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
  echo "No arguments Provided!";
  return false;
   }
$name = $_POST['name'];
$subject = $_POST['subject'];
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ($email_address === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$message = $_POST['message'];
// Create the email and send the message
$to = 'mirathakkar94@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "mira-thakkar.github.io:  $subject";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\\nMessage:\n$message";
$headers = "From: no-reply@github.io.com";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Reply-To: $email_address";
$res = mail($to,$email_subject,$email_body,$headers);
return "Thanks!";
?>