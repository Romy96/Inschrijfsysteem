<?php
require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';

if ( ! isset ($_POST['submit']) ) {
		$_SESSION['errors'][] = "U moet wel iets invullen.";
		header('Location: change_password.php');
}

$New_pass = md5($_POST['new_password']);
$Comfirm_pass = md5($_POST['confirm_password']);

$sql = $db->prepare("SELECT Password FROM accounts WHERE account_id = ?");

if ($sql->execute()) {
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);
	if ( $sql->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan gegevens van id '. $id .' niet vinden.';
	if ( $sql->rowCount() > 1 ) $_SESSION['errors'][] = 'Er worden teveel rijen opgehaald.';
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
}

if ($Confirm_pass == $New_pass) {
	$sql = $db->prepare("UPDATE accounts SET Password='$Confirm_pass' WHERE account_id = ?");
	$sql->execute();
}
else
{
	$_SESSION['errors'][] = 'De wachtwoorden die je hebt ingevuld zijn niet hetzelfde.';
}

?>