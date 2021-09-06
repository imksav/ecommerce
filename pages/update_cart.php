<?php
include("../helper/connect.php");
session_start();
$user_id = $_SESSION['id'];
// $user_id = $_SESSION['id'];
$product_id = $_GET['token'];
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['update_cart'])){
   $new_product_quantity = $_POST['product_quantity'];
   // echo $user_id."<br>";
   // echo $product_id."<br>";
   // echo $new_product_quantity."<br>";

   $get_cart = "SELECT * FROM cart WHERE user_id=$user_id and status='pending' and product_id = $product_id";
   $response = $conn->query($get_cart);
   if($response->num_rows>0){
      while($row=$response->fetch_assoc()){
         // print_r($row);
         $get_cart_price = $row['price'];
         $get_cart_quantity = $row['product_quantity'];
         echo $new_product_quantity;
         var_dump($new_product_quantity);
         $updated_cart_price = ($new_product_quantity) * ($get_cart_price/$get_cart_quantity);
         $update_cart = "UPDATE cart SET product_quantity=$new_product_quantity, price=$updated_cart_price WHERE product_id=$product_id and user_id=$user_id and status='pending'";
         if($conn->query($update_cart)==TRUE){
            header("Location: cart.php");
            // print_r($update_cart);
            // echo "Record Updated";
         }
      }
   }
}