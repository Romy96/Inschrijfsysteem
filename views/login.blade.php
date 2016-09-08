<!DOCTYPE html>
<html>
  <head>
      <title>Login</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <link rel="stylesheet" href="css/style.css">
  </head>
<body>

<form class="form-horizontal" role="form" method="post" action="Login_action.php">
		<div class="form-group">
          <label class="control-label col-sm-2" for="InputEmail">Email</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="InputEmail" id="InputEmail" placeholder="Enter Email" required>  
          </div>
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-2" for="pwd">Password</label>
		  <div class="col-sm-10">          
			<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
		  </div>
		</div>
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox">
			  <label><input type="checkbox">Remember me</label>
			</div>
		  </div>
		</div>
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
			<input type="submit" name="Login" value="Login" />
		  </div>
		</div>
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
			<a href="#">Wachtwoord vergeten?</a>
		  </div>
		</div>
	  </form>

</body>
</html>
