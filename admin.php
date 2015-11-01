<?php
session_start();
if(isset($_SESSION['myusername']) ){
	header('location:login.php');
} else {
	echo " Welcome ";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
<h4>Amount of password you want to Generate</h4>
<center><form action="String_read.php" method="post">
<br>
<br>
<input type="number" name="pass_amount"><br>
<br>
<input type="submit" value="Generate">
</form>
</center>

<a href="logout.php">Logout</a>
</body>
</html>