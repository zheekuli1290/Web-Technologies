

<?php session_start();

include('db_connect.php');

if ($_SESSION['usertype']!="admin"){
    header("location:index.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Pizza Republic| Users </title>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="home/pizzarep/style.css" rel="stylesheet">
    <link href="home/pizzarep/css/bootstrap/bootstrap.min.css" rel="stylesheet">

</head>

<body>
   
   


    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area">
        <div class="container">
              <div class="col-5 col-xl-6">
            <div class="row">
                 
               
               
                <div class="left">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <a>Welcome | </button><?php echo $_SESSION['username']; ?> &nbsp<a class="btn" href="admin-user.php"><i class="fa fa-user"></i></a>
                        
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="admin-orders.php" class="pizza-logo">
                            <img class="img-thumbnail" src="assets/images/logo.png" alt="Thumbnail image" style="margin-top: -30px;"></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#" aria-controls="#" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="pizza">
                            <ul class="navbar-nav" id="pizza-nav">
                            <li class="nav-item">
                                    <a class="nav-link" href="admin-history.php">History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin-orders.php">Orders</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="admin-user.php">Users<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin-suppliers.php">Suppliers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin-inventory.php">Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ****** Header Area End ****** -->

    <!-- ****** Categories Area Start ****** -->
    
                        
                       
          
      <!-- ******Add user Modal Start ****** -->  
        <div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                     <div class="modal-header">
                     
                        <b><center class="modal-title" id="exampleModalCenteredLabel" data-toggle="modal" data-target="#exampleModalScrollable">ADD USER</center></b>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                     </div>

                <div class="modal-body">
                    <div class="container">
                        <form class="form-horizontal" method="POST" action="register_func.php">
                                <div class="form-group">
                                    <label class="control-label col-lg-4" for="email">First Name:</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="firstname" required>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="pwd">Last Name:</label>
                                    <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lastname" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Address</label>
                                    <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="address" placeholder="Enter Current address" name="address" required>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Email</label>
                                    <div class="col-sm-10">          
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Username</label>
                                    <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Password</label>
                                    <div class="col-sm-10">          
                                    <input type="Password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                <label>Phone Number</label>
                                <input type="numbers" name="phoneNumber" required value="<?php echo isset($phoneNum) ? $phoneNum : ''?>" class="form-control" placeholder="Phone Number">
                            </div>

                               <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="usertype" id="admin" value="admin"> Admin
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="usertype" id="user" value="user"> User
                                    </label>
                                </div>

                                

                     

                             <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ****** Modal End ****** -->


    <!-- ****** Table Area Start ****** -->
<center>

<table class="table table-xl-responsive"  style="margin-top: -100px">
         <table class="pizza-table">
            <table class="table table-hover">
            
                <div class="container">
                    <tr class="table">
                        <th>
                        <h5>
                            <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModalScrollable">
                                <i class="fa fa-user"> Add User</i></button></h5> </th>
                    </tr>


                    <tr class="table-success">
                         <th>ID</th>
                         <th>FIRST NAME</th>
                         <th>LAST NAME</th>
                         <th>USERNAME</th>
                         <th>EMAIL</th>
                         <th>USER TYPE</th>
                          <th>MOBILE #</th>
                         <th> </th>
                         <th> </th>
                    </tr>
                </thead>

        <?php 
            $sql        = "SELECT* FROM user";
            $res        = mysqli_query($db, $sql);
           
           
            
               if (mysqli_num_rows($res)>0) {
                    while($row= mysqli_fetch_assoc ($res)){
                        echo "<tbody>";
                       
                        echo "
                                    <td class='text-lg-center'>".$row['user_id']."</td>
                                    <td class='text-lg-center'>".$row['user_fname']."</td>
                                    <td class='text-lg-center'>".$row['user_lname']."</td>
                                    <td class='text-lg-center'>".$row['username']."</td>
                                     <td class='text-lg-center'>".$row['email']."</td>
                                    <td class='text-lg-center'>".$row['usertype']."</td>
                                    <td class='text-lg-center'>".$row['phone_number']."</td>
                                    <td>
                                    <a href='delete_user.php?valueID=".$row['user_id']."'>
                                    <button class='btn btn-danger' data-toggle='modal' onclick='location.href=\'delete_user.php\'>delete</button></a>
                                    </td>
                                    <td>
                                    <a href='edit_user.php?valueID=".$row['user_id']."'>
                                    <button class='btn btn-dark' data-toggle='modal' onclick='location.href=\'edit_user.php\'>
                                    edit</button></a></td>
                                    </td>"; }
        }?>
     
                            </tbody>
            </table>
        </table>
    </div>
</center>
</table>
    <!-- ****** Table Area End ****** -->

 

    <!-- ****** Footer Social Icon Area Start ****** -->
    <div class="social_icon_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-social-area d-flex">
                        <div class="single-icon">
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="https://www.pinterest.ph/"><i class="fa fa-pinterest.com" aria-hidden="true"></i><span>Pinterest</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="https://www.youtube.com/"><i class="fa fa-youtube-play" aria-hidden="true"></i><span>YOUTUBE</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Footer Social Icon Area End ****** -->

    
                    
                    <div class="copy_right_text text-center">
                        <p>Copyright @2019 All rights reserved | by <a href="#" target="_blank">Pizza Republic</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ****** Footer Menu Area End ****** -->

   
    <script src="home/pizzarep/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="home/pizzarep/js/bootstrap/popper.min.js"></script>
    <script src="home/pizzarep/js/bootstrap/bootstrap.min.js"></script>
    <script src="home/pizzarep/js/others/plugins.js"></script>
    <script src="home/pizzarep/js/active.js"></script>
</body>
