<?php
session_start();
if(!isset($_SESSION['myusername']) ){
	header('location:login.php');
} else {
	echo "<center> Welcome ". $_SESSION['myusername'] . "</center>" ;
}
  //Developed by: Md Abu Hanife Nayem & Masiur Rahman Siddiki
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<h4><center>Admin Only</center></h4>
<center><form action="generate.php" method="post">
<br>
Form Link: <input type="text" name="form_link"><br>
Number of Token: <input type="number" name="pass_amount"><br>
<br>
<input type="submit" value="Generate Token">
</form>
</center>
<br>
<br><br>
<a href="another_user.php"><center>Add another user</center></a>
<br><br>
<a href="logout.php"><center>Logout</center></a>
</body>
</html>