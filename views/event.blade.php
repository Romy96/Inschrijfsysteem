<!DOCTYPE html>
<html>
  <head>
      <title>Activities</title>
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
	<p class="fa fa-user">{{ $_SESSION['userEmail'] }}</p>
	<p class="fa fa-user" style="float:right;"><a href="logout_action.php">Logout</a></p>
@else
	<p class="fa fa-user"/><p>No user logged in</p>	
@endif
<p style="float:left;"></p>
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

	@foreach ( $event as $row )
		<div class='banner' style='background-image:url({{$row['banner']}})'>	
			<h1 class='title'>{{$row['name']}}</h1>
		</div>
	@endforeach

	@foreach ( $activities as $rows ) 
	<div>
	    <div class='img' style='background-image:url({{$rows['image']}})'>
		    <div class='img2'>
		    <p class='data_info'>{{$rows['name']}}</p> 
		    <p class='data_info'>{{$rows['description']}}</p>
		    </div>
	    </div>
    </div>	
	@endforeach
	

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