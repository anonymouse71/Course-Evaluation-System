<!DOCTYPE html>
<html>
<head>
	<title>User add page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="well well-lg">
	  <h2 style="text-align:center">Course Evaluation System</h2>
	  <h4 style="text-align:center">Admin access only</h4>

  </div>

<?php 
session_start();
if(!isset($_SESSION['myusername']) ){
	header('location:login.php');
}

  $name=$_SESSION['myusername'];

  echo "<br><center><h4>Mr. ".$name.", you have successfully added new user.</h4></center><br><br><br>";

 ?>
<center>
<br>
<a href="another_user.php"><button class="btn btn-info">Add another user</button></a><br><br>
<a href="admin.php"><button class="btn btn-info">Go front page</button></a><br><br>
<a href="logout.php"><button class="btn btn-info">Logout</button></a>

</center>
</div>
</body>
</html>

