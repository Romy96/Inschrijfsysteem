<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';

$activity_id = $_GET['id'];
$events_id = $_GET['events_id'];

$sth = $db->prepare("DELETE FROM activities WHERE activity_id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($activity_id)))
{
  	if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan activiteit met id '. $events_id .' niet vinden';
	if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je verwijderd teveel rijen';
	if ( $sth->rowCount() == 1 ) $_SESSION['errors'][] = 'De activiteit is van de database verwijderd';
	header('location: event_activities.php?id=' . $events_id);
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	header('location: event_activities.php?id=' . $events_id);
}


?>