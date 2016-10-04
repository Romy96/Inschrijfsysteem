<!DOCTYPE html>
<html>
	<head>
		<title>Change password</title>
	      <script src="https://use.fontawesome.com/bf8ab24a40.js"></script>
	      <meta charset="utf-8">
	      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	      <link rel="stylesheet" href="css/bootstrap.min.css">
	      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
	      <link rel="stylesheet" href="css/style.css">
	</head>
	<body>

	<div class="topbar">
	@if(isset($_SESSION['userEmail']))
	  <span class="fa fa-user">{{ $_SESSION['userEmail'] }}</span>
	  <span class="fa fa-user" style="float:right;"><a href="logout_action.php">Logout</a></span>
	@else
	  <span class="fa fa-user"/><span>No user logged in</span>  
	@endif
	<span style="float:left;"></span>
	</div>

	@if(isset($errors))       {{-- does $errors exist? --}}
	  @if($errors->any())     {{-- does $errors have any errors? --}}
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
			<div class="row">
				<div class="col-sm-12">
					<h1>Change Password</h1>
				</div>
			</div>
				<div class="row">
				       <form role="form" method="post" action="forgetpass_action_newpass.php">
				            <div class="col-lg-6">
				            	<div class="form-group">
				                    <label for="pwd">Current password</label>
				                    <div class="input-group">
				                        <input type="password" name="pwd" id="pwd" placeholder="New Password" autocomplete="off">
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label for="new_password">New password</label>
				                    <div class="input-group">
				                        <input type="password" name="new_password" id="new_password" placeholder="New Password" autocomplete="off">
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label for="comfirm_password">Confirm new password</label>
				                    <div class="input-group">
				                        <input type="password" name="comfirm_password" id="comfirm_password" placeholder="Confirm new password" autocomplete="off">
				                    </div>
				                </div>
				                <input type="submit" name="submit" id="submit" value="Submit" class="btn">
				            </div>
				        </form>
				</div>

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