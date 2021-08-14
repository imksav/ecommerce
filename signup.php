<?php
include("header.php");
include("connect.php");

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
                  <?php
                        $username=$password=$email=$phone=$address="";
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
                                       header("location: login.php");
                                    }else{
                                       echo "<h1>Insertion error!!!</h1>";
                                    }
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


         


