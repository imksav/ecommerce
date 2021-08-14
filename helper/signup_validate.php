<?php
include("connect.php");
?>
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