<?php
session_start();
if(!isset($_SESSION['myusername']) ){
	header('location:login.php');
//this is for the entry of the user in database

$admin_name=$_POST["admin_name"];
$admin_pass=$_POST["admin_pass"];
$form_link=$_POST["form_link"];


$servername = "localhost";
$susername = "root";
$spassword = "";
$dbname = "evaluation";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $susername, $spassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO admin (username, password, form_link)
	VALUES ('$admin_name','$admin_pass','$form_link')";
	$conn->exec($sql);
	header('location:admin.php');
} 
catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
	}

//Developed by: Md Abu Hanife Nayem & Masiur rahman siddiki
 ?>