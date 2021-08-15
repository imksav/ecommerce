<?php
include("./modules/header.php");
include("./helper/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Product | WYSIWYG</title>
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
   <?php
         $data = mysqli_query($conn, "SELECT * FROM products");
         // print_r($products_all);
      ?>
   <div class="small-container">
      <div class="row row-2">
         <h2>All Products</h2>
         <select>
            <option>Default Sorting</option>
            <option>Sort by price</option>
            <option>Sort by rating</option>
            <option>Sort by category</option>
         </select>
      </div>
      <div class="row">
         <?php
               while($products_all = mysqli_fetch_assoc($data)){
                  if($products_all['product_category'] == "men" || $products_all['product_category'] == "women" || $products_all['product_category'] == "child"){
                     ?>
                    <div class="col-4">
                           <a href="product_details.php?token=<?php echo $products_all['id'] ?>"><img src="./admin/<?php echo $products_all['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_all['id'] ?>"><h4><?php echo $products_all['product_name'] ?></h4>
                           <?php
                           if($products_all['discount_percent']==0){
                              ?>
                              <p>Rs. <?php echo $products_all['marked_price'] - (($products_all['discount_percent']/100)* $products_all['marked_price'] );?></p>
                            <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <?php
                                 if($products_all['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_all['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_all['marked_price'] - (($products_all['discount_percent']/100)* $products_all['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_all['marked_price'] ?></del> | <?php echo $products_all['discount_percent']."%" ?></small></a>
                             <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <?php
                                 if($products_all['product_quantity']==0){
                                    ?>
                                    <small>Out of Stock</small>
                              <?php
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_all['product_quantity']?>)</small>
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
         <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#10161;</span>
         </div>
   </div>
   <!-- ------------------------------------footer starts------------------------------------ -->
  <?php
   include("./modules/footer.php");
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