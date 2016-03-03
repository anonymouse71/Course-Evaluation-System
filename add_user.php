<?php

//this is for the entry of the user in database

$admin_name=$_POST["admin_name"];
$admin_pass=$_POST["admin_pass"];
$servername = "localhost";
$susername = "root";
$spassword = "sust";
$dbname = "evaluation";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $susername, $spassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO admin (username, password)
	VALUES ('$admin_name','$admin_pass')";
	$conn->exec($sql);
	header('location:user_added.php');
} 
catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
	}

//Developed by: Md Abu Hanife Nayem & Masiur rahman siddiki
 ?>

