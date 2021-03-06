<?php
// needs:
// $db = valid PDO connection
// 'users' table with columns: id, email, password, active
// SHA1 encryption on password column
// returns: 
// array [
// 		result => 0 if user not valid, 1 if user/pass exists and active
//		userId => record id from database; null if user not exist
//		userEmail => email address from database; null if user not exist
//		displayname => displayname from database; null if user not exist
// ]
 
function CheckUserIsValid ($db, $email, $password) {

	// return 0 if email is empty
	if (empty($email)) {
		return ['result' => 0, 'userId' => null, 'userEmail' => null, 'displayname' => null];
	}
	// return 0 if password is empty
	if (empty($password)) {
		return ['result' => 0, 'userId' => null, 'userEmail' => null, 'displayname' => null];
	}
	$enc_password = sha1($password);

	//echo '<p>Password encrypted with SHA: ' . $enc_password . '<br>';
	$statement = $db->prepare('SELECT account_id, displayname FROM accounts where Email=? AND Password=? AND active=1;');
	$statement->execute(array($email, $enc_password));
	$err = $statement->errorCode();

	$count = $statement->rowCount();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	$userId = $row['account_id'];
	$displayname = $row['displayname'];
	// user/pass combination found; return 1.
	if ($count == 1) {
		return ['result' => 1, 'userId' => $userId, 'userEmail' => $email, 'displayname' => $displayname];
	}
	else
	{
		return ['result' => 0, 'userId' => null, 'userEmail' => null, 'displayname' => null];
	}
}
function IsLoggedIn() {
	// check if cookie contains username (then, if session has no username, fill session as well)
	if ( isset($_COOKIE['userId']) && !isset($_SESSION['userId']) ) {
		LoginSession($_COOKIE['userId'], $_COOKIE['userEmail'], $_COOKIE['displayname']);
		return true;
	}
		// check if session contains username
	if ( isset($_SESSION['userId']) ) {
		return true;
	}
	return false;
}
function LoginSession($userId, $userEmail, $displayname) {
	$_SESSION['userId'] = $userId;
	$_SESSION['userEmail'] = $userEmail;
	$_SESSION['displayname'] = $displayname;
}
function RememberCookie($userId, $userEmail, $displayname) {
			// bewaar userId in cookie dat 30 dagen geldig blijft
			setcookie("userId", $userId, time() + (86400 * 30), "/"); // 86400 = 1 day
			// bewaar userEmail in cookie dat 30 dagen geldig blijft
			setcookie("userEmail", $userEmail, time() + (86400 * 30), "/"); // 86400 = 1 day
			// bewaar displayname in cookie dat 30 dagen geldig blijft
			setcookie("displayname", $displayname, time() + (86400 * 30), "/"); // 86400 = 1 day
}
function IsLoggedInSession() {
	if (isset($_SESSION['userId'])==false || empty($_SESSION['userId']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}
function LogOut() {
	$_SESSION['errors'][] = "Logged out.";
	unset($_SESSION['userId'], $_SESSION['userEmail'], $_SESSION['displayname']);
	// verwijder het cookie door expiration 
	setcookie("userId", null, time() -3600, "/"); // 86400 = 1 day
	setcookie("userEmail", null, time() -3600, "/"); // 86400 = 1 day
	setcookie("displayname", null, time() -3600, "/"); // 86400 = 1 day
}