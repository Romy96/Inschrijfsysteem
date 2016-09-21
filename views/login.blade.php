<!doctype html>
<html>
<head>
	<title>Login</title>
	<script src="https://use.fontawesome.com/bf8ab24a40.js"></script>
	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- show the topmenu bar -->
<div class="topbar">
@if(isset($_SESSION['userEmail']))
	<span class="fa fa-user">{{ $_SESSION['userEmail'] }}</span>
	<span class="fa fa-user" style="float:right;"><a href="logout_action.php">Logout</a></span>
@else
	<span class="fa fa-user"/><span>No user logged in</span>	
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

<div class="container">

<h1>Login</h1>

<form class="form-horizontal" role="form" method="post" action="Login_action.php">
		<div class="form-group">
          <label class="control-label col-sm-2" for="InputEmail">Email</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="InputEmail" id="InputEmail" placeholder="Enter Email">  
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
			  <label><input type="checkbox" name="remember" value="checked">Remember me</label>
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
			<a href="forgetpass.php">Wachtwoord vergeten?</a>
		  </div>
		</div>
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
			<a href="register.php">Registreer als je geen account hebt</a>
		  </div>
		</div>
	  </form>

	<div class="debugbar">
		<div class="debugbar-inner">
			<div class="col">
				<h3>Cookie contents: </h3>
				<p><?php print_r($_COOKIE); ?></p>
			</div>

			<div class="col">
				<h3>Session contents: </h3>
				<p><?php print_r($_SESSION); ?></p>
			</div>

		</div>
	</div>
	</div>

</body>
</html>
