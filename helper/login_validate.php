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
                  $_SESSION['user_login_check'] = $login_username;
                  header("location: cart.php");
               }else{
                  ?>
                  <br><br>
                  <p style="color:red;">Invalid Username or Password</p>
                  <?php
               }
            }
        ?>