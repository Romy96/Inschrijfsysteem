<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/user_helpers.php';
 $errors = [];

// output everything
echo $blade->view()->make('menu')->withErrors($errors)->render();