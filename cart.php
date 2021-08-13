<?php
include("header.php");
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
   <link rel="stylesheet" href="">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;600" rel="stylesheet">
</head>

<body>
   <!-- ------------------------------------------Cart items details----------------------------------- -->
   <div class="small-container cart-page">
      <table>
         <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Sub Total</th>
         </tr>
         <tr>
            <td>
               <div class="cart-info">
                  <img src="./images/gp1.jpg">
                  <div>
                     <p>Red Printed T-shirt</p>
                     <small>Price: Rs. 1,500</small>
                     <br>
                     <a href=""><i class="fa fa-trash"></i></a>
                  </div>
               </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>Rs.1,500</td>
         </tr>
         <tr>
            <td>
               <div class="cart-info">
                  <img src="./images/gp2.jpg">
                  <div>
                     <p>Red Printed T-shirt</p>
                     <small>Price: Rs. 1,500</small>
                     <br>
                     <a href=""><i class="fa fa-trash"></i></a>
                  </div>
               </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>Rs.1,500</td>
         </tr>
         <tr>
            <td>
               <div class="cart-info">
                  <img src="./images/gp5.jpg">
                  <div>
                     <p>Red Printed T-shirt</p>
                     <small>Price: Rs. 1,500</small>
                     <br>
                     <a href=""><i class="fa fa-trash"></i></a>
                  </div>
               </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>Rs.1,500</td>
         </tr>
      </table>
      <div class="total-price">
         <table>
            <tr>
               <td>
                  Sub Total
               </td>
               <td>Rs. 4,500</td>
            </tr>
            <tr>
               <td>
                  Vat
               </td>
               <td>Rs. 500</td>
            </tr>
            <tr>
               <td>
                  Grand Total
               </td>
               <td>Rs. 5,000</td>
            </tr>
         </table>
      </div>
   </div>
   <!-- ------------------------------------footer starts------------------------------------ -->
   <?php
   include("footer.php");
   ?>
   <!-- ------------------------ JS for menu toggle --------------------------------- -->
   <script>
   var MenuItems = document.getElementById("MenuItems");
   MenuItems.style.maxHeight = "0px";

   function menutoggle() {
      if (MenuItems.style.maxHeight == "0px") {
         MenuItems.style.maxBlockSize = "200px";
      } else {
         MenuItems.style.maxHeight = "0px";
      }
   }
   </script>

</body>

</html>