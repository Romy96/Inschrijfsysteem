<?php 

 require_once 'inc/session.php';
 require_once 'inc/errors.php';
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

	$id = $_GET['id'];

	$sth = $db->prepare("SELECT * FROM events WHERE events_id=?");
	// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

	if ($sth->execute(array($id)))
	{
  		$event = $sth->fetch(PDO::FETCH_ASSOC);	
  		if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan event met id '. $id .' niet vinden';
		if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je haalt teveel rijen op';
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	}


	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('Backend/Events/Edit_event')->with('event', $event)->withErrors($errors)->render();

}