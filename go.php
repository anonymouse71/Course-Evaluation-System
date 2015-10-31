<!DOCTYPE html>
<html>
<head>
	<title>Students access page</title>
</head>
<body>

<?php



// define variables and set to empty values  #Abu Hanife Nayem 2012331073
 $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $password = $_POST["key_uniq"];

   $flag=check_input($password);

   if($flag == 1){
   	header( "refresh:0;url=Under_construction.php" );
   }
}

function check_input($password)
{

    //Database materials
    $servername = "localhost";
    $susername = "root";
    $spassword = "";
    $dbname = "evaluation";

	//create connection #Abu Hanife Nayem 2012331073
    $conn = new mysqli($servername, $susername, $spassword, $dbname);
  
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

    $sql = "SELECT id, key_uniq, is_used FROM str_key";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row #Abu Hanife Nayem 2012331073
    while($row = $result->fetch_assoc()) {
       if($row["is_used"] == 0){
       if($password == $row["key_uniq"])
       {
        $i=$row["id"];
       	$sql = "UPDATE str_key SET is_used='1' WHERE id=$i";
       	$result = $conn->query($sql);

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
   <br><br>
   Pass_key: <input type="text" name="key_uniq">
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
</center>


</body>
</html>