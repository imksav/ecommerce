<?php
 include("../helper/connect.php");
 include("../modules/header.php");
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
<form method="POST" action="">
				<div class="form-inline" style="float:right;margin-right:20px;">
					<label style="margin:10px;">Category:</label>
					<select class="control-form" name="category">
						<option value="men">Men</option>
						<option value="women">Women</option>
						<option value="child">Children</option>
					</select>
					<button class="btn btn-primary" name="filter" style="width:auto;height:auto;">Filter</button>
					<button class="btn btn-success" name="reset" style="width:auto;height:auto;">Reset</button>
				</div>
</form>
<div class="categories">
   <div class="small-container">
      <h1 class="title">All Products</h1>
      <div class="row">
         <?php
         if(isset($_POST['filter'])){
            $product_category = $_POST['category'];
            $query = mysqli_query($conn, "SELECT * FROM products WHERE product_category='$product_category' ") or die(mysqli_error());
            while($fetch=mysqli_fetch_array($query)){
                if($fetch['product_category'] == "$product_category"){
                   ?>
                   <div class="col-4">
                      <?php
                      if($fetch['product_quantity']>0){
                         ?>
                         <a href="product_details.php?token=<?php echo $fetch['id'] ?>"><img src="../admin/<?php echo $fetch['file_path'] ?>">
                         <a href="product_details.php?token=<?php echo $fetch['id'] ?>"><h4><?php echo $fetch['product_name'] ?></h4>
                         <?php
                      }else{
                         ?>
                         <a href="product_details.php"><img src="../admin/<?php echo $fetch['file_path'] ?>">
                         <a href="product_details.php"><h4><?php echo $fetch['product_name'] ?></h4>
                         <?php
                      }
                      ?><?php
                      if($fetch['discount_percent']==0){
                         ?>
                         <p>Rs. <?php echo $fetch['marked_price'] - (($fetch['discount_percent']/100)* $fetch['marked_price'] );?></p>
                         <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <?php
                            if($fetch['product_quantity']<=0){
                               ?>
                               <small>Out of Stock</small>
                               <?php
                            }else{
                               ?>
                                <small>(<?php echo $fetch['product_quantity']?>)</small>
                               <?php
                            }
                            ?>
                         </div>
                         <?php
                      }else{
                         ?>
                         <p>Rs. <?php echo $fetch['marked_price'] - (($fetch['discount_percent']/100)* $fetch['marked_price'] );?></p>
                         <small><del>Rs <?php echo $fetch['marked_price'] ?></del> | <?php echo $fetch['discount_percent']."%" ?></small></a>
                         <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-0"></i>
                            <?php
                            if($fetch['product_quantity']<=0){
                               ?>
                               <small>Out of Stock</small>
                               <?php
                            }else{
                               ?>
                               <small>(<?php echo $fetch['product_quantity']?>)</small>
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
         }else if(isset($_POST['search'])){
            $search = $_POST['search'];
            // echo $search;
            $search_sql = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$search' OR product_description = '$search' OR product_brand='$search' OR product_category='$search' OR product_quantity = '$search' OR marked_price = '$search' OR discount_percent = '$search' ");
            ?>
            <?php
            while($products_search = mysqli_fetch_assoc($search_sql)){
               // print_r($products_search);
               if($products_search['product_name']=="$search" or $products_search['product_category']=="$search" or $products_search['product_brand']=="$search" or $products_search['product_description']=="$search" or $products_search['marked_price']=="$search"){
                  ?>
                  <div class="col-4">
                      <?php
                      if($products_search['product_quantity']>0){
                         ?>
                         <a href="product_details.php?token=<?php echo $products_search['id'] ?>"><img src="../admin/<?php echo $products_search['file_path'] ?>">
                         <a href="product_details.php?token=<?php echo $products_search['id'] ?>"><h4><?php echo $products_search['product_name'] ?></h4>
                         <?php
                      }else{
                         ?>
                         <a href="product_details.php"><img src="../admin/<?php echo $products_search['file_path'] ?>">
                         <a href="product_details.php"><h4><?php echo $products_search['product_name'] ?></h4>
                         <?php
                      }
                      ?><?php
                      if($products_search['discount_percent']==0){
                         ?>
                         <p>Rs. <?php echo $products_search['marked_price'] - (($products_search['discount_percent']/100)* $products_search['marked_price'] );?></p>
                         <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <?php
                            if($products_search['product_quantity']<=0){
                               ?>
                               <small>Out of Stock</small>
                               <?php
                            }else{
                               ?>
                                <small>(<?php echo $products_search['product_quantity']?>)</small>
                               <?php
                            }
                            ?>
                         </div>
                         <?php
                      }else{
                         ?>
                         <p>Rs. <?php echo $products_search['marked_price'] - (($products_search['discount_percent']/100)* $products_search['marked_price'] );?></p>
                         <small><del>Rs <?php echo $products_search['marked_price'] ?></del> | <?php echo $products_search['discount_percent']."%" ?></small></a>
                         <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-0"></i>
                            <?php
                            if($products_search['product_quantity']<=0){
                               ?>
                               <small>Out of Stock</small>
                               <?php
                            }else{
                               ?>
                               <small>(<?php echo $products_search['product_quantity']?>)</small>
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
         }else{
            $data = mysqli_query($conn, "SELECT * FROM products");
            while($products_all = mysqli_fetch_assoc($data)){
                  // print_r($products_featured);
                  // if($products_featured['product_category'] == "Yes"){
                     ?>
                    <div class="col-4">
                            <?php
                       if($products_all['product_quantity']>0){
                          ?>
                           <a href="product_details.php?token=<?php echo $products_all['id'] ?>"><img src="../admin/<?php echo $products_all['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_all['id'] ?>"><h4><?php echo $products_all['product_name'] ?></h4>
                            <?php
                       }else{
                          ?>
                          <a href="product_details.php"><img src="../admin/<?php echo $products_all['file_path'] ?>">
                           <a href="product_details.php"><h4><?php echo $products_all['product_name'] ?></h4>
                           <?php
                           }
                           ?>
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
                                 if($products_all['product_quantity']<=0){
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
                                 if($products_all['product_quantity']<=0){
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
                  // }
               }
         }
               // this is end of else if
               // print_r($fetch);
               // $filter_data_sql = "SELECT"
               ?>
      
      </div>
   </div>
</div>


















<!-- Footer -->
     <?php
   include("../modules/footer.php");
   ?>
</body>
   </html>
