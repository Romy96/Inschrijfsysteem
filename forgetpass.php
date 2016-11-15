<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/user_helpers.php';
 $errors = [];

 echo $blade->view()->make('forgetpass')->withErrors($errors)->render();