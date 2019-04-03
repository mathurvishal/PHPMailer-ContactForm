<?php
$result="";
if (isset($_REQUEST['submit'])) {
	require 'phpmailer/PHPMailerAutoload.php';
	$CustomerEmail = $_REQUEST['email'];
	$CustomerName = trim($_REQUEST['name']);
	$CustomerSubject = trim($_REQUEST['subject']);
	$CustomerMessage = trim($_REQUEST['message']);
	$CustomerCity = trim($_REQUEST['city']);

	$mail = new PHPMailer;
	$mail->Host="smtp.doamin.com";
	$mail->Port="465";
	$mail->SMTPAuth="SSL";
	$mail->Username="admin@doamin.com";
	$mail->Password="Password@123";
	$mail->setFrom($CustomerEmail,$CustomerName);
	$mail->addAddress('admin@doamin.com');
	$mail->addReplyTo($CustomerEmail,$CustomerName);
	$mail->isHTML('true');
	$mail->Subject = 'Subject : '.$CustomerSubject.'';
	$mail->Body=
	"Name: ".$CustomerName.
	"<br>Email : ".$CustomerEmail.
	"<br>City: :".$CustomerCity.
	"<br>Message : ".$CustomerMessage.
	"";

	if (!$mail->Send()) {
		$result="Error";	}
		else
		{
			$result="Thanks for your message ".$CustomerName."<br> We'll answer you at -> ".$CustomerEmail." ASAP.";
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Contact Form</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

	<div id="page-wrap">

		<img src="images/title.gif" alt="A Nice &amp; Simple Contact Form" /><br /><br />
		<p><?= $result; ?></p>
				
		<div id="contact-area">
			
			<form method="post" action="index.php">
				<label for="Name">Name:</label>
				<input type="text" name="name" id="Name" />
				
				<label for="subject">Subject:</label>
				<input type="text" name="subject" id="subject" />

				<label for="City">City:</label>
				<input type="text" name="city" id="City" />
	
				<label for="Email">Email:</label>
				<input type="text" name="email" id="Email" />
				
				<label for="Message">Message:</label><br />
				<textarea name="message" rows="20" cols="20" id="Message"></textarea>

				<input type="submit" name="submit" value="Submit" class="submit-button" />
			</form>
			
			<div style="clear: both;"></div>
			
	</div>
	
	</div>

</body>

</html>