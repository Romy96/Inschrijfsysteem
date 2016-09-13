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
		return ['result' => 0, 'userId' => null, 'userEmail' => null, 'displayname' => null];
	}
	// return 0 if password is empty
	if (empty($password)) {
		return 0;
	}
	$enc_password = sha1($password);
	//echo '<p>Password encrypted with SHA: ' . $enc_password . '<br>';
	$statement = $db->prepare('SELECT account_id FROM accounts where Email=? AND Password=? ;');
	$statement->execute(array($email, $enc_password));
	$count = $statement->rowCount();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	$userId = $row['account_id'];
	$userEmail = $row['Email']
	$displayname = $row['displayname'];

	$count = $statement->rowCount();
	// user/pass combination found; return 1.
	if ($count == 1) {
		return ['result' => 1, 'userId' => $userId, 'userEmail' => $userEmail, 'displayname' => $displayname];
	}
	else
	{
		return 0;
	}
}
function LoginSession($userId, $userEmail, $displayname) {
	$_SESSION['userId'] = $userId;
	$_SESSION['userEmail'] = $userEmail;
}
function LogoutSession() {
	unset($_SESSION['userId']);
	unset($_SESSION['userEmail']);	
}