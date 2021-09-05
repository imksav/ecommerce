 <!-- featured categories starts -->   
   <div class="categories">
      <div class="small-container">
         <h1 class="title">Featured <span>Products</span></h1>
         <div class="row">
            <?php
             if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['search'])){
            $search = $_POST['search'];
            $search_sql = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$search' OR product_description = '$search' OR product_brand='$search' OR product_category='$search' OR product_quantity = '$search' OR marked_price = '$search' OR discount_percent = '$search' ");
            ?>
            <?php
            while($products_search = mysqli_fetch_assoc($search_sql)){
                 if($products_search['product_featured'] == "Yes"){
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
                $data = mysqli_query($conn, "SELECT * FROM products");
               while($products_featured = mysqli_fetch_assoc($data)){
                  if($products_featured['product_featured'] == "Yes"){
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
               ?>
      </div>
   </div>
   </div>
      <!-- featured categories ends -->
      <!-- Men's category -->
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
               $data = mysqli_query($conn, "SELECT * FROM products");
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
             }
               ?>
            </div>
         </div>
</div>