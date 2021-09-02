<?php
            if($_SERVER['REQUEST_METHOD']=="POST"){
               $login_username= mysqli_real_escape_string($conn, $_POST['username']);
               $login_password = mysqli_real_escape_string($conn, $_POST['password']);
               $login_password = md5($login_password);
               // echo $login_password;
               $sql = "SELECT * FROM users WHERE username = '$login_username' and password = '$login_password' ";
               $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               // $active = $row['active'];
               // print_r($row['id']);
               $count = mysqli_num_rows($result);

               if($count > 0){
                  session_start();
                  $_SESSION['user_login_check'] = $login_username;
                  $_SESSION['id']=$row['id'];

                  header("location: ./index.php");
               }else{
                  ?>
                  <br><br>
                  <p style="color:red;">Invalid Username or Password</p>
                  <?php
               }
            }
        ?>