
<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/user_helpers.php';

 if ( IsLoggedInSession()==false ) {
	// stuur direct door naar main pagina
	header('location: Login.php');
	exit;
}
else
{
	require 'inc/dbconnection.php';

	//$id = mysqli_real_escape_string($db, $_GET['events_id']);

	$sth = $db->prepare("SELECT * FROM events ORDER BY events_id ASC");
	$sth->execute();

	/* Fetch all of the remaining rows in the result set */
	$events = $sth->fetchAll(PDO::FETCH_ASSOC);

	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('events')->with('events', $events)->withErrors($errors)->render();
}