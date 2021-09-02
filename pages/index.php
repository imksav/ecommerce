<?php
 include("../helper/connect.php");
 $data = mysqli_query($conn, "SELECT * FROM products");

   //session_start();
   //if(!isset($_SESSION['user'])) header("Location:./login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>WYSIWYG | What You See Is What You Get</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="../css/style.css" rel="stylesheet">
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
               <a href="index.php"><img src="../images/logo.png" width="125px"></a>
               <?php
                session_start();
               if(isset($_SESSION['user_login_check'])) {
                  ?>
                     <p style="color: purple;  font-size: 20px;">Welcome, <?php echo  $_SESSION['user_login_check']; ?>!</p>
                  <?php
               }
            ?>
               <!-- <form action="search.php" method="POST">
                  <input type="text" name="query">
                  <input type="submit" value="Search">
               </form> -->
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
               <a href="./login.php">Login/Register</a>
               <!-- <img src="../images/user.png" width="25px" height="25px"></a> -->
               <a href="./cart.php"><img src="../images/cart.png" width="25px" height="25px"></a>
               <!-- <img src="../images/menu.png" class="menu-icon" width="25px" height="25px" onclick="menutoggle()"> -->
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
               <img src="../images/welcome-left.png">
            </div>
         </div>
      </div>
   </div>
   <!-- header section ends -->
   <!-- featured categories starts -->   
   <div class="categories">
      <div class="small-container">
         <h1 class="title">Featured <span>Products</span></h1>
         <div class="row">
            <?php
               while($products_featured = mysqli_fetch_assoc($data)){
                  if($products_featured['product_featured'] == "Yes"){
                     ?>
                    <div class="col-4">
                           <a href="product_details.php?token=<?php echo $products_featured['id'] ?>"><img src="../admin/<?php echo $products_featured['file_path'] ?>">
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
                                 <?php
                                 if($products_featured['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_featured['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
                                 <?php
                                 if($products_featured['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_featured['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
         $data = mysqli_query($conn, "SELECT * FROM products");
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
                           <a href="product_details.php?token=<?php echo $products_men['id'] ?>"><img src="../admin/<?php echo $products_men['file_path'] ?>">
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
                                 <?php
                                 if($products_men['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_men['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
                                 <?php
                                 if($products_men['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_men['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
         $data = mysqli_query($conn, "SELECT * FROM products");
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
                           <a href="product_details.php?token=<?php echo $products_women['id'] ?>"><img src="../admin/<?php echo $products_women['file_path'] ?>">
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
                                 <?php
                                 if($products_women['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_women['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
                                 <?php
                                 if($products_women['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_women['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
         $data = mysqli_query($conn, "SELECT * FROM products");
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
                           <a href="product_details.php?token=<?php echo $products_children['id'] ?>"><img src="../admin/<?php echo $products_children['file_path'] ?>">
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
                                 <?php
                                 if($products_children['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_children['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
                                 <?php
                                 if($products_children['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_children['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
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
     <?php
   include("../modules/footer.php");
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