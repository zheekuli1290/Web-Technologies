<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User | Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css.css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#password").val();
            var cpassword = $("#cpassword").val();
            if (password != cpassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>

    </head>
    <body id="background">
        <div id="login">
            <div class="col-xs-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                       <legend id="register-sign">Register</legend>
                       <br>
                       <?php include_once 'login-error.php';?>
                        <form  method="POST" action="register_func.php">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" name="firstname" required value="<?php echo isset($firstname) ? $firstname : ''?>" class="form-control" placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" name="lastname" required value="<?php echo isset($lastname) ? $lastname : ''?>" class="form-control" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required value="<?php echo isset($email) ? $email : ''?>" class="form-control" placeholder="Email Address">
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="numbers" name="phoneNumber" required value="<?php echo isset($phoneNum) ? $phoneNum : ''?>" class="form-control" placeholder="Phone Number">
                            </div>

                             <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" required value="<?php echo isset($address) ? $address : ''?>" class="form-control" placeholder="Address">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" required value="<?php echo isset($username) ? $username : ''?>" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" required class="form-control" placeholder="Password">
                            </div>

                            <div class="group">
                                <label>Confirm Password</label>
                                <input type="password" name="cpassword" id="cpassword" required class="form-control" placeholder="Confirm Password">
                                <div class="group">
                               
                                <input type="hidden" name="usertype" id="usertype" value="user">
                            </div>
                            </div>
                            <br>
                           <button type="submit" name="login" class="btn btn-outline-success"id="btnSubmit" value="Submit" onclick="return Validate()" />Register
                           </button>
                            <p>Back to Login <a href="index.php">here</a></p>

                        </form> 
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>


    </body>
</html>