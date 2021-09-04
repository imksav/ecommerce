<!-- not used -->

<?php
include("../helper/connect.php");

$user_id = $_GET['token'];
echo $user_id."<br>";
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
            $select_product_quantity = "SELECT * FROM products WHERE id=$product_id";
            $result = $conn->query($select_product_quantity);
            if($result->num_rows>0){
                  $row =$result->fetch_assoc();
            print_r($row);
                  $product_id = $row['id'];
                  $initial_quantity = $row['product_quantity'];
                  $recent_quantity = $product_quantity;
                  $final_quantity = $initial_quantity-$recent_quantity;
                  $update_products_quantity = "UPDATE products SET product_quantity='$final_quantity' WHERE id=$product_id";
                  if($conn->query($update_products_quantity)==TRUE){
                     header("location: checkout.php");
                  }
            }
               // }
               }
         }else{
            echo "<h1>Error Occured</h1>";
         }
?>