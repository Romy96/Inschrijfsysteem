<?php
require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';

if ( ! isset ($_POST['submit']) ) {
		$_SESSION['errors'][] = "U moet wel iets invullen.";
		header('Location: change_password.php');
}

$New_pass = md5($_POST['new_password']);
$Confirm_pass = md5($_POST['confirm_password']);

$sql = $db->prepare("SELECT Password FROM accounts WHERE Email = ?");
$sql->execute();

if ($result = $sql->fetchAll(PDO::FETCH_ASSOC)) {
	if ( $sql->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan de oude wachtwoord van dit account niet vinden.';
	if ( $sql->rowCount() > 1 ) $_SESSION['errors'][] = 'Er wordt meer dan één wachtwoord opgehaald.';
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
}

if ($Confirm_pass == $New_pass) {
	$sql = $db->prepare("UPDATE accounts SET Password='$Confirm_pass' WHERE Email = ?");
	$sql->execute();
	if ($result = $sql->rowCount() == 0) $_SESSION['errors'][] = 'Het oude wachtwoord van deze account kan niet worden gevonden.';
	if ($result = $sql->rowCount() > 1) $_SESSION['errors'][] = 'Er wordt meer dan één account opgehaald.';
}
else
{
	$_SESSION['errors'][] = 'De wachtwoorden die je hebt ingevuld zijn niet hetzelfde.';
}

if ($result = $sql->rowCount() == 1) {
	$_SESSION['errors'][] = 'Het nieuwe wachtwoord is opgeslagen en klaar voor gebruik.';
	header('Location: Login.php');
}


?>