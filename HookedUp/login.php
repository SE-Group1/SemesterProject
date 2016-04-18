<?php require 'tools.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
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
    <script>
        $(document).ready(function() {
            <?php if(isset($_GET['registered'])) { ?>
                $("#successMessage").show();
            <?php } ?>
            
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                
                $.post('api/auth/login.php', $(this).serialize(), function(data) {
                    if(!data || !data.success) {
                        console.log(data);
                        $("#errorMessage")
                            .html(data.error)
                            .slideDown("fast");
                        $("#password").val("");
                        $("#username").focus().select();
                        return;
                    }
                    
                    window.location.href = "home.php";
                    
                }, 'json');
            });
        });
    </script>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container">
    <div class="logo"><div><img src="hooked.png" class="logo-top"></div>
    <div><img src="up.png" class="logo-bottom"></div></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <hr>
                    <div class="panel-body">
                        <div class="row">
                            <form id="loginForm" href="" role="form" style="display: block;">
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
                                <div class="col-lg-12">
                                    <div id="successMessage" class="form-group alert alert-success text-center" role="alert" hidden>
                                        Congratulations, you're now a part of HookedUp! <br>
                                        Try signing in.
                                    </div>
                                    <div id="errorMessage" class="form-group alert alert-danger text-center" role="alert" hidden></div>
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
