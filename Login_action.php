<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';
require 'inc/functions.php';

// redirect back to login with error if user didn't enter email
if ( empty($_POST['InputEmail']) ) {
	$_SESSION['errors'][] = 'Fout: geen e-mail ingevuld.';
}
// redirect back to login with error if user didn't enter pass
if ( empty($_POST['pwd']) ) {
	$_SESSION['errors'][] = 'Fout: geen wachtwoord ingevuld.';
}
// check if user can be found
if (empty($_SESSION['errors'])) $result = CheckUserIsValid($db, $_POST['InputEmail'], $_POST['pwd']);
if ( $result == 1 ) {
	LoginSession($userId, $_POST['InputEmail']);
	if (isset($_POST['remember me'])) {
		if ($_POST['remember'] == "checked") {
			$cookie_name = "userId";
			$cookie_value = $userId;
			setcookie("userId", $userId, time() + (86400 * 30), "/");
			setcookie("userEmail", $userEmail, time() + (86400 * 30), "/");
		}
	}
	echo 'User logged in.';
}
else
{
	$_SESSION['errors'][] = 'Fout: combinatie van e-mail en wachtwoord niet gevonden, of account niet actief.';
	header('Location: Login.php');
	exit;
}

?>