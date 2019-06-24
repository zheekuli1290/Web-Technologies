<?php  


include('db_connect.php');


            $supName      = $_POST['supName'];
            $supAdd      = $_POST['supAdd'];
            $supNum      = $_POST['supNum'];
            $supProd   = $_POST['supProd'];
            $supPrice   = $_POST['supPrice'];


            $query      = "SELECT * FROM sup WHERE sup_name = '$supName'";
            $res        = mysqli_query($db, $query);
           
           
            if(mysqli_num_rows($res)>0){
               $_SESSION['loginError'] = 'Error';
                echo"<script>window.alert('Error');</script>";
                echo "<script>window.location.href = 'javascript:history.go(-1)' </script>";
               
               

            }else{ 

                $sql = "INSERT INTO sup(sup_name,sup_add, sup_contact, sup_product, sup_price) 
                VALUES ('$supName','$supAdd','$supNum','$supProd','$supPrice')";



           
             echo "<script>window.alert('Supplier Successfully added');</script>";
               echo "<script>window.location.href = 'javascript:history.go(-1)' </script>";
             

           
            
            mysqli_query($db, $sql);
        }

?>