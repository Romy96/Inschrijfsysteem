<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/functions.php';

if ( ! isset ($_POST['submit']) )
	{
		$_SESSION['errors'][] = 'U moet wel iets invullen.';
		header('Location: create_event.php');
}

$naam = $_POST['naam'];
$afbeelding = $_POST['afbeelding'];
$banner = $_POST['banner'];
$startdatum = $_POST['startdatum'];
$locatie = $_POST['locatie'];

if (empty($naam) || empty($afbeelding) || empty($banner) || empty($startdatum) || empty($locatie)) {
	$_SESSION['errors'][] = 'Er zijn sommige velden die nog niet ingevuld zijn';
	header('Location: create_event.php');
}
else {
	$sql = $db->prepare("SELECT * FROM events WHERE name=? AND background_img=? AND banner=?");
	if ($sql->execute(array($naam, $afbeelding, $banner))) {
		if ( $sql->rowCount() > 0 ) $_SESSION['errors'][] = 'Sorry. De gegevens die je ingevuld hebt bestaan al.';
		header('Location: create_event.php');
	}
}

$sth = $db->prepare("INSERT INTO events (name, background_img, banner, start_date, location) VALUES (?, ?, ?, ?, ?)");
if ($sth->execute(array($naam, $afbeelding, $banner, $startdatum, $locatie))) {
	$_SESSION['errors'][] = 'De gegevens zijn ingevuld en opgeslagen in de database.';
	header('Location: Events_list.php');
}
else
{
	$_SESSION['errors'][] = 'Er is iets fout gegaan in de database. Probeer het later nog eens.';
	header('Location: create_event.php');
}
?>