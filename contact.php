<!DOCTYPE html>
<html lang="en">

<head>
   <title>Contact US | WYSIWYG</title>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="./css/style.css" rel="stylesheet">
   <link href="./css/contact.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="">
   <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
   <!-- header section -->
   <div class="container">
      <div class="navbar">
         <div class="logo">
            <a href="index.php"><img src="./images/logo.png" width="125px"></a>
         </div>
         <nav>
            <ul id="MenuItems">
               <li><a href="./index.php">Home</a></li>
               <li><a href="./about.php">About Us</a></li>
               <li><a href="./product.php">Our Products</a></li>
               <li><a href="./contact.php">Contact Us</a></li>
               <li>
               </li>
            </ul>
         </nav>
         <div class="nav-icon">
            <a href="./account.php"><img src="./images/user.png" width="25px" height="25px"></a>
            <a href="./cart.php"><img src="./images/cart.png" width="25px" height="25px"></a>
            <img src="./images/menu.png" class="menu-icon" width="25px" height="25px" onclick="menutoggle()">
         </div>
      </div>
   </div>
   <!-- header section ends -->
   <!-- --------------------------Contact form ------------------------------------------------- -->



   <!-- ------------------------------------footer starts------------------------------------ -->
   <div class="footer">
      <div class="container">
         <div class="row">
            <div class="footer-col-1">
               <h3>WYSIWYG</h3>
               <p>What You See Is What You Get</p>
               <div class="app-logo">
                  <img src="./images/play_store.png">
                  <img src="./images/app_store.png">
               </div>

            </div>
            <div class="footer-col-2">
               <img src="./images/logo.png" width="100px" height="100px">
               <p>What You See Is What You Get</p>
            </div>
            <div class="footer-col-3">
               <h3>Useful Links</h3>
               <ul>
                  <li><a href="">Home</a></li>
                  <li><a href="">About Us</a></li>
                  <li><a href="">Our Products</a></li>
                  <li><a href="">Contact Us</a></li>
                  <li><a href="">Downloads</a></li>
                  <li><a href="">Offers</a></li>
                  <li><a href="tel:9779869260497">Toll Free</a></li>
               </ul>
            </div>
            <div class="footer-col-4">
               <h3>Follow Us</h3>
               <ul>
                  <li><a href="https://www.facebook.com/imksav/">FaceBook</a></li>
                  <li><a href="https://www.instagram.com/imksav/">Instagram</a></li>
                  <li><a href="https://www.linkedin.com/in/imksav/">LinkedIn</a></li>
                  <li><a href="https://www.github.com/imksav/">GitHub</a></li>
                  <li><a href="https://www.twitter.com/imksav">Twitter</a></li>
                  <li><a href="https://www.youtube.com/c/imksav/">YouTube</a></li>
                  <li><a href="https://www.tiktok.com/@imksav/">TikTok</a></li>
               </ul>
            </div>

         </div>
         <hr>
         <div class="copyright">
            <p>© 2021 imksav <i class="fa fa-heart"></i> Made with in Nepal. ❖ All rights reserved.</p>
         </div>
      </div>
   </div>
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