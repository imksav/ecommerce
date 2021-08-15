<?php
include("./modules/header.php");
include("./helper/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Account | WYSIWYG</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;600" rel="stylesheet">
</head>

<body>
   <!-- ---------------------Account Page------------------------------------------------ -->
   <h1>Welcome  <?php //echo $login_session['user_login']?></h1>
   <h2><a href="logout.php">Log Out</a></h2>
   <!-- <div class="account-page">
      <div class="container">
         <div class="row">
            <div class="col-2">
               <img src="./images/welcome-right.png" width="100%">
            </div>
            <div class="col-2">
               <div class="form-container">
                  <div class="form-btn">
                     <span onclick="login()">Log In</span>
                     <span onclick="signup()">Sign Up</span>
                     <hr id="Indicator">
                     <form action="cart.php" id="LoginForm">
                        <input type="text" name="username" placholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" name="login" class="btn">Log In</button>
                        <a href="">Forget Password</a>
                     </form>
                      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" id="SignupForm" method="POST">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="text" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="text" name="phone" placeholder="Phone" required>
                        <input type="text" name="address" placeholder="Address" required>
                        <button type="submit" name="signup" class="btn">Sign Up</button>
                     </form>
                     <?php
                        $usernname=$password=$email=$phone=$address="";
                        if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['signup'])){
                           $username = $_POST['username'];
                           $password = $_POST['password'];
                           $email = $_POST['email'];
                           $phone = $_POST['phone'];
                           $address = $_POST['address'];
                              if($conn->connect_error){
                                 die("Connection aborted");
                              }else{
                                 $password = md5($password);
                                 $sql = "INSERT INTO users(username, password, email, phone, address)VALUES('$username', '$password', '$email', '$phone', '$address')";
                                 echo $sql;
                                    if($conn->query($sql)==TRUE){
                                       echo "<h1>Record Inserted!!!</h1>";
                                       header("location: account.php");
                                    }else{
                                       echo "<h1>Insertion error!!!</h1>";
                                    }
                              }
                        }


                     ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   
   <!-- ------------------------------------footer starts------------------------------------ -->
   <?php
   include("./modules/footer.php");
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