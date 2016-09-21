<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/errors.php';
 require_once 'inc/user_helpers.php';

 echo $blade->view()->make('forgetpass')->withErrors($errors)->render();