<?php  


include('db_connect.php');


            $name       = $_POST['name'];
            $price      = $_POST['price'];
            $supplier   = $_POST['supplier'];
            $type       = $_POST['type'];
           
          
            $date       = date('Y/m/d H:i:s');
    

            $query      = "SELECT * FROM inventory WHERE inv_name = '$name'";
            $res        = mysqli_query($db, $query);
           
           
            if(mysqli_num_rows($res)>0){
       
                echo"<script>window.alert('Ingredient already Registered');</script>";
                echo "<script>window.location.href = 'javascript:history.go(-1)' </script>";
               
               

            }else{ 


                
                $sql = "INSERT INTO inventory(sup_id,inv_date,inv_price, inv_name,inv_type) 
                VALUES ('$supplier','$date','$price','$name','$type')";



           
             echo "<script>window.alert('Ingredient Registered');</script>";
               echo "<script>window.location.href = 'javascript:history.go(-1)' </script>";
             

           
            
            mysqli_query($db, $sql);
        }

?>