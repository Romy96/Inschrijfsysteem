<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';

$Email = $_POST['InputEmail'];

// redirect back to login with error if user didn't enter email
if ( empty($_POST['InputEmail']) ) {
	$_SESSION['errors'][] = 'Fout: geen e-mail ingevuld.';
}

$sql = "SELECT Email, Password FROM accounts WHERE Email = '$Email'";
$sql->execute();

if($sql->rowCount() >= 0 ) {
	// multiple recipients
	$to .= '$Email';

	// subject
	$subject = 'Comfirmation registration';

	// message
	$message = '
	<html>
		<head>
			<title>Comfirming registration</title>
		</head>
		<body>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Change Password</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
						<form method="post" id="passwordForm">
							<input type="password" class="input-lg form-control" name="Password" id="Password" placeholder="New Password" autocomplete="off">
							<input type="password" class="input-lg form-control" name="Password" id="Password" placeholder="Repeat Password" autocomplete="off">
						<div class="row">
							<div class="col-sm-12">
								<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
							</div>
						</div>
							<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
						</form>
					</div><!--/col-sm-6-->
				</div><!--/row-->
			</div>
		</body>
	</html>
	';

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Mail it
	mail($to, $subject, $message, $headers);
} 
else
{
	$_SESSION['errors'][] = 'Deze email is fout ingevuld of bestaat niet.';
}
?>