<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';

$id = $_GET['id'];

$sth = $db->prepare("DELETE FROM events WHERE events_id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($id)))
{
  	if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan event met id '. $id .' niet vinden';
	if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je verwijderd teveel rijen';
	header("location: Events_list.php");
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
}

$sth = $db->prepare("DELETE FROM activities WHERE events_id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($id)))
{
  	if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan activiteiten met events_id '. $id .' niet vinden';
	header("location: Events_list.php");
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	header("location: Events_list.php");
}



?>