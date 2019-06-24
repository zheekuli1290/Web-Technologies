<?php session_start();

include('db_connect.php');

if ($_SESSION['usertype']!="admin"){
    header("location:index.php");} 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit | User</title>
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
<?php 
    $id =$_GET['valueID'];
	$query="SELECT * FROM user WHERE user_id='$id'";
	$result=mysqli_query($db,$query);
	$row=mysqli_fetch_array($result);

	
echo "
 </head>
    <body id='background'>
        <div id='login'>
            <div class='col-xs-4 col-md-offset-7'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                       <legend id='register-sign'>Register</legend>
                       <br>
                       <?php include_once 'login-error.php';?>
                        <form  method='POST' action='edit_user.php'>


                        
                            <div class='text-center'><span class='required'><b>USER ID:</b></span>
                            <label>".$id."</label>
                           <input id='ID' type='hidden' name='id'  value= " .$id." required>
                            </div>
           
                            <div class='form-group'>
                                <label>First name</label>
                                <input type='text' name='firstname' required value=" .$row['user_fname']." class='form-control' placeholder='First Name'>
                            </div>

                            <div class='form-group'>
                                <label>Last name</label>
                                <input type='text' name='lastname' required value=" .$row['user_lname']." class='form-control' placeholder='Last Name'>
                            </div>

                            <div class='form-group'>
                                <label>Email</label>
                                <input type='email' name='email' required value=" .$row['email']." class='form-control' placeholder='Email Address'>
                            </div>

                             <div class='form-group'>
                                <label>Address</label>
                                <input type='text' name='address' required value=" .$row['address']." class='form-control' placeholder='Address'>
                            </div>

                            <div class='form-group'>
                                <label>Username</label>
                                <input type='text' name='username' required value=" .$row['username']." class='form-control' placeholder='Username'>
                            </div>
                             <div class='form-group'>
                                <label>Phone Number</label>
                                <input type='numbers' name='phoneNumber' required value=" .$row['phone_number']." class='form-control' placeholder='Phone Number'>
                            </div>
                               
                            <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                                <label class='btn btn-secondary active'>
                                    <input type='radio' name='usertype' id='admin' value='admin'> Admin
                                </label>
                                <label class='btn btn-secondary'>
                                        <input type='radio' name='usertype' id='user' value='user'> User
                                </label>
                                </div>
                            </div>
                            </div>
                            <br>

                           <button type='submit' name='submit' class='btn btn-outline-success' id='btnSubmit' value='submit' onclick='return Validate()' />UPDATE
                           </button>
                           

                        </form> 
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    <script type='text/javascript' src='assets/bootstrap/js/jquery-3.2.1.js'></script>
    <script type='text/javascript' src='assets/bootstrap/js/bootstrap.min.js'></script>


    </body>
</html>";


if(isset($_POST['submit'])){
            $id         = $_POST['id'];
            $fname      = $_POST['firstname'];
            $lname      = $_POST['lastname'];
            $email      = $_POST['email'];
            $username   = $_POST['username'];
            $password   = $_POST['password'];
            $address    = $_POST['address'];
            $date       = date('Y/m/d H:i:s');
            $usertype   = $_POST['usertype'];
            $number     = $_POST['phoneNumber'];


    

    $sql = "UPDATE user SET user_fname='$fname',user_lname='$lname',email='$email',address='$address',username='$username', password='$password',      
                   usertype='$usertype', date_reg='$date', phone_number='$number' 
            WHERE user_id='$id'";

    if(mysqli_query( $db, $sql )){
    	echo "<script>alert('User Details Updated');</script>";
        echo "<script>window.location.href = 'admin-user.php' </script>";
        
    	
   
    }else{
    echo" error:".$query."<br>".mysqli_error($db);
}
}
?>



 	