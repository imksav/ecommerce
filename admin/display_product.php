<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Display Details From File Upload</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet">
        <style>
         table,
         th,
         td {
            border: 1px solid black;
         }
         .img{
            width: 150px;
            height: 150px;
         }
   </style>
   </head>
   <body>
   
   <?php
   $servername="localhost";
   $username="root";
   $password="";
   $db="ecommerce";
   $conn = new mysqli($servername,$username,$password,$db);
   if($conn->connect_error){
      die("Connection aborted");
   }else{
      $sql = "SELECT * FROM products";
      // echo "$sql";
      $result = $conn->query($sql);
      if($result->num_rows>0){
         echo "<table>
         <tr>
         <th>ID</th>
         <th>Product Name</th>
         <th>Product Description</th>
         <th>Product Category</th>
         <th>Product Brand</th>
         <th>Featured Products</th>
         <th>Quantity</th>
         <th>Marked Price</th>
         <th>Discount Percent</th>
         <th>Created Date</th>
         <th>Profile Picture</th>
         </tr>";
         while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['product_name']."</td>";
            echo "<td>".$row['product_description']."</td>";
            echo "<td>".$row['product_category']."</td>";
            echo "<td>".$row['product_brand']."</td>";
            echo "<td>".$row['product_featured']."</td>";
            echo "<td>".$row['product_quantity']."</td>";
            echo "<td>".$row['marked_price']."</td>";
            echo "<td>".$row['discount_percent']."</td>";
            echo "<td>".$row['created_date']."</td>";
            echo "<td><img src='".$row['file_path']."' height=150px width=150px</td>";
            echo "</tr>";
         }
         echo "</table>";
      }
   }
   ?>
   
   </body>
</html>