<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
    <style>
        .title {
            margin: 50px auto 0 auto;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#register-form").submit(function(e) {
                e.preventDefault();
                
                $.post('api/auth/register.php', $("#register-form").serialize(), function(data) {
                    console.log(data);
                });
            })
        });
    </script>
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
                        <form id="register-form"  role="form" style="display: block;">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="firstName">First name</label>
                                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last name</label>
                                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <small>(at least 8 characters)</small></label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" pattern=".{8,}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="form-group text-center">
                                    <h5><small>By clicking Create account, you are agreeing to absolutely no privacy at all.</small></h5>
                                </div>
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
