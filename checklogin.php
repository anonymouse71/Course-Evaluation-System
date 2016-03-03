<?php

$servername = "localhost";
  $susername = "root";
  $spassword = "sust";
  $dbname = "evaluation";
  $conn = new mysqli($servername, $susername, $spassword, $dbname);
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

 
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
//$myusername = mysqli_real_escape_string($myusername);
//$mypassword = mysqli_real_escape_string($mypassword);

$sql="SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";
$result = $conn->query($sql);
// Mysql_num_row is counting table row
$count=$result->num_rows;


if($count>=1) {
 
// Register $myusername, $mypassword and redirect to file "admin.php"
	//Developed by: Md Abu Hanife Nayem & Masiur rahman siddiki
session_start();
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
header("location:admin.php");
}
else {
echo "Wrong Username or Password";
}


?>