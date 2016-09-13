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

	<?php
	$connection = mysqli_connect('localhost', 'root', '', 'inschrijfsysteem');

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

      $output = "";
      $sql = mysqli_query($connection, "SELECT * FROM events");

      if (!mysqli_query($connection, "SELECT * FROM events")
  		{
  			echo("Error description: " . mysqli_error($connection));
  		}

      elseif (mysqli_query($connection, "SELECT * FROM events")
      {
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $output .= '
      <div class="events">
  		printf ("%s (%s)\n",$row['name'],$row['background_img'], $row['banner'],$row['start_date'],$row['location']);
      </div>';
      }


	mysqli_close($connection);
	?>

  </body>
</html>