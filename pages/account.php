<?php include("../helper/connect.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Account | WYSIWYG</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;600" rel="stylesheet">
</head>

<body>
<?php include("../modules/header.php");?>
<?php
                session_start();
               if(isset($_SESSION['user_login_check'])) {
                  ?>
                     <p style="color: purple;  font-size: 20px;">Welcome, <?php echo  $_SESSION['user_login_check']; ?>!</p>
                     <br>
                 
                  <?php
               }else{
                  
               }
            ?>
   
   <!-- ------------------------------------footer starts------------------------------------ -->
   <?php
   include("../modules/footer.php");
   ?>
   <!-- ------------------------ JS for menu toggle --------------------------------- -->
   <script>
   var MenuItems = document.getElementById("MenuItems");
   MenuItems.style.maxHeight = "0px";

   function menutoggle() {
      if (MenuItems.style.maxHeight == "0px") {
         MenuItems.style.maxBlockSize = "200px";
      } else {
         MenuItems.style.maxHeight = "0px";
      }
   }
   </script>
   <!-- -------------------------JS for toggle form----------------------- -->
   <script>
      var LoginForm = document.getElementById("LoginForm");
      var  SignupForm = document.getElementById("SignupForm");
      var Indicator = document.getElementById("Indicator");

      function signup(){
         SignupForm.style.transform = "translateX(0px)";
         LoginForm.style.transform = "translateX(0px)";
         Indicator.style.transform = "translateX(100px)";

      }
         function login(){
         SignupForm.style.transform = "translateX(300px)";
         LoginForm.style.transform = "translateX(300px)";
         Indicator.style.transform = "translateX(0px)";

      }

   </script>

</body>

</html>