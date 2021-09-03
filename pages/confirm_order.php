<?php
include("../helper/connect.php");

$user_id = $_GET['token'];
echo $user_id."<br>";
// if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['checkout']) and isset($_POST['product_id'])){
//  $product_id = $_POST['product_id'];
//                   $get_quantity = "SELECT product_quantity FROM products WHERE id=$product_id";
//                   echo "<br>".$get_quantity;
// }
$sql = "SELECT * from cart WHERE user_id = $user_id";
echo $sql;
$result = $conn->query($sql);
 if($result->num_rows>0){
     echo "<table>
         <tr>
         <th>Product ID</th>
         <th>User ID</th>
         <th>Product Name</th>
         <th>Quantity</th>
         <th>Price</th>
         <th>Status</th>
         <th colspan=2>Action</th>
         </tr>";
         while($row=$result->fetch_assoc()){
            $total_price = $row['price'];
            $final_price = $total_price + (0.13*$total_price);
            echo "<tr>";
            echo "<td>".$row['product_id']."</td>";
            echo "<td>".$row['user_id']."</td>";
            echo "<td>".$row['product_name']."</td>";
            echo "<td>".$row['product_quantity']."</td>";
            echo "<td>".$final_price."</td>";
            // echo "<td>".$row['price']."."*$row['product_quantity']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td><a href='order_success.php?token=".$row['user_id']."'>Confirm</a></td>";
            echo "<td><a href='cart.php'>Cancel</a></td>";
            echo "</tr>";
         }
         echo "</table>";
      }
      if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['checkout']) and isset($_POST['product_id']) and isset($_POST['price']) and isset($_POST['product_quantity'])){
      $user_id = $_GET['token'];
      $product_id = $_POST['product_id'];
      $product_quantity = $_POST['product_quantity'];
      $product_price = $_POST['price'];
      $status = "confirmed";
      $confirm = "UPDATE cart SET status='$status', price='$product_price' WHERE user_id=$user_id and product_id=$product_id";
       if($conn->query($confirm)==TRUE){
            echo $confirm;
            echo "<h1>Record Updated</h1>";
            // if($status="confirmed"){
            $select_product_quantity = "SELECT * FROM products WHERE id=$product_id";
            $result = $conn->query($select_product_quantity);
            if($result->num_rows>0){
               // while($row=$result->fetch_assoc()){
                  $row =$result->fetch_assoc();
            print_r($row);
                  $product_id = $row['id'];
                  $initial_quantity = $row['product_quantity'];
                  $recent_quantity = $product_quantity;
                  $final_quantity = $initial_quantity-$recent_quantity;
                  $update_products_quantity = "UPDATE products SET product_quantity='$final_quantity' WHERE id=$product_id";
                  if($conn->query($update_products_quantity)==TRUE){
                     // echo $update_products_quantity;
                     header("location: checkout.php");
                  }
            }
               // }
               }
         }else{
            echo "<h1>Error Occured</h1>";
            // echo $confirm;
         }
?>
<!-- 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
   <?php// htmlspecialchars($_SERVER['PHP_SELF']);?>
<form action="cart.php" method="POST">
   <input hidden type="text" name="user_id" value="<?php //echo $user_id?>"> -->
   <!-- <input hidden type="text" name="product_id" value="<?php //echo $product_id?>"> -->
   <!-- <input hidden type="text" name="product_quantity" value="<?php //echo $product_quantity?>"> -->
   <!-- <input type="submit" name="confirm" value="Confirm"> -->
<!-- </form>    -->
<!-- </body> -->

<!-- </html> -->


<!--
// $sql = "UPDATE cart SET status='confirmed' WHERE id=$user_id";
// echo $sql;
// if($conn->query($sql)==TRUE){
   // echo "Updated $user_id from database";
   // header("location: cart.php");
// }else{
   // echo "Error on delete operation!!!";
// }
//  $user_id = $_GET['token'];
// if(isset($user_id)){
//     $sql1 = "SELECT * FROM cart WHERE user_id=$user_id";
//    $result = $conn->query($sql1);
//    $result = $result->fetch_assoc();
//    $id =$result['id'];
//    $product_name = $result['product_name'];
//    $product_quantity = $result['product_quantity'];
//    $price = $result['price'];
//    $status = $result['status'];
// }
// if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit'])){
//    $sql2 = "UPDATE cart SET status='confirmed' WHERE id=$id ";
//    if($conn->query($sql2)==TRUE){
//             echo "<h1>Record Updated</h1>";
//             header("location: cart.php");
//          }else{
//             echo "<h1>Error Occured</h1>";
//          }
// }


// //  if(!isset($_SESSION['user_login_check'])){   
// //          header("Location: ./login.php");
// //          }
//          $user_id = $_GET['token'];
//          if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit'])){
//          if(isset($user_id)){
//          // $user_id=$_SESSION['id'];
//          // $sql = "SELECT * FROM cart WHERE user_id=$user_id";
//          //  $result = $conn->query($sql);
//          // $result = $result->fetch_assoc();
//          // $status = $result['status'];
//          $data = mysqli_query($conn, "UPDATE  cart SET status=1 WHERE user_id=$user_id");
//          // $sql = "UPDATE  cart SET status=success WHERE user_id=$user_id";
//          if($conn->query($data)==TRUE){
//             echo "<h1>Record Updated</h1>";
//             header("location: cart.php");
//          }else{
//             echo "<h1>Error Occured</h1>";
//          }
//         } 
//       }
?>