<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="ecommerce";
if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
   die("Failed to connect");
}