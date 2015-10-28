<!DOCTYPE html>
<html>
<head>
	<title>Generated Strings</title>
</head>
<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evaluation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// drop table
$sql2 = "DROP TABLE str_key";
if ($conn->query($sql2) === TRUE) {
    echo "Table str_key droped successfully";
} else {
    echo "Error dropping table: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE str_key (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username varchar(20),
password varchar(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table str_key created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

//posted string no

$count_string=$_POST["pass_number"];

//string genarate

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
for($i=0; $i<$count_string; $i++){
$val1 =random_string();
$val2 =random_string();

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set PDO error mode to exeption 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "INSERT INTO str_key (username, password)
	VALUES ('$val1','$val2')";
	// use exec because no results are returned
	$conn->exec($sql);
	echo "New record created successfully";
	}
	
catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
	}
$conn = null;
}

 ?>
</body>
</html>