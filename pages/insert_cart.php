<?php
   session_start();
 include("../helper/connect.php");
   if(isset($_GET['token'])) {
      if(!isset($_SESSION['user_login_check'])){
         header("Location: ./login.php");
         }
      $token = $_GET['token'];
      $user_id=$_SESSION['id'];
       $data = mysqli_query($conn, "SELECT * FROM products WHERE id  = $token");
      $products_details = mysqli_fetch_assoc($data);
// && isset($_POST['price']) && isset($_POST['image'])
      if(isset($_POST['select_size']) && isset($_POST['quantity']) && isset($_POST['button']) && isset($_POST['price'])) {
         $size =  $_POST['select_size'];
         $quantity = $_POST['quantity'];
         $product_name = $products_details['product_name'];
         $status = "pending";
         // $item_price = $products_details['marked_price']-($products_details['discount_percent']*$products_details['marked_price']);
         $item_price = $_POST['price'];
         // $price_with_vat = $quantity * ($item_price + ($item_price*0.13));
         $file_path = $products_details['file_path'];
            $sql = " INSERT INTO  cart VALUES (NULL, $token, $user_id,  '$product_name', '$quantity', '$size', '$quantity'*'$item_price', '$file_path', '$status')";
            echo $sql;
            $run = mysqli_query($conn, $sql);
            if($run){
            header("Location:./new_cart.php");
            die();
            } 
      }
   }
?>