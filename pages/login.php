<?php
include("../modules/header.php");
 include("../helper/connect.php");
session_start();
$_SESSION['user_login_check'] = "loggedin";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login Page</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="../css/login.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">

   </head>
   <body>
   <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" class="login-form" method="POST">
          <input type="text" name="username" placeholder="username"/>
          <input type="password" name="password" placeholder="password"/>
          <button>Log In</button>
          <p class="message">Not registered yet? <a href="signup.php">Create an account</a></p>
        </form>
        <!-- login module -->
        <?php include("../helper/login_validate.php");?>
        <!--  -->
      </div>
    </div>
<?php
include("../modules/footer.php");
?>
   </body>

</html>


         


