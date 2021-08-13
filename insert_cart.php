<?php
   session_start();
   include_once "./connect.php";
   if(isset($_GET['token'])) {
      $token = $_GET['token'];
       $data = mysqli_query($db, "SELECT * FROM products WHERE id  = $token");
      $products_details = mysqli_fetch_assoc($data);

      if(isset($_POST['select_size']) && isset($_POST['quantity']) && isset($_POST['button']) && isset($_POST['price']) && isset($_POST['image'])) {
         
         $size =  $_POST['select_size'];
         $quantity = $_POST['quantity'];
         $status = "pending";
         $price = $_POST['price'];
         $path = $_POST['image'];

            $count = count($_SESSION['cart']);

            $_SESSION['cart'][$count]['token'] = $token;
            $_SESSION['cart'][$count]['product_name'] = $products_details['product_name'];
            $_SESSION['cart'][$count]['size'] = $size;
            $_SESSION['cart'][$count]['quantity'] = $quantity;
            $_SESSION['cart'][$count]['price'] = $price;
            $_SESSION['cart'][$count]['image'] = $path;

            header("Location:./cart.php");
      }
   }
?>