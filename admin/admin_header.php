<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['login']))
header("Location: logout.php");
?>
<ul>
  <li><a class="active" style="color:green; background-color:white;font-size:20px;font-weight:bold;"><?php echo "Welcome ".$_SESSION['login']?></a></li>
  <li><a class="active" href="index.php">Back End</a></li>
  <li><a href="add_product.php">Add</a></li>
  <li><a href="display_product.php">Display</a></li>
  <li><a href="../pages/index.php">Front End</a></li>
  <li><a href="logout.php">Logout</a></li>

</ul>

</body>
</html>