<?php
include("../helper/connect.php");
include("admin_header.php");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>ADMIN PORTAL | WYSIWYG</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="admin.css" rel="stylesheet">
   </head>
   <body>
      <div class="small-container">
         <div class="row">
             <div class="col-4">
                  <div class="card">
                     <img src="../images/user.png" >
                     <a href="add_product.php">
                        <h3>ADD PRODUCTS</h3>
                     </a>
                     <p>You can add product from this card.</p>
               </div>
            </div>
            <div class="col-4">
                  <div class="card">
                     <img src="../images/user.png" >
                      <a href="display_product.php">
                        <h3>DISPLAY PRODUCTS</h3>
                     </a>
                     <p>You can view the database from this card.</p>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>