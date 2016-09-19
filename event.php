<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/errors.php';
 require_once 'inc/user_helpers.php';

	require 'inc/dbconnection.php';

	$events_id = $_GET['ID'];

	$sth = $db->prepare("SELECT * FROM activities where events_id = "$events_id" ");
	$sth->execute();

	/* Fetch all of the remaining rows in the result set */
	$activities = $sth->fetchAll(PDO::FETCH_ASSOC);

	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('event')->with('activities', $activities)->withErrors($errors)->render();
