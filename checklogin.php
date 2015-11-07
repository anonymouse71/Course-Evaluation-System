<?php

$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="evaluation"; 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

 
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);


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