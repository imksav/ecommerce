<?php
include("../helper/connect.php");
include("admin_header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

   <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.min.css">

   <title>ADD PRODUCTS HERE</title>
</head>
<body>
   <div class="account">
         <h3 style="text-align:center;">============================Adding Products On Your Database============================</h3>
   </div>
   
   <!-- Bootwatch Darkly -->
   <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
  <fieldset>
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Product Category</label>
      <select class="form-select" name="product_category" id="category">
        <option value="men" name="men">Men</option>
        <option value="women" name="wommen">Women</option>
        <option value="child" name="child">Child</option>
      </select>
    </div>
    <div class="form-group">
      <label for="brand" class="form-label mt-4">Product Brand</label>
      <input type="text" class="form-control"  name="product_brand" placeholder="Enter brand name........">
    </div>
    <div class="form-group">
      <label for="name" class="form-label mt-4">Product Name</label>
      <input type="text" class="form-control"  name="product_name" placeholder="Enter product name........">
    </div>    
    <div class="form-group">
      <label for="description" class="form-label mt-4">Product Description</label>
      <textarea class="form-control" name="product_description" placeholder="Enter product description............." rows="3"></textarea>
    </div>
    <fieldset class="form-group">
      <legend class="mt-4">Radio buttons</legend>
      <div class="form-check">
         <label class="form-check-label">
         <input type="radio" class="form-check-input" name="product_featured" value="Yes" checked="">Yes
         </label>
      </div>
      <div class="form-check">
        <label class="form-check-label">
         <input type="radio" class="form-check-input" name="product_featured" value="No">No
         </label>
      </div>
    <div class="form-group">
      <label for="formFile" class="form-label mt-4">Select Product Image</label>
      <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
    </div>
    </fieldset>
        <div class="form-group">
      <label for="quantity" class="form-label mt-4">Product Quantity</label>
      <input type="number" class="form-control" name="product_quantity" placeholder="Enter product quantity.............">
    </div>
        <div class="form-group">
      <label for="mp" class="form-label mt-4">Marked Price</label>
      <input type="number" class="form-control"  name="marked_price" placeholder="Enter marked price.............">
    </div>
        <div class="form-group">
      <label for="discount" class="form-label mt-4">Discount Percent</label>
      <input type="number" class="form-control"  name="discount_percent" placeholder="Enter discount percent.............">
    </div>
    <button type="submit" class="btn btn-primary" name="upload" value="Submit">Submit</button>
  </fieldset>
</form>
   <!-- Ends -->
   <!-- PHP CODES -->
 <?php
   $_target_dir = "product_image/";
   $product_category=$product_brand=$product_name=$product_description=$product_featured=$product_quantity=$marked_price=$discount_percent=$selling_price=$file_path="";
   if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['upload'])){
      $product_category = $_POST['product_category'];
      $product_brand = $_POST['product_brand'];
      $product_name = $_POST['product_name'];
      $product_description = $_POST['product_description'];
      $product_featured = $_POST['product_featured'];
      $product_quantity = $_POST['product_quantity'];
      $marked_price = $_POST['marked_price'];
      $discount_percent = $_POST['discount_percent'];
      $selling_price = $marked_price - ($marked_price*($discount_percent/100));
      // echo $marked_price*($discount_percent/100);
      // echo var_dump($_FILES['fileToUpload']);
      $target_file=$_target_dir.basename($_FILES['fileToUpload']['name']);
      echo $target_file;
      echo "<br>";
      move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
   
      if($conn->connect_error){
         die("Connection aborted");
      }else{
         $sql = "INSERT INTO products(product_category, product_brand, product_name, product_description, product_featured, product_quantity, marked_price, discount_percent, file_path)VALUES('$product_category','$product_brand','$product_name','$product_description', '$product_featured', $product_quantity, $marked_price, $discount_percent, '$target_file')";
         // echo $sql;
         echo "<br>";
         if($conn->query($sql)==TRUE){
            echo "<h1>Record Inserted</h1>";
            header("location: add_product.php");
         }else{
            echo "<h1>Error Occured</h1>";
         }
      }
   }
   ?>




</body>
</html>

