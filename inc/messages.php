<?php
 
 // provides an $messages variable if there are messages in the session
 
 
 // if session contains messages, copy them to $messages variable
 if ( isset ($_SESSION['messages'])) {
 	$messages = $_SESSION['messages'];
 	$_SESSION['messages'] = array();	// remove all messages
 } 