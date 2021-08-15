<?php
include("./modules/header.php");
include("./helper/connect.php");

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Sign Page</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/login.css" rel="stylesheet">
   </head>
   <body>
   <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>SIGN UP</h3>
            <p>Please enter details to register.</p>
          </div>
        </div>
                  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" id="SignupForm" method="POST">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="text" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="text" name="phone" placeholder="Phone" required>
                        <input type="text" name="address" placeholder="Address" required>
                        <button type="submit" name="signup" class="btn">Sign Up</button>
                      <p class="message">Already registered? <a href="login.php">Log In</a></p>
                  </form>
                  <!-- signup module -->
                 <?php include("./helper/signup_validate.php") ?>
                 <!--  -->
      </div>
    </div>
<?php
include("./modules/footer.php");
?>
   </body>

</html>


         


