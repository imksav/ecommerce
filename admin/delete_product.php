<?php
include("../helper/connect.php");
$id = $_GET['token'];
$sql = "DELETE FROM products WHERE id=$id";
if($conn->query($sql)==TRUE){
   echo "Deleted $id from database";
   header("location: display_product.php");
}else{
   echo "Error on delete operation!!!s";
}