<?php
session_start();
if(!isset($_SESSION['myusername']) ){
	header('location:login.php');
} else {
	//echo "<center> Welcome ". $_SESSION['myusername'] . "</center>" ;
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
<div class="container">
  <!--It is for heading only-->

  <div class="well well-lg">
  <h2>SUST CSE Course Evolution</h2>
  <h4>Admin only</h4>

</div>

<center><?php echo "<h3> Welcome ". $_SESSION['myusername']." </h3>"; ?></center>
<a href="logout.php"><center>Logout</center></a>

<form action="generate.php" method="post">
<br>

<br><h4>Genarate some token:</h4><br>

<?php echo " &nbsp &nbsp &nbsp &nbsp Form Link: &nbsp &nbsp &nbsp&nbsp&nbsp"; ?> <input type="text" name="form_link"><br><br>

<?php  echo"&nbsp &nbsp &nbsp &nbsp" ?> Token amount: <input type="number" name="pass_amount"><br>
<br>
 <?php echo"&nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp" ?>
<input type="submit" value="Generate">
</form>

<br>
<br><br>

<a href="another_user.php"><center>Add another user</center></a>
<br><br>

</div>
</body>
</html>