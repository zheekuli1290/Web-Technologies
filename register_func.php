<?php  


include('db_connect.php');


            $fname      = $_POST['firstname'];
            $lname      = $_POST['lastname'];
            $email      = $_POST['email'];
            $username   = $_POST['username'];
            $password   = $_POST['password'];
            $address    = $_POST['address'];
            $date       = date('Y/m/d H:i:s');
            $usertype   = $_POST['usertype'];
            $phoneNum   = $_POST['phoneNumber'];

            $query      = "SELECT * FROM user WHERE username = '$username'";
            $res        = mysqli_query($db, $query);
           
           
            if(mysqli_num_rows($res)>0){
               $_SESSION['loginError'] = 'Username taken';
                echo"<script>window.alert('username taken. Please try again');</script>";
                echo "<script>window.location.href = 'javascript:history.go(-1)' </script>";
               
               

            }else{ 

 
                $password = substr(md5($password),0,10);
                $sql = "INSERT INTO user(user_lname,user_fname, username, password, email,address, usertype, date_reg, phone_number) 
                VALUES ('$lname','$fname','$username','$password','$email', '$address', '$usertype','$date', '$phoneNum')";



           
             echo "<script>window.alert('Account Successfully Created');</script>";
               echo "<script>window.location.href = 'javascript:history.go(-1)' </script>";
             

           
            
            mysqli_query($db, $sql);
        }

?>