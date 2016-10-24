<?php 

require_once 'inc/session.php';
require_once 'inc/user_helpers.php';
require 'vendor/autoload.php';

use Philo\Blade\Blade;
$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new Blade($views, $cache);

if ( IsLoggedInSession()==true ) {
	// stuur direct door naar main pagina
	header('location: events_list.php');
	exit;
}
else
{
	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('login')->withErrors($errors)->render();
}