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

	<div class="events">

	</div>

  </body>
</html>