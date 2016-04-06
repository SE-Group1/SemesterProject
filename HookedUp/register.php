<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
    <style>
        .title {
            margin: 50px auto 0 auto;
        }
    </style>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container">
    <div class="title text-center">
        <h1>Join HookedUp.</h1>
        <h4><small>The best way to connect with professionals.</small></h4>
    </div>
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
                            </div>
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="form-group-lg">
                                    <button type="submit" class="btn form-control btn-primary">Create account</button>
                                </div>
                                <hr>
                                <div class="form-group text-center">
                                    <h6>Already have an account? <a href="login.php">Sign in.</a></h6>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
