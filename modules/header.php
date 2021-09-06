<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="../css/style.css" rel="stylesheet">
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
            <a href="index.php"><img src="../images/logo.png" width="125px"></a>
          <?php
                session_start();
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
               <input type="search" id="search" name="search"  size="20" value="<?php //echo $_GET['search'];  ?>">
               <input type="submit" value="Search" style="height:auto; width:auto;">
            </form>
         </div>
         <nav>
            <ul id="MenuItems">
               <li><a href="./index.php">Home</a></li>
               <li><a href="./about.php">About Us</a></li>
               <!-- <li><a href="./product.php">Our Products</a></li> -->
               <li><a href="./contact.php">Contact Us</a></li>
               <li>
               </li>
            </ul>
         </nav>
         <div class="nav-icon">
            <!-- <a href="./login.php"> <?php //session_destroy(); ?>
            <p>Login<br>/Register</p> -->
            <!-- <a href="./login.php">  -->
            <? // php session_destroy(); ?>
         <?php
               if(isset($_SESSION['user_login_check'])){
                  ?>
               <a href="../helper/logout.php">Hi, <?php echo  $_SESSION['user_login_check']; ?>!</a>
               <?php
               }else{
                  ?>
                  <a href="./login.php">Hi, Guest!</a>
               <?php
               }
               ?>
            <a href="./cart.php"><img src="../images/cart.png" width="25px" height="25px"></a>
            <!-- <img src="../images/menu.png" class="menu-icon" width="25px" height="25px" onclick="menutoggle()"> -->
         </div>
          <?php
         ?>
      </div>
   </div>
   <!-- header section ends -->