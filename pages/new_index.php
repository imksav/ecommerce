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
   <!-- header section -->
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
         <?php
         if(isset($_POST['filter'])){
            $product_category = $_POST['category'];
            $query = mysqli_query($conn, "SELECT * FROM products WHERE product_category='$product_category' ") or die(mysqli_error());
            while($fetch=mysqli_fetch_array($query)){
               echo"
               <tr>
               <td>".$fetch['product_name']."</td>      
               <td>".$fetch['product_category']."</td> <br>
               </tr>";
            }
         }
         ?>
   <!-- header section ends -->
       <!-- Featured's Products -->
      <?php
         $data = mysqli_query($conn, "SELECT * FROM products");
      ?>
      <div class="categories">
         <div class="small-container">
            <h1 class="title">Featured's <span>Products</span></h1>
            <div class="row">
                <?php
             if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['search'])){
            $search = $_POST['search'];
            $search_sql = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$search' OR product_description = '$search' OR product_brand='$search' OR product_category='$search' OR product_quantity = '$search' OR marked_price = '$search' OR discount_percent = '$search' ");
            ?>
               <?php
                while($products_search = mysqli_fetch_assoc($search_sql)){
               // print_r($products_search);
                if($products_search['product_category'] == "Yes"){
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
                           ?>
                           <?php
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
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_search['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_search['marked_price'] - (($products_search['discount_percent']/100)* $products_search['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_search['marked_price'] ?></del> | <?php echo $products_search['discount_percent']."%" ?></small></a>
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
                                 }
                                 else{
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
               while($products_featured = mysqli_fetch_assoc($data)){
                  // print_r($products_featured);
                  if($products_featured['product_category'] == "Yes"){
                     ?>
                    <div class="col-4">
                            <?php
                       if($products_featured['product_quantity']>0){
                          ?>
                           <a href="product_details.php?token=<?php echo $products_featured['id'] ?>"><img src="../admin/<?php echo $products_featured['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_featured['id'] ?>"><h4><?php echo $products_featured['product_name'] ?></h4>
                            <?php
                       }else{
                          ?>
                          <a href="product_details.php"><img src="../admin/<?php echo $products_featured['file_path'] ?>">
                           <a href="product_details.php"><h4><?php echo $products_featured['product_name'] ?></h4>
                           <?php
                           }
                           ?>
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
                                 if($products_featured['product_quantity']<=0){
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
                                 if($products_featured['product_quantity']<=0){
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
            }  
               ?>
            </div>
         </div>
      </div>


      <!-- Men's Products -->
      <?php
        $data = mysqli_query($conn, "SELECT * FROM products");
      ?>
      <div class="categories">
         <div class="small-container">
            <h1 class="title">Men's <span>Products</span></h1>
            <div class="row">
                <?php
             if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['search'])){
            $search = $_POST['search'];
            $search_sql = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$search' OR product_description = '$search' OR product_brand='$search' OR product_category='$search' OR product_quantity = '$search' OR marked_price = '$search' OR discount_percent = '$search' ");
            ?>
               <?php
                while($products_search = mysqli_fetch_assoc($search_sql)){
               // print_r($products_search);
                if($products_search['product_category'] == "men"){
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
                           ?>
                           <?php
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
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_search['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_search['marked_price'] - (($products_search['discount_percent']/100)* $products_search['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_search['marked_price'] ?></del> | <?php echo $products_search['discount_percent']."%" ?></small></a>
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
                                 }
                                 else{
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
               while($products_men = mysqli_fetch_assoc($data)){
                  if($products_men['product_category'] == "men"){
                     ?>
                    <div class="col-4">
                            <?php
                       if($products_men['product_quantity']>0){
                          ?>
                           <a href="product_details.php?token=<?php echo $products_men['id'] ?>"><img src="../admin/<?php echo $products_men['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_men['id'] ?>"><h4><?php echo $products_men['product_name'] ?></h4>
                            <?php
                       }else{
                          ?>
                          <a href="product_details.php"><img src="../admin/<?php echo $products_men['file_path'] ?>">
                           <a href="product_details.php"><h4><?php echo $products_men['product_name'] ?></h4>
                           <?php
                           }
                           ?>
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
                                 if($products_men['product_quantity']<=0){
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
                                 if($products_men['product_quantity']<=0){
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
             if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['search'])){
            $search = $_POST['search'];
            $search_sql = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$search' OR product_description = '$search' OR product_brand='$search' OR product_category='$search' OR product_quantity = '$search' OR marked_price = '$search' OR discount_percent = '$search' ");
            ?>
               <?php
                while($products_search = mysqli_fetch_assoc($search_sql)){
               // print_r($products_search);
                if($products_search['product_category'] == "women"){
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
                           ?>
                           <?php
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
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_search['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_search['marked_price'] - (($products_search['discount_percent']/100)* $products_search['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_search['marked_price'] ?></del> | <?php echo $products_search['discount_percent']."%" ?></small></a>
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
                                 }
                                 else{
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
               while($products_women = mysqli_fetch_assoc($data)){
                  if($products_women['product_category'] == "women"){
                     ?>
                    <div class="col-4">
                            <?php
                       if($products_women['product_quantity']>0){
                          ?>
                           <a href="product_details.php?token=<?php echo $products_women['id'] ?>"><img src="../admin/<?php echo $products_women['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_women['id'] ?>"><h4><?php echo $products_women['product_name'] ?></h4>
                            <?php
                       }else{
                          ?>
                          <a href="product_details.php"><img src="../admin/<?php echo $products_women['file_path'] ?>">
                           <a href="product_details.php"><h4><?php echo $products_women['product_name'] ?></h4>
                           <?php
                           }
                           ?>
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
                                 if($products_women['product_quantity']<=0){
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
                                 if($products_women['product_quantity']<=0){
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
            }  
               ?>
            </div>
         </div>
      </div>


          <!-- Children's Products -->
      <?php
        $data = mysqli_query($conn, "SELECT * FROM products");
      ?>
      <div class="categories">
         <div class="small-container">
            <h1 class="title">Children's <span>Products</span></h1>
            <div class="row">
                <?php
             if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['search'])){
            $search = $_POST['search'];
            $search_sql = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$search' OR product_description = '$search' OR product_brand='$search' OR product_category='$search' OR product_quantity = '$search' OR marked_price = '$search' OR discount_percent = '$search' ");
            ?>
               <?php
                while($products_search = mysqli_fetch_assoc($search_sql)){
               // print_r($products_search);
                if($products_search['product_category'] == "child"){
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
                           ?>
                           <?php
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
                                 }
                                 else{
                                    ?>
                                    <small>(<?php echo $products_search['product_quantity']?>)</small>
                                    <?php
                              }   
                              ?>
                              </div>
                              <?php
                           }
                           else{
                              ?>
                              <p>Rs. <?php echo $products_search['marked_price'] - (($products_search['discount_percent']/100)* $products_search['marked_price'] );?></p>
                              <small><del>Rs <?php echo $products_search['marked_price'] ?></del> | <?php echo $products_search['discount_percent']."%" ?></small></a>
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
                                 }
                                 else{
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
               while($products_children = mysqli_fetch_assoc($data)){
                  if($products_children['product_category'] == "child"){
                     ?>
                    <div class="col-4">
                            <?php
                       if($products_children['product_quantity']>0){
                          ?>
                           <a href="product_details.php?token=<?php echo $products_children['id'] ?>"><img src="../admin/<?php echo $products_children['file_path'] ?>">
                           <a href="product_details.php?token=<?php echo $products_children['id'] ?>"><h4><?php echo $products_children['product_name'] ?></h4>
                            <?php
                       }else{
                          ?>
                          <a href="product_details.php"><img src="../admin/<?php echo $products_children['file_path'] ?>">
                           <a href="product_details.php"><h4><?php echo $products_children['product_name'] ?></h4>
                           <?php
                           }
                           ?>
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
                                 if($products_children['product_quantity']<=0){
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
                                 if($products_children['product_quantity']<=0){
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