<?php

session_start ();
include("../helper/connect.php"); 

if(isset($_REQUEST['submit']))
{
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$res = mysqli_query($conn,"select * from admin_login where username='$username'and password='$password'");
$result=mysqli_fetch_array($res);
if($result)
{
	
	$_SESSION["login"]="$username";
	header("location:index.php");
}
else	
{
	header("location:login.php?err=1");
	
}
}
?>