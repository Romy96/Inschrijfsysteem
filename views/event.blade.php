<!DOCTYPE html>
<html>
  <head>
      <title>Events</title>
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

	<h1>Events</h1>

	<div>

		<div style="float:left; margin-right: 16px; width: 300px; height: 160px; border: 1px solid silver; background-image:url('img/sportdag.jpg');">
			<div style="width: 276px; height: 136px; margin: 12px;">
				<span style="font-family: roboto; color: white; font-size: 28pt;   text-shadow: 2px 0 0 black, -2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, 1px 1px silver, -1px -1px 0 silver, 1px -1px 0 silver, -1px 1px 0 silver; ">LIFESTYLEDAG</span>
			</div>

			<div style="width: 276px; height: 136px; margin: 12px;">
				<span style="font-family: roboto; color: white; font-size: 28pt;   text-shadow: 2px 0 0 black, -2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, 1px 1px silver, -1px -1px 0 silver, 1px -1px 0 silver, -1px 1px 0 silver; ">LIFESTYLEDAG</span>
			</div>

		</div>

		<div style="float:left; margin-right: 16px; width: 300px; height: 160px; border: 1px solid silver; background-image:url('img/disney.jpg');">
			<div style="width: 276px; height: 136px; margin: 12px; ">
				<span style="font-family: roboto; color: white; font-size: 18pt; text-shadow: 2px 2px black;">SCHOOLREIS</span>
			</div>
		</div>

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

</body>
</html>