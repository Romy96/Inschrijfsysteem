
<?php 
require_once 'inc/session.php';
// configure blade engine
require 'vendor/autoload.php';
use Philo\Blade\Blade;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new Blade($views, $cache);


// tell blade to create HTML from the template "login.blade.php"
echo $blade->view()->make('event')->render();