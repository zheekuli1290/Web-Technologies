<?php
session_start();
include('../db_connect.php');
$user = $_SESSION['userID'];
if(isset($_POST['add_to_cart'])){
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
//get all item detail
        $item_array = array(
          'item_id'       =>   $_GET["id"],
          'item_name'     =>   $_POST["hidden_name"],
          'item_price'    =>   $_POST['hidden_price'],
          'item_quantity' =>   $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      //product added then this block 
      echo '<script>alert("Item allready added ")</script>';
      echo '<script>window.location = "home.php"</script>';
    }
  }
  else
  {
    //cart is empty excute this block
     $item_array = array(
                  'item_id'       =>   $_GET["id"],
                  'item_name'     =>   $_POST["hidden_name"],
                  'item_price'    =>   $_POST['hidden_price'],
                  'item_quantity' =>   $_POST["quantity"]
        );
       $_SESSION["shopping_cart"][0] = $item_array;
  }
  
}
//Cancel All
if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $key=>$value)
        {
          if($value["item_id"] == $_GET["id"])
          {
            $id = $_GET["id"];
            $quantity = $value['item_quantity'];
            $name = $value['item_name'];
            $sqlOrders = "UPDATE `orders` SET `order_state`= 'Cancelled' WHERE order_issued = '$id'";
            $res = mysqli_query( $db, $sqlOrders );
            $invQuery = "UPDATE `inventory` SET `inv_qty`= (`inv_qty` + '$quantity') WHERE inv_name = '$name'";
            $res1 = mysqli_query($db, $invQuery);
            unset($_SESSION["shopping_cart"][$key]);
            echo '<script>alert("Item removed")</script>';
            echo '<script>window.location="home.php</script>';
          }
        }
  }
}

?>

<!DOCTYPE html>
<html lang=en>

<head>

  <meta charset="utf-8">

  <title>MUTZ</title>
  <meta name="description" content="">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <meta property="og:image" content="path/to/image.jpg">
  <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#000">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#000">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#000">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" >
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="css/main.css" >

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/scroll.js"></script>
  <script>
    $(document).ready(function(){
        $("#add_btn").click(function(){
       alert('Order Placed');
      });
    });

  </script>
</head>

<body>

  <div id="my-page">

    <div id="my-header">
      <!-- Header section -->
      <header class="header">

        <div class="container">

          <div class="top_line col-lg-12">
            <!-- Logo -->
            <div class="logo col-lg-3 col-md-3 col-sm-3 col-xs-9">

              <div class="site_name">MUTZ</div>

            </div>
            <!-- End Logo -->
            <!-- Menu -->
            <nav class="menu col-lg-9 col-md-9 col-sm-9 hidden-xs">

              <ul>
                <li><a href="#top"><i class="fa fa-angle-right" aria-hidden="true"></i>Start</a></li>
                <li><a href="#pizzas"><i class="fa fa-angle-right" aria-hidden="true"></i>Choose your pizza</a></li>
                <li><a href="#extras"><i class="fa fa-angle-right" aria-hidden="true"></i>Extras</a></li>
                <li><a href="#beverages"><i class="fa fa-angle-right" aria-hidden="true"></i>Beverages</a></li>
                <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
                                
                            </ul>
              </ul>

            </nav>

            <!-- End Menu -->
</div>

        </div>

      </header>
      <!-- End Header section -->
      <!-- Algorithm -->
    </div>
    <!-- Content -->
    <div id="my-content" id="start">
      <!-- Algorithm -->
      <div class="algorithm">

        <div class="container">

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <div class="icons">
              <img src="img/Icons/pizza-slice.png" alt="">
              <div class="icons_description">
                Choose your PIZZA
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <div class="icons">
              <img src="img/Icons/taco.png" alt="">
              <div class="icons_description">
                Choose EXTRAS
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <div class="icons">
              <img src="img/Icons/soft-drink.png" alt="">
              <div class="icons_description">
                Don't forget about<br>BEVERAGES
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <div class="icons">
              <img src="img/Icons/emoticon-square-smiling-face-with-closed-eyes.png" alt="">
              <div class="icons_description">
                Enjoy :)
              </div>
            </div>

          </div>

        </div>

      </div>
      <!-- End Algorithm -->
      <!-- Choose your pizza -->

      <div class="choose_pizza" id="pizzas">

        <div class="container">

          <div class="caption">
            CHOOSE YOUR PIZZA
          </div>

          <!-- Pizza items -->

          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" id='products-pizzas'>

          <?php
                    $pizzaQuery = "SELECT * FROM inventory WHERE inv_type = 'pizza'";
                    $res = mysqli_query($db, $pizzaQuery);
                    if (mysqli_num_rows($res)>0) {
                      while($row = mysqli_fetch_assoc ($res)){
                    ?>
            <!-- Item-1 -->
            <form method="POST" action="home.php?action=add&id=<?php echo $row["inv_id"];?>">  
            <div class="item">


              <div class="col-lg-4 col-sm-12 col-xs-12">


                <div class="pizza_item">

                  <div class="pizza_item_img">

                    <img src=<?php echo $row['img_src'];?> alt="">
                    <div class="price">
                      <?php echo $row['inv_price'];?><sup>PhP</sup>
                      <input type = "hidden" name = "hidden_price" value="<?php echo $row['inv_price'];?>">
                    </div>

                  </div>

                  <div class="pizza_item_name"><?php echo $row['inv_name'];?></div>
                  <input type = "hidden" name = "hidden_name" value="<?php echo $row['inv_name'];?>">
                  <div class="pizza_item_description">
                    Nam cursus turpis et nulla accumsan, id lao
                    eque iaculis. Class aptent taciti sociosqu ad
                    per conubia nostra, per inceptos himenaeos.
                  </div>

                  <div class="ingredients">
                    <strong>Ingredients:</strong> cheese, mashrooms, chilli, garlick etc.
                  </div>
                  <h6>Add quantity</h6>
                  <input type="text" name="quantity" class="form-control" value="1" />
                  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" id="add_btn" />  
                    
                </div>

              </div>

            </div>

            <!-- End Item-1 -->
                      </form>
            <?php
            }
          }?>

          </div>
          <!-- End pizza items -->


        </div>

      </div>

      <!-- End choose your pizza -->

      <!-- Extras -->

      <div class="extras" id="extras">

        <div class="container">

          <div class="caption white">CHOOSE YOUR EXTRAS</div>

          <div class="col-lg-2"></div>

          <div class="undercaption col-lg-8">
            Nulla a quam nec lectus aliquet sollicitudin. Cras tempus feugiat orci nec scelerisque.
            Suspendisse laoreet ultrices mattis.
          </div>

          <!-- Salads items -->

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="products-extras">
          <?php
                    $pizzaQuery = "SELECT * FROM inventory WHERE inv_type = 'extra'";
                    $res = mysqli_query($db, $pizzaQuery);
                    if (mysqli_num_rows($res)>0) {
                      while($row = mysqli_fetch_assoc ($res)){
                    ?>
                                <form method="POST" action="home.php?action=add&id=<?php echo $row["inv_id"];?>">  
            <!-- Item-1 -->
            <div class="item">

              <div class="col-lg-3">

                <div class="extra_item">

                  <img src=<?php echo $row['img_src'];?> alt="">

                  <div class="price_weight">
                    <?php echo $row['inv_price'];?><sup>PhP</sup><br>
                    <input type = "hidden" name = "hidden_price" value="<?php echo $row['inv_price'];?>">
                    <strong>/100</strong> <sub>g</sub>
                  </div>

                  <div class="extra_name">
                    <?php echo $row['inv_name'];?>
                    <input type = "hidden" name = "hidden_name" value="<?php echo $row['inv_name'];?>">
                  </div>

                  <div class="extra_description">
                    Donec eget ultricies est. Aliquam
                    nisi eros, convallis
                  </div>

                  <div class="extra_ingredients">
                    <strong>Ingredients:</strong> tomato, cucumber,
                    chesse, onion etc.
                  </div>
                  <h6>Add quantity</h6>
                  <input type="text" name="quantity" class="form-control" value="1" />


                  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" id="add_btn" />    

                </div>

              </div>

            </div>
            <!-- End Item-1 -->
                                </form>
            <?php
                      }
                    }
?>
          </div>
          <!-- End salads items -->

        </div>

        <div class="col-lg-2"></div>

      </div>
      <!-- End Extras -->


      <!-- Beverages -->
      <div class="drinks" id="beverages">

        <div class="container">

          <div class="caption">
            CHOOSE YOUR DRINKS
          </div>

          <div class="col-lg-2"></div>

          <div class="col-lg-8">
            <div class="undercaption black">
              Nulla a quam nec lectus aliquet sollicitudin. Cras tempus feugiat orci nec scelerisque.
              Suspendisse laoreet ultrices mattis.
            </div>
          </div>

          <div class="col-lg-2"></div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="products-beverages">
          <?php
                    $pizzaQuery = "SELECT * FROM inventory WHERE inv_type = 'drink'";
                    $res = mysqli_query($db, $pizzaQuery);
                    if (mysqli_num_rows($res)>0) {
                      while($row = mysqli_fetch_assoc ($res)){
                    ?>
            <form method="POST" action="home.php?action=add&id=<?php echo $row["inv_id"];?>">  
            <!-- Item-1 -->
            <div class="item">

              <div class="col-lg-4">

                <div class="beverage_item">

                  <img src=<?php echo $row['img_src'];?> alt="">

                  <div class="beverage_name">
                    <?php echo $row['inv_name'];?>
                    <input type = "hidden" name = "hidden_name" value="<?php echo $row['inv_name'];?>">
                  </div>

                  <div class="beverage_price">
                    <?php echo $row['inv_price'];?><sup>PhP</sup>
                    <input type = "hidden" name = "hidden_price" value="<?php echo $row['inv_price'];?>">
                  </div>

                  <h6>Add quantity</h6>
                  <input type="text" name="quantity" class="form-control" value="1" />
                  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" id="add_btn" />    

                </div>
              </div>

            </div>
            <!-- End Item-1 -->
            </form>
<?php
                      }
                    }
?>
          </div>

        </div>
      </div>
      <!-- End drinks -->

      <!-- Discount -->
      <div class="discount">

        <div class="container">

          <div class="caption_discount">
            HURRY UP!
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="discount_img">
              <!-- Image -->
              <img src="img/discount_img.png" alt="">
            </div>
          </div>

          <div class="col-lg-8 col-md-8">

            <div class="off">

              <img src="img/off.png" alt="">

              <div class="off_phrase">
                Taste a great pack with: margharitta, summer salad and drink,
                with a really big <strong><i>discount!</i></strong>
              </div>

              <div class="date">
                Friday, 14 July
              </div>

              <div class="off_button">
                <a href="#"><i class="fa fa-check"></i> ORDER NOW</a>
              </div>

            </div>

          </div>

        </div>

      </div>
      <!-- End discount -->

      <!-- Order -->
      <div class="order">

        <div class="container">

          <div class="col-lg-6 col-md-6 col-sm-12">

            <!-- Form -->
            <!-- End Form -->

          </div>
          <!-- Order info -->
          <div class="col-lg-6 col-md-6 col-sm-12">

            <div class="order_info">

              <div class="order_border">

                <div class="order_info_caption">
                  YOUR <span>ORDER</span>
                </div>

                <div class="order_item">

                <div class="table-responsive">  

<table class="table table-bordered">  


     <tr> 


          <th width="40%" style="color:aliceblue">Item Name</th>  


          <th width="5%" style="color:aliceblue">Quantity</th>  


          <th width="20%" style="color:aliceblue">Price</th>  

          <th width="5%" style="color:aliceblue">Action</th>  


     </tr>  


        <?php 


      if(!empty($_SESSION["shopping_cart"]))


      {


       $total = 0;
        $orderQuery1 ="SELECT * FROM orders";
        $i=1;
        $res = mysqli_query($db, $orderQuery1);
        if (mysqli_num_rows($res)>0) {
          while($row = mysqli_fetch_assoc ($res)){
            $i++;
          }
        }
       foreach($_SESSION["shopping_cart"] as $key => $value)
      {

        ?>
     <tr> 
          <td style="color:aliceblue"><?php echo $value['item_name'];?></td>  

          <input type="hidden" name="<?php echo "name" . $i; ?>" value="<?php echo $value['item_name']; echo $i;?>"/>

          <td style="color:aliceblue"><?php echo $value['item_quantity']; ?></td> 

          <input type="hidden" name="<?php echo "quantity" . $i; ?>" value="<?php echo $value['item_quantity'];?>"/>

          <td style="color:aliceblue"><?php echo $value['item_price'];?>PhP</td> 

          <input type="hidden" name="<?php echo "price" . $i; ?>" value="<?php echo $value['item_price'];?>"/>

          <td><a href="home.php?action=delete&id=<?php echo $value['item_id'];?>"><span class="btn btn-danger"><?php echo "Cancel";?></span></a></td>  
     </tr>  



     <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
     $_SESSION['total'] = $total;
   }
   ?>
        <input type="hidden" name="total" value="<?php echo $total?>"/>

<?php
if(isset($_POST['add_to_cart'])){

  $name = $value['item_name'];
  $pizzaQuery = "SELECT * FROM inventory WHERE inv_name = '$name' ";
  $res = mysqli_query($db, $pizzaQuery);
  if (mysqli_num_rows($res)>0) {
    while($row = mysqli_fetch_assoc ($res)){
      $invFK = $row['inv_id'];
    }
  }
  $quantity = $value['item_quantity'];
  $price = $value['item_price'];
  $orderQuery = "INSERT INTO `orders`(`user_id`, `inv_id`, `order_issued`,`product_name`, `product_quantity`, `product_price`, `order_state`) VALUES ('$user','$invFK','$i','$name','$quantity', '$price', 'Ordered')";
  $insert = mysqli_query($db, $orderQuery);
  $deliveryQuery = "INSERT INTO `delivery`(`order_id`, `delivery_date`, `delivery_time`, `name`, `phone_number`, `address`, `comment`) VALUES ('devDate','devTime',[value-4],[value-5],[value-6],[value-7],[value-8])";
  $invQuery = "UPDATE `inventory` SET `inv_qty`= (`inv_qty` - '$quantity') WHERE inv_name = '$name'";
  $update = mysqli_query($db, $invQuery);
}
if(isset($_POST['order_btn'])){
  foreach($_SESSION["shopping_cart"] as $key=>$value)
  {
      $id = $_GET["id"];
      unset($_SESSION["shopping_cart"][$key]);
      echo '<script>alert("Order Placed")</script>';
      header('location:orders.php');
  }
}



?>


      


     <tr>  


          <td colspan="3" align="right" style="color:aliceblue">Total</td>  
 
          <td align="right" style="color:aliceblue"><?php echo number_format($total);?>PhP</td>  



     </tr> 


     <?php } ?> 

</table>  

</div>  


                </div>
                  
                  <div class="buttons">

            <form method="POST" action="orders.php">  
                    <div class="order_button">
                    <input type="submit" name="order_btn" style="margin-top:5px;" class="btn btn-success" value="Order" />  
                    </div>
            </form>
                  </div>

                </div>

              </div>
          </div>

          </div>
          <!-- End Order info -->

        </div>

      </div>
      <!-- End order -->
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <div id="my-footer">

      <div class="container">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

          <div class="contact_footer">
            CONTACT
            <ul>
              <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> info@mutz.com</a></li>
              <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +123-456-789</a></li>
              <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Cebu City, Cebu</a></li>
            </ul>

          </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

          <div class="order_footer">
            ORDER
            <ul>
              <li><a href="#start"><i class="fa fa-angle-right" aria-hidden="true"></i> START</a></li>
              <li><a href="#pizzas"><i class="fa fa-angle-right" aria-hidden="true"></i> CHOOSE YOUR PIZZA</a></li>
              <li><a href="#extras"><i class="fa fa-angle-right" aria-hidden="true"></i> EXTRAS</a></li>
              <li><a href="#beverages"><i class="fa fa-angle-right" aria-hidden="true"></i> BEVERAGES</a></li>
            </ul>
          </div>


        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

          <div class="gallery_footer">
            <div id='footer_gallery'>
              GALLERY
              <img src="img/salad-3.png" alt="">
              <!-- <img src="img/salad-2.png" alt=""> -->
            </div>
          </div>

        </div>

      </div>

      <div class="copyright">
        Copyright &copy 2019. All rights reserved.
      </div>

    </div>
    <!-- End Footer -->

  </div>


</body>
</html>
<?php
?>