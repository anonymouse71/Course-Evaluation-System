<!DOCTYPE html>
<html>
<head>
	<title>Students access page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2 style="text-align:center">Course Evaluation System</h2><br><br>

  <div class="col-md-6 col-md-offset-3">
  <form class="form-horizontal" action="finalcheck.php" method="POST">
  
      <div class="form-group">
        <label class="control-label col-sm-2" for="token">Token:</label>
          <div class="col-sm-8">
            <input type="text" name="token" class="form-control" id="token" placeholder="Enter provided token">
          </div>
      </div>

      <div class="form-group"> 
        <div class="col-sm-offset-2 col-xs-4">
          <button type="submit" class="btn btn-primary">Continue</button>
        </div>
      </div>

  </form>
  </div>
</div>
</body>
</html>