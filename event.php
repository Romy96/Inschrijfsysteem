<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/errors.php';
 require_once 'inc/user_helpers.php';



	require 'inc/dbconnection.php';

	$id = $_GET['id'];

	$sth = $db->prepare("SELECT * FROM events WHERE id=? ORDER BY events_id ASC");
	$sth->execute(array($id));
	/* Fetch all of the remaining rows in the result set */
	$event = $sth->fetchAll(PDO::FETCH_ASSOC);

	// TODO: check if exactly one row is found. If none or multiple found, something is wrong

	$sth = $db->prepare("SELECT * FROM activities where events_id = ?");
	$sth->execute(array($id));
	/* Fetch all of the remaining rows in the result set */
	$activities = $sth->fetchAll(PDO::FETCH_ASSOC);

	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('event')
	->with('event', $event)
	->with('activities', $activities)->withErrors($errors)->render();

