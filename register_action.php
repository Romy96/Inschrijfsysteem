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
		$dbc = mysqli_connect('localhost', 'root', '', 'inschrijfsysteem');
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
	$dbc = mysqli_connect('localhost', 'root', '', 'inschrijfsysteem');
	if ( $dbc )
	{
		$query = "INSERT INTO accounts (Email, Password )  VALUES ('$Email', '$Password')";
		$result = $dbc->query($query);
		if(!$result) {
			$_SESSION['errors'][] = 'Het is niet gelukt om de ingevulde gegevens op te slaan in de database.' . mysqli_error($dbc); 
		} 
		else
		{
			// multiple recipients
			$to .= '$Email';

			// subject
			$subject = 'Comfirmation registration';

			// message
			$message = '
			<html>
			<head>
			  <title>Comfirming registration</title>
			</head>
			<body>
			  <p>Thank you for joining our site and making your account!</p>
			  <p>To activate your account, please click on the link down below.</p>
			</body>
			</html>
			';

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Mail it
			mail($to, $subject, $message, $headers);
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