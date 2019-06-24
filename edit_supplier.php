<?php session_start();

include('db_connect.php');

if ($_SESSION['usertype']!="admin"){
    header("location:index.php");} 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit | Supplier</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css.css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php 
    $id =$_GET['valueID'];
	$query="SELECT * FROM sup WHERE sup_id='$id'";
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
                        <form  method='POST' action='edit_supplier.php'>

                            <div class='text-center'><span class='required'><b>Supplier ID:</b></span>
                            <label>".$id."</label>
                           <input id='ID' type='hidden' name='id'  value= " .$id." required>
                            </div>
           
                            <div class='form-group'>
                                <label>Supplier Name</label>
                                <input type='text' name='supName' required value=" .$row['sup_name']." class='form-control' placeholder='Supplier Name'>
                            </div>

                            <div class='form-group'>
                                <label>Supplier Address</label>
                                <input type='text' name='supAdd' required value=" .$row['sup_add']." class='form-control' placeholder='Address'>
                            </div>

                            <div class='form-group'>
                                <label>Contact Info</label>
                                <input type='text' name='supContact' required value=" .$row['sup_contact']." class='form-control' placeholder='Contact Info'>
                            </div>

                             <div class='form-group'>
                                <label>Supplier Product</label>
                                <input type='text' name='supProd' required value=" .$row['sup_product']." class='form-control' placeholder='Product'>
                            </div>

                            <div class='form-group'>
                                <label>Product Price</label>
                                <input type='text' name='supPrice' required value=" .$row['sup_price']." class='form-control' placeholder='Price'>
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
            $supName      = $_POST['supName'];
            $supAdd      = $_POST['supAdd'];
            $supContact      = $_POST['supContact'];
            $supProd   = $_POST['supProd'];
            $supPrice   = $_POST['supPrice'];


    

    $sql = "UPDATE sup SET sup_name='$supName',sup_add='$supAdd',sup_contact='$supContact',sup_product='$supProd',sup_price='$supPrice', 
            WHERE sup_id='$id'";

    if(mysqli_query( $db, $sql )){
    	echo "<script>alert('Supplier Details Updated');</script>";
        echo "<script>window.location.href = 'admin-suppliers.php' </script>";
        
    	
   
    }else{
    echo" error:".$query."<br>".mysqli_error($db);
}
}
?>



 	