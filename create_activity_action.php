<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/functions.php';

if ( ! isset ($_POST['submit']) )
	{
		$_SESSION['errors'][] = 'U moet wel iets invullen.';
		header('Location: create_activity.php');
}

$naam = $_POST['naam'];
$afbeelding = $_POST['afbeelding'];
$beschrijving = $_POST['beschrijving'];
$events_id = $_POST['events_id'];

// check if all required fields are filled, otherwise return with error
if (empty($naam) || empty($afbeelding) || empty($beschrijving)) {
	$_SESSION['errors'][] = 'Er zijn sommige velden die nog niet ingevuld zijn';
	header('Location: create_activity.php?id=' . $events_id);
	exit;
}

// check if activity does not already exist
$sql = $db->prepare("SELECT * FROM activities WHERE name=? AND image=? AND description=?");
if ($sql->execute(array($naam, $afbeelding, $beschrijving))) {
	if ( $sql->rowCount() > 0 ) {
		$_SESSION['errors'][] = 'Sorry. De gegevens die je ingevuld hebt bestaan al.';
		header('Location: create_activity.php?id=' . $events_id);
		exit;
	}
}


$sth = $db->prepare("INSERT INTO activities (events_id, name, image, description) VALUES (?, ?, ?, ?)");
if ($sth->execute(array($events_id, $naam, $afbeelding, $beschrijving))) {
	$_SESSION['errors'][] = 'De gegevens zijn ingevuld en opgeslagen in de database.';
	header('Location: event_activities.php?id=' . $events_id);
}
else
{
	$_SESSION['errors'][] = 'Er is iets fout gegaan in de database. Probeer het later nog eens.';
	header('Location: create_activity.php?id=' . $events_id);
}
?>