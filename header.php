<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="./css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;600" rel="stylesheet">
</head>

<body>
   <!-- header section -->
   <div class="container">
      <div class="navbar">
         <div class="logo">
            <a href="index.php"><img src="./images/logo.png" width="125px"></a>
         </div>
         <nav>
            <ul id="MenuItems">
               <li><a href="./index.php">Home</a></li>
               <li><a href="./about.php">About Us</a></li>
               <li><a href="./product.php">Our Products</a></li>
               <li><a href="./contact.php">Contact Us</a></li>
               <li>
               </li>
            </ul>
         </nav>
         <div class="nav-icon">
            <a href="./login.php"><img src="./images/user.png" width="25px" height="25px"></a>
            <a href="./cart.php"><img src="./images/cart.png" width="25px" height="25px"></a>
            <img src="./images/menu.png" class="menu-icon" width="25px" height="25px" onclick="menutoggle()">
         </div>
      </div>
   </div>
   <!-- header section ends -->