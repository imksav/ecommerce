<?php
include("./modules/header.php");
include("./helper/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>My Cart</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <div class="small-container cart-page">
      <center>
         <h2>My Shopping Cart</h2>
      </center>
      <br><br>
      <table>
         <tr>
            <th>Products</th>
            <th>Quantity</th>
            <th>Price</th>
         </tr>
         <tr>
            <td>Fruity</td>
            <td>5</td>
            <td>Rs. 175</td>
         </tr>
      </table>
      </div>
      <!-- footer -->
   <?php include("./modules/footer.php") ?>
   </body>
</html>