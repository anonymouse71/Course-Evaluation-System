<?php
session_start();
if(isset($_SESSION['myusername']) ){
	header('location:login.php');
} else {
	echo "<center> Welcome </center>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
<br>
<h4><center>Amount of password you want to Generate</center></h4>
<center><form action="String_read.php" method="post">
<br>
<input type="number" name="pass_amount"><br>
<br>
<input type="submit" value="Generate">
</form>
</center>
<a href="another_user.php"><center>Add another user</center></a>
<br><br>
<a href="logout.php"><center>Logout</center></a>
</body>
</html>