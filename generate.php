<!DOCTYPE html>
<html>
<head>
	<title>Generated PassKeys</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<br><br>
<?php 
// masiur & abu 
session_start();
if(!isset($_SESSION['myusername']) ){
	header('location:login.php');
}
$link=$_POST['form_link'];

$servername = "localhost";
$username = "root";
$password = "sust";
$dbname = "evaluation";
/*	
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql1 = "CREATE TABLE tokens (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			token varchar(20),
			is_used INT(6),
			link text
			)";

	$conn->exec($sql1);
} 
catch(PDOException $e) {
	echo $sql1 . "<br>" . $e->getMessage();
	}
*/
//get string amount

$count_string=$_POST["pass_amount"];

//string genarate  #Abu Hanife Nayem 2012331073

function random_string() {
	$character_set_array = array();
	$character_set_array[] = array('count' => 3, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
	$character_set_array[] = array('count' => 3, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
	$character_set_array[] = array('count' => 2, 'characters' => '0123456789');

	$temp_array = array();
	foreach ($character_set_array as $character_set) {
		for ($i = 0;$i < $character_set['count']; $i++) {
			$temp_array[] = $character_set['characters'][rand(0,strlen($character_set['characters'])-1)];
		}
	}
	shuffle($temp_array);
	return implode('', $temp_array);
	
}
for($i=0; $i<$count_string; $i++) {

$val =random_string();

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set PDO error mode to exeption 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql3 = "INSERT INTO tokens (token, is_used, link)
	VALUES ('$val','0', '$link')";
	// use exec because no results are returned
	$conn->exec($sql3);
	//echo "New record created successfully";  #Abu Hanife Nayem 2012331073
	}
	
catch(PDOException $e) {
	echo $sql3 . "<br>" . $e->getMessage();
	}
$conn = null;
}

// Table read and printing password and username

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql4 = "SELECT id, token FROM tokens";
$result = $conn->query($sql4);

echo "<p><b>Serial</b> &nbsp;&nbsp;&nbsp; <b>Pass_key</b></p>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo   $row["id"]. ".   &nbsp; &nbsp; &nbsp;  " . $row["token"].  "<br><br>";
    
    }
} else {
    echo "0 results";
}


?>
</div>
<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>

</body>
</html>
