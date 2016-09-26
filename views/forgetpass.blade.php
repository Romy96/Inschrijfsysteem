<!DOCTYPE html>
<html>
  <head>
      <title>Forgot password</title>
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


<h1>Wachtwoord vergeten?</h1>
	
    <div class="row">
        <form role="form" method="get" action="forgetpass_action.php">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="InputEmail">Vul uw email opnieuw in</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputEmail" id="InputEmail" placeholder="Enter email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
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