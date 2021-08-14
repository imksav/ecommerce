<?php
include("header.php");
include("connect.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login Page</title>
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
        <?php
            if($_SERVER['REQUEST_METHOD']=="POST"){
               $login_username= mysqli_real_escape_string($conn, $_POST['username']);
               $login_password = mysqli_real_escape_string($conn, $_POST['password']);
               $login_password = md5($login_password);
               // echo $login_password;
               $sql = "SELECT id FROM users WHERE username = '$login_username' and password = '$login_password' ";
               $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               // $active = $row['active'];

               $count = mysqli_num_rows($result);

               if($count == 1){
                  // session_register("login_username");
                  $_SESSION['login_user'] = $login_username;
                  header("location: cart.php");
               }else{
                  ?>
                  <br><br>
                  <p style="color:red;">Invalid Username or Password</p>
                  <?php
               }
            }
        ?>
      </div>
    </div>
<?php
include("footer.php");
?>
   </body>

</html>


         


