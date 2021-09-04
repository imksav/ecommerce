<?php
include("../helper/connect.php");

$user_id = $_GET['token'];
// echo $user_id."<br>";
// $sql = "SELECT * from cart WHERE user_id = $user_id and status='pending'";
// echo $sql;
// $result = $conn->query($sql);
//  if($result->num_rows>0){
//      echo "<table>
//          <tr>
//          <th>Product ID</th>
//          <th>User ID</th>
//          <th>Product Name</th>
//          <th>Quantity</th>
//          <th>Price</th>
//          <th>Status</th>
//          <th colspan=2>Action</th>
//          </tr>";
//          while($row=$result->fetch_assoc()){
//             $total_price = $row['price'];
//             $final_price = $total_price + (0.13*$total_price);
//             echo "<tr>";
//             echo "<td>".$row['product_id']."</td>";
//             echo "<td>".$row['user_id']."</td>";
//             echo "<td>".$row['product_name']."</td>";
//             echo "<td>".$row['product_quantity']."</td>";
//             echo "<td>".$final_price."</td>";
//             echo "<td>".$row['status']."</td>";
//             echo "<td>Order</td>";
//             echo "<td>Cancel</td>";
//             // echo "<td><a href='order_success.php?token=".$row['user_id']."'>Confirm</a></td>";
//             // echo "<td><a href='cart.php'>Cancel</a></td>";
//             echo "</tr>";
//          }
//          echo "</table>";
//       }
   if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['view'])){
         $user_id = $_GET['token'];
         $get_cart = "SELECT * FROM cart WHERE user_id=$user_id and status='pending'";
         $response = $conn->query($get_cart);
         if($response->num_rows>0){
            while($row=$response->fetch_assoc()){
               print_r($row);
               $get_cart_id= $row['id'];
               $get_cart_price = $row['price'];
               $get_cart_product_id = $row['product_id'];
               $get_cart_quantity = $row['product_quantity'];
               $final_checkout_price = ($get_cart_price)+($get_cart_price*0.13);
               echo "<br>";
               $confirm_order = "UPDATE cart SET status='confirmed' WHERE product_id=$get_cart_product_id and id=$get_cart_id and status='pending'";
               if($conn->query($confirm_order)==TRUE){
                  echo "Record Updated <br>";
                  // update database here
                  // $update_cart_after_checkout = "UPDATE cart SET status='confirmed' WHERE product_id=$get_cart_product_id and id=$get_cart_id and status='pending'";
                  // if($conn->query($update_cart_after_checkout)==TRUE){
                  $get_updating_products_database = "SELECT * FROM products WHERE id=$get_cart_product_id";
                  echo $get_updating_products_database;
                  $response = $conn->query($get_updating_products_database);
                  // $data = $response->fetch_assoc();
                  // print_r($data);
                  echo "<br>";
                  if($response->num_rows>0){
                     while($row=$response->fetch_assoc()){
                     $get_products_product_id = $row['id'];
                     $get_products_quantity = $row['product_quantity'];
                     $final_quantity_product_table = $get_products_quantity - $get_cart_quantity;
                     $update_products_table_quantity = "UPDATE products SET product_quantity='$final_quantity_product_table' WHERE id=$get_products_product_id";
                     if($conn->query($update_products_table_quantity)==TRUE){
                        header("Location: generate_pdf_bill.php");
                     }
                     // $conn->query($update_products_table_quantity);
                  // }
               }
            }
         }
      }
   }
}
      // $product_id = $_POST['product_id'];
      // $product_quantity = $_POST['product_quantity'];
      // $product_price = $_POST['price'];
      // $status = "confirmed";
      // $confirm = "UPDATE cart SET status='$status', price='$product_price' WHERE user_id=$user_id and product_id=$product_id";
      //  if($conn->query($confirm)==TRUE){
      //       echo $confirm;
      //       echo "<h1>Record Updated</h1>";
      //       $select_product_quantity = "SELECT * FROM products WHERE id=$product_id";
      //       $result = $conn->query($select_product_quantity);
      //       if($result->num_rows>0){
      //             $row =$result->fetch_assoc();
      //       print_r($row);
      //             $product_id = $row['id'];
      //             $initial_quantity = $row['product_quantity'];
      //             $recent_quantity = $product_quantity;
      //             $final_quantity = $initial_quantity-$recent_quantity;
      //             $update_products_quantity = "UPDATE products SET product_quantity='$final_quantity' WHERE id=$product_id";
      //             if($conn->query($update_products_quantity)==TRUE){
      //                header("location: checkout.php");
      //             }
      //       }
      //          // }
      //          }
      //    }else{
      //       echo "<h1>Error Occured</h1>";
      //    }
?>