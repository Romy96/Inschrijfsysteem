<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';

$id = $_GET['id'];

$sth = $db->prepare("DELETE FROM activities WHERE activity_id=? AND events_id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($id)))
{
  	if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan activiteit met id '. $id .' niet vinden';
	if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je verwijderd teveel rijen';
	if ( $sth->rowCount() == 1 ) $_SESSION['errors'][] = 'De activiteit is van de database verwijderd';
	header('location: event_activities.php?id=' . $events_id);
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
}

header('location: event_activities.php?id=' . $events_id);

?>