<?php
   session_start();
   include_once "./connect.php";
   if(isset($_GET['token'])) {
      $token = $_GET['token'];
       $data = mysqli_query($db, "SELECT * FROM products WHERE id  = $token");
      $products_details = mysqli_fetch_assoc($data);
// && isset($_POST['price']) && isset($_POST['image'])
      if(isset($_POST['select_size']) && isset($_POST['quantity']) && isset($_POST['button']) && isset($_POST['price'])) {
         
         $size =  $_POST['select_size'];
         $quantity = $_POST['quantity'];
         $product_name = $products_details['product_name'];
         $status = "pending";
         // $item_price = $products_details['marked_price']-($products_details['discount_percent']*$products_details['marked_price']);
         $item_price = $_POST['price'];
         $file_path = $products_details['file_path'];

            $count = count($_SESSION['cart']);

            $_SESSION['cart'][$count]['token'] = $token;
            $_SESSION['cart'][$count]['product_name'] = $product_name;
            $_SESSION['cart'][$count]['size'] = $size;
            $_SESSION['cart'][$count]['quantity'] = $quantity;
            $_SESSION['cart'][$count]['price'] = $item_price;
            $_SESSION['cart'][$count]['file_path'] = $file_path;

            header("Location:./cart.php");
      }
   }
?>