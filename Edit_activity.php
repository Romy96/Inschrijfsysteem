<?php

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/user_helpers.php';
 $errors = [];

 if ( IsLoggedInSession()==false ) {
	// stuur direct door naar main pagina
	header('location: Login.php');
	exit;
}
else
{
	require 'inc/dbconnection.php';

	$activity_id = $_GET['id'];

	$sql = $db->prepare("SELECT * FROM activities where activity_id = ?");
	if ($sql->execute(array($activity_id)))
	{
  		$activity = $sql->fetch(PDO::FETCH_ASSOC);	
  		if ( $sql->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan activiteit met id '. $activity_id .' niet vinden';
		if ( $sql->rowCount() > 1 ) $_SESSION['errors'][] = 'Je haalt teveel rijen op';
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	}

	$sth = $db->prepare("SELECT * FROM events WHERE events_id=?");
	// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

	if ($sth->execute(array($activity['events_id'])))
	{
  		$event = $sth->fetch(PDO::FETCH_ASSOC);	
  		if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan event met events_id '. $id .' niet vinden';
		if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je haalt teveel rijen op';
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	}

	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('Backend/Activities/Edit_activity')
	->with('event', $event)
	->with('activity', $activity)->withErrors($errors)->render();

}

