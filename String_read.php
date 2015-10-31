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
    //echo "Table str_key droped successfully"; #Abu Hanife Nayem 2012331073
} else {
    //echo "Error dropping table: " . $conn->error; #Abu Hanife Nayem 2012331073
}

// sql to create table
$sql = "CREATE TABLE str_key (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
key_uniq varchar(20),
is_used INT(6)
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table str_key created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

//posted string no

$count_string=$_POST["pass_number"];

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
for($i=0; $i<$count_string; $i++){

$val =random_string();

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set PDO error mode to exeption 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "INSERT INTO str_key (key_uniq, is_used)
	VALUES ('$val','0')";
	// use exec because no results are returned
	$conn->exec($sql);
	//echo "New record created successfully";  #Abu Hanife Nayem 2012331073
	}
	
catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
	}
$conn = null;
}



// Table read and printing password and username

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, key_uniq FROM str_key";
$result = $conn->query($sql);

echo "<p style='text-decoration:underline'><b>Serial</b> &nbsp;&nbsp; <b>Pass_key</b></p><br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo   $row["id"]. ".   &nbsp; &nbsp; &nbsp;  " . $row["key_uniq"]."<br><br>";
    
    }
} else {
    echo "0 results";
}


 ?>
</body>
</html>