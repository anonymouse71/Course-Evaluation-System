<?php

$username=$_POST["username"];
$password=$_POST["password"];
$form_link=$_POST["form_link"];


$servername = "localhost";
$susername = "root";
$spassword = "";
$dbname = "evaluation";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $susername, $spassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO admin (username, password, form_link)
	VALUES ('$username','$password','$form_link')";
} 
catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
	}


 ?>