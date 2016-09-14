<?php
	require 'inc/functions.php';

	// register_action needs to do these steps:
	
	// 1) check no submit was done ($_POST) -> redirect to register.php with errormessage
	if ( ! isset ($_POST['submit']) )
	{
		session_start();
		$_SESSION['errormessage'] = "U moet wel iets invullen.";
		header('Location: register.php');
		exit;
	}

	// 2) check the submitted values. if complete, then continue; if incomplete or errors then 
	// show the form again and show old input
	$Email = $_POST['InputEmail'];
	$Password = md5($_POST['pwd']);
	if ( IsNullOrEmptyString($Email) )
	{
		$errmsg = 'Email is leeg.';
	}
	else
	{
		$errmsg = '';
		$dbc = mysqli_connect('localhost', 'root', '', 'inschrijfsysteem');
		if ( $dbc )
		{
			$sql = "SELECT * FROM accounts WHERE Email = '$Email'";
			$result = $dbc->query($sql);
			if($result->num_rows > 0) {
				$errmsg = 'Deze email is al in gebruik!'; 
			} 
			mysqli_close($dbc);
		}
		else
		{
			$errmsg = 'Error connecting to MySQL server.';
		}
	}
	if ( $errmsg != '' )
	{
		session_start();
		$_SESSION['errormessage'] = $errmsg;
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
			$errmsg = 'Het is niet gelukt om de ingevulde gegevens op te slaan in de database.' . mysqli_error($dbc); 
		} 
		$_SESSION['Email'] = $Email;
		mysqli_close($dbc);
	}
	else
	{
		$errmsg = 'Error connecting to MySQL server.';
	}
	if ( $errmsg != '' )
	{
		session_start();
		$_SESSION['errormessage'] = $errmsg;
		header('Location: register.php');
		exit;
	}

	
	// 4 user is saved to database. now go back to frontpage.
	session_start();
	$_SESSION['statusmessage'] = 'De ingevoerde gegevens zijn opgeslagen in de database.';
	header('Location: event.php');
	exit;
	
?>