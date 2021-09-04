<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel=”stylesheet” href=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css” integrity=”sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==” crossorigin=”anonymous”>
   <style>
      .styling{
         margin: 25px 20px 50px 320px;
      }
.demotbl {
   table-layout: auto;
    border-collapse: collapse;
    border: 2px solid #69899F;
    width: 70%;
  }
.demotbl th{
    border: 2px solid black;
    color: black;
    padding:15px;
    width: 100px;
    text-align: center;
  }
.demotbl td{
    border: 2px solid black;
    color: #002F5E;
    padding:15px;
    width:100px;
    text-align: center;
  }
   </style>
   <title>Generate Bill</title>
</head>
<body>
   <?php
   include("../helper/connect.php");
                session_start();
               if(isset($_SESSION['user_login_check'])) {
                  ?>
                     <p style="color: purple;  font-size: 20px;">Welcome, <?php echo  $_SESSION['user_login_check']; ?>!</p>
                  <?php
               }
   // include("../modules/header.php");
      // if(!isset($_SESSION['user_login_check'])){   
      //    header("Location: ./login.php");
      //    }
         $user_id=$_SESSION['id'];      
          $data = mysqli_query($conn, "SELECT * FROM cart WHERE user_id=$user_id and status='confirmed'");
            $total_price = 0;
            $vat = 13;
            $count=0;
            ?>
            <div style="text-align:center;">
               <h1>What You See Is What You Get</h1>
               <h3>Basundhara Chowk, Kathmandu, Nepal</h3>
               <h5>Phone: 9869260495 || Email: contact@wysiwyg.com</h5>
               <h5>www.wysiwyg.com.np</h5>
            </div>
            <div class="subtitle">
               <p style="text-align:center;">This is computer generated bills.</p>
            </div>
            <div class="styling">
            <table class="demotbl"> 
               <tr>
                  <th>S.N.</th>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Product Quantity</th>
                  <th>Product Price</th>
                  <th>Sub Total</th>
               </tr>
            </table>
            <?php
          while($cart = mysqli_fetch_assoc($data)) {
         //  $orders_sql = "INSERT INTO orders(user_id, product_id, product_name, product_quantity, product_price)VALUES($user_id, $cart['id'], $cart['product_name'], $cart['product_quantity'], $cart['product_price']";
             $count++;
               ?>
            <table class="demotbl">
               <tr>
                        <td><?php echo $count ?></td>
                        <td><p><?php echo $cart['product_id'] ?></p></td>
                        <td><p><?php echo $cart['product_name'] ?></p></td>
                        <td><?php echo $cart['product_quantity'] ?></td>
                        <td>Rs. <?php echo $cart['price'] / $cart['product_quantity']?></td>
                        <td>Rs. <?php echo (($cart['price'] / $cart['product_quantity']) * $cart['product_quantity'])?></td>
               </tr>  
            </table>
               <?php
               $total_price = $total_price+(($cart['price'] / $cart['product_quantity']) * $cart['product_quantity']);
            }
   ?>
            </div>
   <div class="styling">
   <table class="demotbl">
      <tr>
         <td>Total Price</td>
         <td>Rs. <?php echo $total_price?></td>
      </tr>
      <tr>
         <td>VAT (13%)</td>
      <td>Rs. <?php echo $total_price*($vat/100)?></td>
      </tr>
      <tr>
         <td>Grand Total</td>
         <td>Rs. <?php echo $total_price + ($total_price*($vat/100))?></td>
      </tr>
   </table>
   </div>
   <div class="action" style="text-align:center;">
   <button>Print Bill</button>
   <button>Email Bill</button>
   </div>
                        <?php
                           $rewrite = "UPDATE cart SET status='ordered' WHERE user_id=$user_id and status='confirmed' ";
                           $response = $conn->query($rewrite);
                           if($conn->query($rewrite)==TRUE){  
                              // header("Location: cart.php");
                           }
                        ?>
</body>
</html>