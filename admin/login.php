<!-- <html>
<head>
</head>
<center>
<fieldset>
<legend>Login </legend>
<form action="loginprocess.php" method="POST"><br><br>
Username:<input type="text" required="" name="uname"><br><br>
Password:<input type="text" required="" name="upassword"><br><br>
<input type="submit" value="Login" name="sub">
<br>

</p>
</form>
</fieldset>
</center>
</html> -->

<?php
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
   <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>ADMIN LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form action="loginprocess.php" class="login-form" method="POST">
          <input type="text" name="username" placeholder="username"/>
          <input type="password" name="password" placeholder="password"/>
          <input type="submit" name="submit" value="Log In" style="height:auto;width:auto;color:white;background-color:green;">
          <br>
          <?php 
               if(isset($_REQUEST["err"]))
                  $msg="Invalid username or Password";
               ?>
               <p style="color:red;">
               <?php if(isset($msg))
               {
               echo $msg;
               }
            ?>
        </form>
        <!--  -->
      </div>
    </div>
   </body>

</html>