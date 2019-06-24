

<?php session_start();

include('db_connect.php');

if ($_SESSION['usertype']!="admin"){
    header("location:index.php");
} 

    $id =$_GET['valueID'];
    $sql = "DELETE FROM inventory WHERE inv_id='$id'";
    if(mysqli_query( $db, $sql )){
      header('location:admin-inventory.php');
     
}

?>



      