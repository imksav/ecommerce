<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Product Details | WYSIWYG</title>
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
      $token = $_GET['token'];
      if(isset($_GET['token'])){
         include_once "./connect.php";
         $data = mysqli_query($db, "SELECT * FROM products WHERE id  = $token");
         //  print_r(mysqli_fetch_assoc($data));
         $products_details = mysqli_fetch_assoc($data);
           ?>
       <!---------------------------------- single product details page ---------------------------------->
         <div class="small-container single-product">
         <div class="row">
            <div class="col-2">
               <img src="./admin/<?php echo $products_details['file_path'] ?>" width="70%" height="100%" id="ProductImg">
            </div>
            <div class="col-2">
               <h6><?php echo $products_details['product_brand']?></h6>
               <?php
               // while()
               if($products_details['discount_percent']==0){
                  ?>
               <h5><?php echo $products_details['product_name'] ?></h5>
               <h4>Rs. <?php echo $products_details['marked_price'] - ($products_details['discount_percent']/100)* $products_details['marked_price'] ?></h4>
               <select>
                  <option>Select size</option>
                  <option>XXL</option>
                  <option>XL</option>
                  <option>Extra Large</option>
                  <option>Medium</option>
                  <option>Small</option>
               </select>
               <input type="number" value="1">
               <a href="" class="btn">Add to Cart</a>
               <h3>Product Details <i class="fa fa-home"></i> </h3>
               <br>
               <p><?php echo $products_details['product_description'] ?></p>
               <?php
               }
               else{
                  ?>
               <small><del>Rs. <?php echo $products_details['marked_price']."%" ?></del> | <?php echo $products_details['discount_percent']."%" ?></small>
               <h5><?php echo $products_details['product_name'] ?></h5>
               <h4>Rs. <?php echo $products_details['marked_price'] - ($products_details['discount_percent']/100)* $products_details['marked_price'] ?></h4>
               <select>
                  <option>Select size</option>
                  <option>XXL</option>
                  <option>XL</option>
                  <option>Extra Large</option>
                  <option>Medium</option>
                  <option>Small</option>
               </select>
               <input type="number" value="1">
               <a href="" class="btn">Add to Cart</a>
               <h3>Product Details <i class="fa fa-home"></i> </h3>
               <br>
               <p><?php echo $products_details['product_description'] ?></p>
               <?php
               }
               ?>
            </div>
         </div>
      </div>
      <?php
   }
   else{
            echo "404 - Page Not Found";
            echo "<button>Back</button>";
         }
   ?>
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



   <!-- ----------------------------JS for product gallery---------------------------- -->
   <script>
   var ProductImg = document.getElementById("ProductImg");
   var SmallImg = document.getElementsByClassName("small-img");
   SmallImg[0].onclick = function() {
      ProductImg.src = SmallImg[0].src;
   }
   SmallImg[1].onclick = function() {
      ProductImg.src = SmallImg[1].src;
   }
   SmallImg[2].onclick = function() {
      ProductImg.src = SmallImg[2].src;
   }
   SmallImg[3].onclick = function() {
      ProductImg.src = SmallImg[3].src;
   }
   </script>
</body>
</html>