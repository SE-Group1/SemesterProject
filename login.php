<!DOCTYPE html>
<html lang="en">
<head>
  <title>HookedUp</title>
    <style>
        .logo-top {
            display: block;
            margin: 50px auto 0 auto;
        }
        .logo-bottom {
            display: block;
            margin: 0 auto 0 auto;
        }
    </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HookedUp</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>-->
    </ul>
    <!--<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>-->
  </div>
</nav>
    
<div class="container">
    <div class="logo"><div><img src="hooked.png" class="logo-top"></div>
    <div><img src="up.png" class="logo-bottom"></div></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <hr>
                    <div class="panel-body">
                        <div class="row">
                            <form id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group-lg">
                                        <button type="submit" class="btn form-control btn-primary">Sign in</button>
                                    </div>
                                    <hr>
                                    <div class="form-group text-center">
                                        <h6>Not a member? <a href="register.php">Create an account.</a></h6>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
