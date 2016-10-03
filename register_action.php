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
		require 'inc/confirmation_mail.php';
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