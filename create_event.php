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

	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('Backend/Events/create_event')->withErrors($errors)->render();
}

?>