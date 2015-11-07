<!DOCTYPE html>
<html>
<head>
	<title>Generated PassKeys</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php 

session_start();
if(!isset($_SESSION['myusername']) ){
	header('location:login.php');
}
$admin_name=$_SESSION['myusername'];
$course=$_POST['course'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evaluation";

// Create connection

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql1 = "DROP TABLE ".$course;
	$conn->exec($sql1);
} 
catch(PDOException $e) {
	echo $sql1 . "<br>" . $e->getMessage();
	}

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql2 = "CREATE TABLE `".$course."`(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			key_uniq varchar(20),
			is_used INT(6),
			Course_No varchar(20)
			)";

	$conn->exec($sql2);
} 
catch(PDOException $e) {
	echo $sql2 . "<br>" . $e->getMessage();
	}

//posted string no

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
	
	$sql3 = "INSERT INTO`".$course."` (key_uniq, is_used, Course_No)
	VALUES ('$val','0', '".$course."')";
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
$sql4 = "SELECT * FROM`".$course."`";
$result = $conn->query($sql4);

echo "<p style='text-decoration:underline'><b>Serial</b> &nbsp;&nbsp; <b>Pass_key</b></p><br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo   $row["id"]. ".   &nbsp; &nbsp; &nbsp;  " . $row["key_uniq"].  " &nbsp; &nbsp; &nbsp; ".$row['Course_No']. " <br><br>";
    
    }
} else {
    echo "0 results";
}
?>

<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>

</body>
</html>
