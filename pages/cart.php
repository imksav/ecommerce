<?php
include("../modules/header.php");
include("../helper/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Cart | WYSIWYG</title>
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
         </tr>
         <?php 
         $user_id = $_SESSION['id'];
            $data = mysqli_query($conn, "SELECT * FROM cart WHERE status='pending' AND user_id=$user_id");
            $total_price = 0;
            $vat = 13;
            while($row=$cart = mysqli_fetch_assoc($data)) {
               ?>
                  <tr>
                     <td>
                        <div class="cart-info">
                           <img src="../admin/<?php echo $cart['image'] ?>">
                           <div>
                              <p><?php echo $cart['product_name'] ?></p>
                              <small>Price: Rs. <?php echo $cart['price'] ?></small>
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
                     <td><?php echo $cart['product_quantity'] ?></td>
                     <td>Rs. <?php echo $cart['price'] * $cart['product_quantity'] ?></td>
                  </tr>
               <?php
               $total_price = $total_price+($cart['price']*$cart['product_quantity']);
            }
            ?>
            <table>
         <br><br>
               <tr>
                  <th>Total</th>
                  <th>VAT Amount (<?php echo $vat?>%)</th>
                  <th>Grand Total</th>
                  <th>Action</th>
               </tr>
               <tr>
                  <td>Rs. <?php echo $total_price ?></td>
                  <td>Rs. <?php echo $total_price* ($vat/100) ?></td>
                  <td>Rs. <?php echo $total_price + $total_price* ($vat/100) ?></td>
                  <td>
                     <form action="confirm_order.php?token=<?php echo $user_id?>" method="POST">
                     <input hidden type="text" value=<?php echo $total_price ?>>
                     <input hidden type="text" value="<?php echo $user_id?>">
                     <input type="submit" value="Confirm Order">
                     </form>
               </tr>
            </table>
      </table>
   </div>
                  <?php
               }else{
                  ?>
                  <div style="margin:20px; text-align:center;">
                       <p>You don't have anything on your cart. Please add products to cart!!!</p>
                  </div>

               <?php
               }
            ?>
   <!-- <div class="small-container cart-page">
      <table>
         <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Sub Total</th>
         </tr>
         <?php 
            // $data = mysqli_query($conn, "SELECT * FROM cart");
            // $total_price = 0;
            // $vat = 13;
            // while($cart = mysqli_fetch_assoc($data)) {
               ?>
                  <tr>
                     <td>
                        <div class="cart-info">
                           <img src="../admin/<?//php echo $cart['image'] ?>">
                           <div>
                              <p><?//php echo $cart['product_name'] ?></p>
                              <small>Price: Rs. <?//php echo $cart['price'] ?></small>
                              <br>
                              <small><?//php echo $cart['size'] ?></small>
                              <br>
                              <a href=""><i class="fa fa-trash"></i></a>
                           </div>
                        </div>
                     </td>
                     <td><?//php echo $cart['product_quantity'] ?></td>
                     <td>Rs. <?//php echo $cart['price'] * $cart['product_quantity'] ?></td>
                  </tr>
               <?//php
               //$total_price = $total_price+($cart['price']*$cart['product_quantity']);
            //}
            ?>
            <table>
               <tr>
                  <th>Total</th>
                  <th>VAT Amount</th>
                  <th>Grand Total</th>
                  <th>Action</th>
               </tr>
               <tr>
                  <td><?//php echo $total_price ?></td>
                  <td><?//php echo $total_price* ($vat/100) ?></td>
                  <td><?//php echo $total_price + $total_price* ($vat/100) ?></td>
                  <td><button>Buy</button></td>
               </tr>
            </table>
      </table>
   </div> -->
  
   <!-- ------------------------------------footer starts------------------------------------ -->
   <?php
   include("../modules/footer.php");
   ?>
   <!-- ------------------------ JS for menu toggle --------------------------------- -->
   <script>
   var MenuItems = document.getElementById("MenuItems");
   MenuItems.style.maxHeight = "0px";

   // function menutoggle() {
   //    if (MenuItems.style.maxHeight == "0px") {
   //       MenuItems.style.maxBlockSize = "200px";
   //    } else {
   //       MenuItems.style.maxHeight = "0px";
   //    }
   // }
   </script>
   <!-- <script src="./ap1.js"></script> -->
</body>
</html>