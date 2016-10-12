<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';

$naam = $_POST['naam'];
$startdatum = $_POST['startdatum'];
$locatie = $_POST['locatie'];
$id = $_POST['id'];

$sql = $db->prepare("UPDATE events SET name=?, start_date=?, location=? WHERE events_id=?");
if ($sql->execute(array($naam, $startdatum, $locatie, $id)))
	{
  		if ( $sql->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan event met id '. $id .' niet vinden';
		if ( $sql->rowCount() > 1 ) $_SESSION['errors'][] = 'Je wijzigt teveel rijen';
		header("location: Edit_event.php");
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te slaan.';
	}

	if ( $sql->rowCount() == 1 ) $_SESSION['errors'][] = 'De aangepaste gegevens zijn opgeslagen in de database';
	header("location: Events_list.php");
?>