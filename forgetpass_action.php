<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';

$Email = $_GET['InputEmail'];

// redirect back to login with error if user didn't enter email
if ( empty($_GET['InputEmail']) ) {
	$_SESSION['errors'][] = 'Fout: geen e-mail ingevuld.';
}

require 'inc/change_pass_mail.php';

?>