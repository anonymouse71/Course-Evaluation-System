<?php

session_start();
if(!isset($_SESSION['myusername']) ){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Creating another user</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 
 <!--It is only for form input of new user-->

<div class="container">
<div class="well well-lg">
<center>
  <h2>SUST CSE Course Evolution</h2>
  <h4>Admin only</h4>
</center>
</div>


<center>
<h3>Add another user</h3>
<form action="add_user.php" method="post">
<br><br><br>
Username: <input type="text" name="admin_name"><br><br>
Password: <input type="text" name="admin_pass"><br><br>
<input type="submit" value="Add it">
<!--Developed by: Md Abu Hanife Nayem & Masiur rahman siddiki-->
</form>
</center>
</div>
</body>
</html>