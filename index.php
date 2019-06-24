<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User | Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css.css" rel="stylesheet">
    </head>
    <center>
    <body id="background">
        <div id="login">
            <div class="col-xs-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-body">
					<legend id="register-sign">Login</legend>
                        <br>
                        <?php include_once 'login-error.php';?>
                        <form method="POST" action="login-process.php">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                           <button type="submit" class="btn btn-success">Login</button>
                           <p>Not a member? Register <a href="register.php">here</a></p>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </center>
</html>