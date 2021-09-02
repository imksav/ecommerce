<?php
include("../helper/connect.php");
$id = $_GET['token'];
$sql = "DELETE FROM cart WHERE id=$id";
if($conn->query($sql)==TRUE){
   echo "Deleted $id from database";
   header("location: cart.php");
}else{
   echo "Error on delete operation!!!";
}