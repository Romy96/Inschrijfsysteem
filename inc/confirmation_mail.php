<?php

	date_default_timezone_set('Europe/Amsterdam');
	require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 2;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "ictambw@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "Studentje1";
	//Set who the message is to be sent from
	$mail->setFrom('ictambw@gmail.com', 'ICTA MBW');
	//Set an alternative reply-to address
	$mail->addReplyTo('ictambw@gmail.com', 'ICTA MBW');
	//Set who the message is to be sent to
	$mail->addAddress($Email);
	//Set the subject line
	$mail->Subject = 'Comfirmation registration';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML(file_get_contents('views/validate_account.html'), dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors

	if (!$mail->send()) {
		$_SESSION['errors'][] = "Mailer Error: " . $mail->ErrorInfo;
	} else {
		$_SESSION['errors'][] = "Message sent!";
	}


?>