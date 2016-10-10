@extends('backend/menu')

@section('content_backend')

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

@endsection

