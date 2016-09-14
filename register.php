<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/errors.php';

// output everything
echo $blade->view()->make('register')->withErrors($errors)->render();