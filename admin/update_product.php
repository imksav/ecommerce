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


   <title>UPDATE PRODUCTS HERE</title>
</head>
<body>
   <!-- PHP CODES -->
 <?php
//  $id = $_GET['id'];
   $_target_dir = "product_image/";
   $product_category=$product_brand=$product_name=$product_description=$product_featured=$product_quantity=$marked_price=$discount_percent=$selling_price=$file_path="";
   
      
      if($conn->connect_error){
         die("Connection aborted");
      }else{
         $id = $_GET['token'];
         if(isset($_GET['token'])){
            $sql1 = "SELECT * FROM products WHERE id=$id";
            $result = $conn->query($sql1);
            $result = $result->fetch_assoc();
            $product_category =$result['product_category'];
            $product_brand = $result['product_brand'];
            $product_name = $result['product_name'];
            $product_description = $result['product_description'];
            $product_featured = $result['product_featured'];
            $product_quantity = $result['product_quantity'];
            $marked_price = $result['marked_price'];
            $discount_percent = $result['discount_percent'];
            $selling_price = $marked_price - ($marked_price*($discount_percent/100));
         }
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
            $target_file=$_target_dir.basename($_FILES['fileToUpload']['name']);
            echo $target_file;
            echo "<br>";
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
            $sql2 = "UPDATE products SET product_category='$product_category', product_brand='$product_brand', product_name='$product_name', product_description='$product_description', product_featured='$product_featured', product_quantity='$product_quantity', marked_price='$marked_price', discount_percent='$discount_percent', file_path='$target_file' WHERE id=$id ";
         echo $sql2;
         echo "<br>";
         if($conn->query($sql2)==TRUE){
            echo "<h1>Record Updated</h1>";
            header("location: display_product.php");
         }else{
            echo "<h1>Error Occured</h1>";
         }
      }
   }
   ?>
   <h3>============================Update Products on your database============================</h3>
   <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST" class="form-container">
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
      <input type="text" class="form-control"  name="product_brand" value="<?php echo $result['product_brand'] ?>">
    </div>
    <div class="form-group">
      <label for="name" class="form-label mt-4">Product Name</label>
      <input type="text" class="form-control"  name="product_name" value="<?php echo $result['product_name'] ?>">
    </div>    
    <div class="form-group">
      <label for="description" class="form-label mt-4">Product Description</label>
      <textarea class="form-control" name="product_description" value="<?php echo $result['product_description'] ?>" rows="3"></textarea>
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
    </fieldset>
        <div class="form-group">
      <label for="quantity" class="form-label mt-4">Product Quantity</label>
      <input type="number" class="form-control" name="product_quantity" value="<?php echo $result['product_quantity'] ?>">
    </div>
        <div class="form-group">
      <label for="mp" class="form-label mt-4">Marked Price</label>
      <input type="number" class="form-control"  name="marked_price" value="<?php echo $result['marked_price'] ?>">
    </div>
        <div class="form-group">
      <label for="discount" class="form-label mt-4">Discount Percent</label>
      <input type="number" class="form-control"  name="discount_percent" value="<?php echo $result['discount_percent'] ?>">
    </div>
    <div class="form-group">
      <label for="formFile" class="form-label mt-4">Select Product Image</label>
      <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $result['file_path'] ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="upload">Update</button>
  </fieldset>
   </form>




</body>
</html>
     