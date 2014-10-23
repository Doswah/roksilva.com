<?php 
$errors = '';
$myemail = 'doswah@live.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$event_type = $_POST['event-type'];
$event_date = $_POST['event-date'];
$event_time = $_POST['event-time'];
$message = $_POST['message']; 



if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "CHEEZY Photobooth Inquiry from $name";
	$email_body = "You have received a new message. \n".
	" Here are the details:\n 
	Name: $name \n 
	Email: $email_address \n 
	Type of Event: $event_type \n
	Date of Event: $event_date\n
	Time of Event: $event_time\n
	Message: $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: cheezy-contact-confirm.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>