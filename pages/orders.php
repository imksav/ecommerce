<?php
   include("../helper/connect.php");
   if(!isset($_SESSION['user_login_check'])){   
         header("Location: ./login.php");
         }
         $user_id=$_SESSION['id'];
         
?>