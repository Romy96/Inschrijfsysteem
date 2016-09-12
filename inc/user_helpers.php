<?php
// needs:
// $db = valid PDO connection
// 'users' table with columns: id, email, password, active
// SHA1 encryption on password column
// returns: 
// 0 if user not valid, 
// 1 if user/pass exists and active
function CheckUserIsValid ($db, $email, $password) {
	// return 0 if email is empty
	if (empty($email)) {
		return 0;
	}
	// return 0 if password is empty
	if (empty($password)) {
		return 0;
	}
	$enc_password = sha1($password);
	//echo '<p>Password encrypted with SHA: ' . $enc_password . '<br>';
	$statement = $db->prepare('SELECT account_id FROM accounts where Email=? AND Password=? AND active=1 ;');
	$statement->execute(array($email, $enc_password));
	$count = $statement->rowCount();
	// user/pass combination found; return 1.
	if ($count == 1) {
		return 1;
	}
	else
	{
		return 0;
	}
}
function LoginSession($userId, $userEmail) {
	$_SESSION['userId'] = $userId;
	$_SESSION['userEmail'] = $userEmail;
}
function LogoutSession() {
	unset($_SESSION['userId']);
	unset($_SESSION['userEmail']);	
}