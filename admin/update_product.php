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
            // echo $marked_price*($discount_percent/100);
            // echo var_dump($_FILES['fileToUpload']);
            // $target_file=$_target_dir.basename($_FILES['fileToUpload']['name']);
            // echo $target_file;
            // echo "<br>";
            // move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
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
            // echo $marked_price*($discount_percent/100);
            // echo var_dump($_FILES['fileToUpload']);
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
   <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
      Category: <select name="product_category" id="category">
         <!-- <option value="select the category">Select the Category</option> -->
         <option value="men" name="men">Men's</option>
         <option value="women" name="women">Women's</option>
         <option value="child" name="child">Child's</option>
      </select>
      <br><br>
      Brand: <input type="text" name="product_brand" value="<?php echo $result['product_brand'] ?>">
      <br><br>
      Product Name: <input type="text" name="product_name" value="<?php echo $result['product_name'] ?>">
      <br><br>
      Product Description: <input type="text" name="product_description" value="<?php echo $result['product_description'] ?>">
      <br><br>
      Is Featured: 
      <br><input type="radio" name="product_featured" value="Yes">Yes
      <br><input type="radio" name="product_featured" value="No">No
      <br><br>
      Quantity: <input type="number" name="product_quantity" value="<?php echo $result['product_quantity'] ?>">
      <br><br>
      Marked Price: <input type="number" name="marked_price" value="<?php echo $result['marked_price']?>">
      <br><br>
      Discount Percent: <input type="number" name="discount_percent" value="<?php echo $result['product_quantity'] ?>">
      <br><br>
      <p>Select File</p>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br><br><br>
      <input type="submit" name="upload" value="Update">
   </form>




</body>
</html>