<?php
require 'Carbon.php';
use Carbon\Carbon;
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

  <div class="well well-lg">
	  <h2 style="text-align:center">Course Evaluation System</h2>
	  <h4 style="text-align:center">Admin access only</h4>

  </div>

<center><?php echo "<h3> Welcome, <strong>". $_SESSION['myusername']."</strong> </h3>"; ?></center>
<a href="logout.php"><button class="btn btn-info">Logout</button></a>
<a href="another_user.php"><button class="btn btn-info">Add another user</button></a>

<h3 style="text-align:center">Genarate token for particular link</h3>
<br><br>
<div class="col-md-6 col-md-offset-3">
  <form class="form-horizontal" action="generate.php" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-2" for="form_link">http://</label>
          <div class="col-sm-8">
            <input type="text" name="form_link" class="form-control" placeholder="Enter your google form's link" required>
            <p>without http:// e.g: www.google.com 
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pass_amount">Amount:</label>
          <div class="col-sm-8">
            <input type="number" name="pass_amount" class="form-control" placeholder="Enter amount of token you want to generate" required>
          </div>
      </div>

      <div class="form-group"> 
        <div class="col-sm-offset-2 col-xs-4">
          <button type="submit" class="btn btn-primary">Generate</button>
        </div>
      </div>
  </form>
 </div>
<?php 
printf("Right now is %s", Carbon::now()->toDateTimeString());
?>
<br><br>

</div>
</body>
</html>