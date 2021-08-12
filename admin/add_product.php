<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ADD PRODUCTS HERE</title>
</head>
<body>
   <h3>============================Add Products to your database============================</h3>
   <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
      Category: <select name="product_category" id="category">
         <!-- <option value="select the category">Select the Category</option> -->
         <option value="men" name="men">Men's</option>
         <option value="women" name="women">Women's</option>
         <option value="child" name="child">Child's</option>
      </select>
      <br><br>
      Brand: <input type="text" name="product_brand" placeholder="Enter brand name.............">
      <br><br>
      Product Name: <input type="text" name="product_name" placeholder="Enter product name.............">
      <br><br>
      Product Description: <input type="text" name="product_description" placeholder="Enter product description.............">
      <br><br>
      Is Featured: 
      <br><input type="radio" name="product_featured" value="Yes" checked>Yes
      <br><input type="radio" name="product_featured" value="No">No
      <br><br>
      Marked Price: <input type="number" name="marked_price" placeholder="Enter marked price.............">
      <br><br>
      Discount Percent: <input type="number" name="discount_percent" placeholder="Enter discount percent.............">
      <br><br>
      <!-- Selling Price: <input type="number" name="selling_price" placeholder="Enter selling price............."> -->
      <br><br>
      <p>Select File</p>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br><br><br>
      <input type="submit" name="upload" value="Submit">
   </form>




   
   <!-- PHP CODES -->
 <?php
   $_target_dir = "product_image/";
   $product_category=$product_brand=$product_name=$product_description=$product_featured=$marked_price=$discount_percent=$selling_price=$file_path="";
   if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['upload'])){
      $product_category = $_POST['product_category'];
      $product_brand = $_POST['product_brand'];
      $product_name = $_POST['product_name'];
      $product_description = $_POST['product_description'];
      $product_featured = $_POST['product_featured'];
      $marked_price = $_POST['marked_price'];
      $discount_percent = $_POST['discount_percent'];
      $selling_price = $marked_price - ($marked_price*($discount_percent/100));
      // echo $marked_price*($discount_percent/100);
      // echo var_dump($_FILES['fileToUpload']);
      $target_file=$_target_dir.basename($_FILES['fileToUpload']['name']);
      echo $target_file;
      echo "<br>";
      move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
         $servername="localhost";
         $username="root";
         $password="";
         $db="ecommerce";
         $conn = new mysqli($servername,$username,$password,$db);

      if($conn->connect_error){
         die("Connection aborted");
      }else{
         $sql = "INSERT INTO products(product_category, product_brand, product_name, product_description, product_featured, marked_price, discount_percent, file_path)VALUES('$product_category','$product_brand','$product_name','$product_description', '$product_featured', $marked_price, $discount_percent, '$target_file')";
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