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
 ?>
</body>
</html>