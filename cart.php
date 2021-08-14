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
         <?php 
            session_start();
            // session_destroy();
            // var_dump($_SESSION['cart']);
            if(isset($_SESSION['cart'])){
                     for($i=0;$i < count($_SESSION['cart']);$i++) {
                        $total_price =  $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['quantity'];
               ?>
                  <tr>
                     <td>
                        <div class="cart-info">
                           <img src="<?php echo $_SESSION['cart'][$i]['file_path'] ?>">
                           <div>
                              <p><?php echo $_SESSION['cart'][$i]['product_name'] ?></p>
                              <small>Price: Rs. <?php echo $_SESSION['cart'][$i]['price'] ?></small>
                              <br>
                              <a href=""><i class="fa fa-trash"></i></a>
                           </div>
                        </div>
                     </td>
                     <td><?php echo $_SESSION['cart'][$i]['quantity'] ?></td>
                     <td>Rs. <?php echo $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['quantity'] ?></td>
                       <tr class="total-price">
                      <td>Sub Total</td>
                     <td> <?php echo $total_price ?></td>
                     </tr>
                  </tr>
               <?php
            }
            
            }
 ?>
      </table>
   
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
   <!-- <script src="./ap1.js"></script> -->

</body>

</html>




<!-- 


   khas ma vako chai k ho session ko ek choti hernu parla
   ani teo ekchoti add gari sakeko kura lai repeat nahuni hernu parla hai?
   umm hunxaumm hunxa gardei gar na 
   khas tyo aadhi time ta session_start na vayera
   ani
 -->