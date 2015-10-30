<!DOCTYPE html>
<html>
<head>
	<title>Students access page</title>
</head>
<body>

<?php



// define variables and set to empty values
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST["username"];
   $password = $_POST["password"];

   $flag=check_input($username,$password);

   if($flag == 1){
   	header( "refresh:0;url=Under_construction.php" );
   }
}

function check_input($username,$password)
{

    //Database materials
    $servername = "localhost";
    $susername = "root";
    $spassword = "";
    $dbname = "evaluation";

	//create connection Abu Hanife Nayem 2012331073
    $conn = new mysqli($servername, $susername, $spassword, $dbname);
  
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

    $sql = "SELECT id, username, password FROM str_key";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       if($username == $row["username"]){ 
       if($password == $row["password"])
       {
       	return 1;
       }
    }
    }
} else {
    echo "0 results";
}

return 0;
}

?>


<br><br>  <br><br>
<center>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Username: <input type="text" name="username">
   <br><br>
   Password: <input type="text" name="password">
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
</center>


</body>
</html>