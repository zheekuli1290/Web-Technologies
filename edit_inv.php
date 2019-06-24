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


<?php 
    $id =$_GET['valueID'];
	$query="SELECT * FROM inventory WHERE inv_id='$id'";
	$result=mysqli_query($db,$query);
	$row=mysqli_fetch_array($result);
    
        
	
echo "
 </head>
    <body id='background'>
            <div class='col-xs-4 col-md-offset-7'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                       <legend id='register-sign'>Update</legend>
                       <br>
                       <?php include_once 'login-error.php';?>
                        <form  method='POST' action='edit_inv.php'>


                        
                            <div class='text-center'><span class='required'><b>Supply ID:</b></span>
                            <label>".$id."</label>
                           <input id='ID' type='hidden' name='id'  value= " .$id." required>
                            </div>
           
                            <div class='form-group'>
                                <label>Supply Name</label>
                                <input type='text' name='name' required value=" .$row['inv_name']." class='form-control' placeholder='First Name' disabled>
                            </div>";

//Dropdown Start
                $sql        = "SELECT* FROM sup";
                $res        = mysqli_query($db, $sql);
               
               
                $select= 'Supplier:</b><select class="form-control" name="supplier">';
                   if (mysqli_num_rows($res)>0) {
                        while($row1= mysqli_fetch_assoc ($res)){
                        $select.='<option name="supplier" value="'.$row1['sup_id'].'">'.$row1['sup_name'].'</option>';}
                        }
                
                $select.='</select>';
                echo $select;
                //Dropdown end

        echo"

                             <div class='form-group'>
                                <label>Supply Amount</label>
                                <input type='number' name='qty' required value=" .$row['inv_qty']." class='form-control' placeholder='Amount'>
                            </div>

                            

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
            $supplier   = $_POST['supplier'];
            $amount     = $_POST['qty'];
            $date       = date('Y/m/d H:i:s');
           

    $sql = "UPDATE inventory SET sup_id='$supplier',inv_qty='$amount', inv_date='$date'      
            WHERE inv_id='$id'";

    if(mysqli_query( $db, $sql )){
    	echo "<script>alert('Details Updated');</script>";
        echo "<script>window.location.href = 'admin-inventory.php' </script>";
        
    	
   
    }else{
    echo" error:".$query."<br>".mysqli_error($db);
}
}
?>



 	