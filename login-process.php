<?php 
	session_start();
	require('db_connect.php');

	
		
		$username = $_POST['username'];
		$password = $_POST['password'];

			$password = substr(md5($password),0,10);
			$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $sql );

			
				if (mysqli_num_rows($result)>0) { // user found // check if user is admin or user
					$logged_in_user = mysqli_fetch_assoc($result);
						if ($logged_in_user['usertype'] == 'admin') {
							$_SESSION['username'] = $logged_in_user['username'];
							$_SESSION['userID']   = $logged_in_user['user_id'];
							$_SESSION['usertype'] = "admin";
							echo" error:".$sql."<br>".mysqli_error($db);	
							header("location: admin-orders.php");
						}

						if ($logged_in_user['usertype'] == 'user'){
							$_SESSION['username'] = $logged_in_user['username'];
							$_SESSION['userID']   = $logged_in_user['user_id'];
							$_SESSION['usertype'] = "user";
							echo" error:".$sql."<br>".mysqli_error($db);
							header("location: mutz/home.php");
							
						}
				}else{
					echo "<script>alert('Incorrect Password/Email, Please try again');</script>";
					echo "<script>window.location.href = 'javascript:history.go(-1)' </script>";
						 
						
				}	

		
	


?>