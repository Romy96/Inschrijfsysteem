<!DOCTYPE html>
<html>
  <head>
      <title>Register</title>
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


<h1>Register</h1>
	
    <div class="row">
        <form role="form" method="post" action="register_action.php">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputEmail" id="InputEmail" placeholder="Enter email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>

    </div>
    </div>
    </body>
    </html>