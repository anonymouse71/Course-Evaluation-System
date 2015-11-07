<?php

$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="evaluation"; 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

 
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
$id = $_POST['id']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

$sql2 = "SELECT id FROM admin WHERE username='$myusername' and password='$mypassword'";
$result2=mysql_query($sql2);

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
         $id= $row["id"];
    }
} else {
    echo "0 results";
} // If result matched $myusername and $mypassword, table row must be 1 row
if($count>=1) {
 
// Register $myusername, $mypassword and redirect to file "admin.php"
	//Developed by: Md Abu Hanife Nayem & Masiur rahman siddiki
session_start();
$_SESSION['id'] = $id;
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
header("location:admin.php");
}
else {
echo "Wrong Username or Password";
}


?>