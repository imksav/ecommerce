<?php
include("../modules/header.php");
include("../helper/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>New Cart | WYSIWYG</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="./css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;600" rel="stylesheet">
</head>

<body>
   <!-- ------------------------------------------Cart items details----------------------------------- -->
   <?php
               //  session_start();
               if(isset($_SESSION['user_login_check'])) {
                  ?>
                     <div class="small-container cart-page">
               <table>
         <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Sub Total</th>
            <th>Action</th>
         </tr>
         <?php 
         $user_id = $_SESSION['id'];
            $data = mysqli_query($conn, "SELECT * FROM cart WHERE status='pending' AND user_id=$user_id");
            $total_price = 0;
            $vat = 13;
            while($row=$cart = mysqli_fetch_assoc($data)) {
            // print_r($cart);
               ?>
                  <form action="update_cart.php?token=<?php echo $cart['product_id']?>" method="POST">
                     <tr>
                     <td>
                        <div class="cart-info">
                           <img src="../admin/<?php echo $cart['image'] ?>">
                           <div>
                              <p><?php echo $cart['product_name'] ?></p>
                              <small>Price: Rs. <?php echo ($cart['price']/$cart['product_quantity']) ?></small>
                              <br>
                              <small><?php echo $cart['size'] ?></small>
                              <br>
                              <?php
                              echo "<a href='delete_cart.php?token=".$row['id']."'><i class='fa fa-trash'></i></a>";
                              ?>
                              <!-- <a href="delete_cart.php?token="><i class="fa fa-trash"></i></a> -->
                           </div>
                        </div>
                     </td>
                     <td><input type="number" name="product_quantity" value="<?php echo $cart['product_quantity'] ?>" style="width:80px; height:auto; text-align:center"></td>
                     <td>Rs. <?php echo $cart['price'] ?></td>
                     <!-- <input hidden type="text" name="item_id" value="<?php // $cart['product_id'] ?>"> -->
                     <td><input type="submit" name="update_cart" value="Update" style="width:auto; height:auto; color:white; background-color:purple; text-align:center;"></td>
                  </tr>
                  </form>
               <?php
               // $total_price = $total_price+($cart['price']);
            }
            ?>
               </tr>
            </table>
                        <form action="view_order.php?token=<?php echo $user_id?>" method="POST">
                           <input type="submit" name="view" value="Check Out" style="width:auto; height:50px; color:white; background-color:green; margin-left:500px; font-size:20px">
                        </form>
      </table>
   </div>
                  <?php
               }else{
                  ?>
                  <div style="margin:20px; text-align:center;">
                       <p>You don't have anything on your cart. Please add products to cart!!!</p>
                       <?php
                       header("Location: login.php");
                       ?>
                  </div>

               <?php
               }
            ?>
  
   <!-- ------------------------------------footer starts------------------------------------ -->
   <?php
   include("../modules/footer.php");
   ?>
   <!-- ------------------------ JS for menu toggle --------------------------------- -->
   <script>
   var MenuItems = document.getElementById("MenuItems");
   MenuItems.style.maxHeight = "0px";
   </script>
</body>
</html>