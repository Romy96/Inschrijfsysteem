<?php
session_start();
require 'inc/functions.php';

$dbc = mysqli_connect('localhost', 'root', '', 'inschrijfsysteem');

$error = ""; //Variable for storing our errors.
if(isset($_POST["Login"]))
{
	if(empty($_POST["InputEmail"]) || empty($_POST["pwd"]))
	{
		$error = "Both fields are required.";
	}else
	{
		// Define $username and $password
		$email = $_POST['InputEmail'];
		$password = md5($_POST['pwd']);

		// To protect from MySQL injection
		$email= stripslashes($email);
		$password = stripslashes($password);
		$email = mysqli_real_escape_string($dbc, $email);
		$password = mysqli_real_escape_string($dbc, $password);
		

		//Check username and password from database
		$sql = "SELECT * from accounts WHERE Email='$email' AND Password='$password'";
		$result = mysqli_query($dbc,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		//If username and password exist in our database then create a session.
		//Otherwise echo error.

		if(mysqli_num_rows($result) == 1)
		{
			$_SESSION['Email'] = $email; // Initializing Session
			$_SESSION['Password'] = $password;
			header('Location: index.php');
		}else
		{
			$_SESSION['errormessage'] = "Je email en/of je wachtwoord is onjuist.";
			header('Location: Login.php');
		}

	}
}

?>