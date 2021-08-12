<?php
   //session_start();
   //if(!isset($_SESSION['user'])) header("Location:./login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>WYSIWYG | What You See Is What You Get</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="./css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;600" rel="stylesheet">
</head>

<body>
   <!-- header section -->
   <div class="header">
      <div class="container">
         <div class="navbar">
            <div class="logo">
               <a href="index.php"><img src="./images/logo.png" width="125px"></a>
            </div>
            <nav>
               <ul id="MenuItems">
                  <li><a href="#">Home</a></li>
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
         <div class="row">
            <div class="col-2">
               <h1>Lorem ipsum dolor<br><span>consectetur adipisicing.</span></h1>
               <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus possimus ipsam,<br>sint eveniet
                  facere nihil sit debitis qui ut repellat quaerat enim quae numquam est quo praesentium mollitia
                  similique eius?</p>
               <a href="./about.php" class="btn">Explore More &#9775;</a>
            </div>
            <div class="col-2">
               <img src="./images/welcome-left.png">
            </div>
         </div>
      </div>
   </div>
   <!-- header section ends -->
   <!-- featured categories starts -->
        <?php
         include_once "./connect.php";
         $data = mysqli_query($db, "SELECT * FROM products");
         // print_r($products_featured);
      ?>
   <div class="categories">
      <div class="small-container">
         <h1 class="title">Featured <span>Products</span></h1>
         <div class="row">
            <?php
               while($products_featured = mysqli_fetch_assoc($data)){
                  if($products_featured['product_featured'] == "Yes"){
                     ?>
                    <div class="col-4">
                           <a href="product_details.php?token=<?php echo $products_featured['id'] ?>"><img src="./admin/<?php echo $products_featured['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_featured['id'] ?>"><h4><?php echo $products_featured['product_name'] ?></h4>
                           <?php
                           if($products_featured['discount_percent']==0){
                              ?>
                              <p>Rs. <?php echo $products_featured['marked_price'] - (($products_featured['discount_percent']/100)* $products_featured['marked_price'] );?></p>
                             <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_featured['marked_price'] - (($products_featured['discount_percent']/100)* $products_featured['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_featured['marked_price'] ?></del> | <?php echo $products_featured['discount_percent']."%" ?></small></a>
                              <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           ?>
                           </div>
                     <?php
                  }
               }
               ?>
         </div>
      </div>
      <!-- featured categories ends -->
      <!-- Men's Products -->
      <?php
         include_once "./connect.php";
         $data = mysqli_query($db, "SELECT * FROM products");
         // print_r($products_men);
      ?>
      <div class="categories">
         <div class="small-container">
            <h1 class="title">Men's <span>Products</span></h1>
            <div class="row">
               <?php
               while($products_men = mysqli_fetch_assoc($data)){
                  if($products_men['product_category'] == "men"){
                     ?>
                    <div class="col-4">
                           <a href="product_details.php?token=<?php echo $products_men['id'] ?>"><img src="./admin/<?php echo $products_men['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_men['id'] ?>"><h4><?php echo $products_men['product_name'] ?></h4>
                           <?php
                           if($products_men['discount_percent']==0){
                              ?>
                              <p>Rs. <?php echo $products_men['marked_price'] - (($products_men['discount_percent']/100)* $products_men['marked_price'] );?></p>
                             <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_men['marked_price'] - (($products_men['discount_percent']/100)* $products_men['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_men['marked_price'] ?></del> | <?php echo $products_men['discount_percent']."%" ?></small></a>
                              <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           ?>
                           </div>
                     <?php
                  }
               }
               ?>
            </div>
         </div>
      </div>
      <!-- Women's Products -->
      <?php
         include_once "./connect.php";
         $data = mysqli_query($db, "SELECT * FROM products");
         // print_r($products_women);
      ?>
      <div class="categories">
         <div class="small-container">
            <h1 class="title">Women's <span>Products</span></h1>
            <div class="row">
               <?php
               while($products_women = mysqli_fetch_assoc($data)){
                  if($products_women['product_category'] == "women"){
                     ?>
                    <div class="col-4">
                           <a href="product_details.php?token=<?php echo $products_women['id'] ?>"><img src="./admin/<?php echo $products_women['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_women['id'] ?>"><h4><?php echo $products_women['product_name'] ?></h4>
                           <?php
                           if($products_women['discount_percent']==0){
                              ?>
                              <p>Rs. <?php echo $products_women['marked_price'] - (($products_women['discount_percent']/100)* $products_women['marked_price'] );?></p>
                             <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_women['marked_price'] - (($products_women['discount_percent']/100)* $products_women['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_women['marked_price'] ?></del> | <?php echo $products_women['discount_percent']."%" ?></small></a>
                              <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           ?>
                           </div>
                     <?php
                  }
               }
               ?>
            </div>
         </div>
      </div>
      <!-- Children' Products -->
       <?php
         include_once "./connect.php";
         $data = mysqli_query($db, "SELECT * FROM products");
         // print_r($products_children);
      ?>
      <div class="categories">
         <div class="small-container">
            <h1 class="title">Children' <span>Products</span></h1>
            <div class="row">
              <?php
               while($products_children = mysqli_fetch_assoc($data)){
                  if($products_children['product_category'] == "child"){
                     ?>
                    <div class="col-4">
                           <a href="product_details.php?token=<?php echo $products_children['id'] ?>"><img src="./admin/<?php echo $products_children['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_women['id'] ?>"><h4><?php echo $products_children['product_name'] ?></h4>
                           <?php
                           if($products_children['discount_percent']==0){
                              ?>
                              <p>Rs. <?php echo $products_children['marked_price'] - (($products_children['discount_percent']/100)* $products_children['marked_price'] );?></p>
                             <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_children['marked_price'] - (($products_children['discount_percent']/100)* $products_children['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_children['marked_price'] ?></del> | <?php echo $products_children['discount_percent']."%" ?></small></a>
                              <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <small>(25)</small>
                              </div>
                              <?php
                           }
                           ?>
                           </div>
                     <?php
                  }
               }
               ?>
            </div>
         </div>
      </div>
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