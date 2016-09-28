<?php
	require 'inc/functions.php';

	// register_action needs to do these steps:
	
	// 1) check no submit was done ($_POST) -> redirect to register.php with errormessage
	if ( ! isset ($_POST['submit']) )
	{
		session_start();
		$_SESSION['errors'][] = "U moet wel iets invullen.";
		header('Location: register.php');
		exit;
	}

	// 2) check the submitted values. if complete, then continue; if incomplete or errors then 
	// show the form again and show old input
	$Email = $_POST['InputEmail'];
	$Password = md5($_POST['pwd']);
	if ( IsNullOrEmptyString($Email) )
	{
		$_SESSION['errors'][] = 'Email is leeg.';
	}
	else
	{
		$errors = '';
		$dbc = mysqli_connect('mysql.hostinger.nl', 'u619986482_user', 'Waterman1', 'u619986482_db');
		if ( $dbc )
		{
			$sql = "SELECT * FROM accounts WHERE Email = '$Email'";
			$result = $dbc->query($sql);
			if($result->num_rows > 0) {
				$_SESSION['errors'][] = 'Deze email is al in gebruik!'; 
			} 
			mysqli_close($dbc);
		}
		else
		{
			$_SESSION['errors'][] = 'Error connecting to MySQL server.';
		}
	}
	if ( $errors != '' )
	{
		session_start();
		$_SESSION['errors'][] = $errors;
		header('Location: register.php');
		exit;
	}

	// 3: store the values in the database
	$dbc = mysqli_connect('mysql.hostinger.nl', 'u619986482_user', 'Waterman1', 'u619986482_db');
	if ( $dbc )
	{
		$query = "INSERT INTO accounts (Email, Password )  VALUES ('$Email', '$Password')";
		$result = $dbc->query($query);
		if(!$result) {
			$_SESSION['errors'][] = 'Het is niet gelukt om de ingevulde gegevens op te slaan in de database.' . mysqli_error($dbc); 
		} 
		else
		{
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
			$mail->addAddress('romy-bijkerk@hotmail.com', 'Romy Bijkerk');
			//Set the subject line
			$mail->Subject = 'PHPMailer GMail SMTP test';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML(file_get_contents('views/validate_account.html'), dirname(__FILE__));
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			//send the message, check for errors
		}
			
		if (!$mail->send()) {
			$_SESSION['errors'][] = "Mailer Error: " . $mail->ErrorInfo;
		} else {
			$_SESSION['errors'][] = "Message sent!";
		}

		$_SESSION['Email'] = $Email;
		mysqli_close($dbc);
	}
	else
	{
		$_SESSION['errors'][] = 'Error connecting to MySQL server.';
	}
	if ( $errors != '' )
	{
		session_start();
		$_SESSION['errors'][] = $errors;
		header('Location: register.php');
		exit;
	}

	
	// 4 user is saved to database. now go back to frontpage.
	session_start();
	header('Location: event.php');
	exit;
	
?>