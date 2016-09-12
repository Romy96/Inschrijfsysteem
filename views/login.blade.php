<!doctype html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <link rel="stylesheet" href="css/style.css">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- show the topmenu bar -->
<div class="topbar">
@if(isset($_SESSION['userEmail']))
	<span>{{ $_SESSION['userEmail'] }}</span>
	<span style="float:right;"><a href="logout_action.php">Logout</a></span>
@else
	<span>No user logged in</span>	
@endif
<span style="float:left;"></span>
</div>

<!-- show errors, if present -->
@if(isset($errors))				{{-- does $errors exist? --}}
	@if($errors->any())			{{-- does $errors have any errors? --}}
	<div class="errors" >
	<ul>
		@foreach ($errors->all() as $error)		
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	</div>
	@endif
@endif

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
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
			<a href="register.php">Registreer als je geen account hebt</a>
		  </div>
		</div>
	  </form>

</body>
</html>
