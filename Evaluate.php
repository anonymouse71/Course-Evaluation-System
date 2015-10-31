<!DOCTYPE html>
<head>
	<title>Evaluation Page || Dept. of CSE, SUST</title>
</head>
<body>
	<form method="post" action="$_SERVER['PHP_SELF']">
		<label for="email">Enter the passkey provided to You</label><br><br>

		<input type="text" id="ukey" name="ukey" required>
		<span class="error"></span>
		<br><br>
		<input type="submit" name="submit" value="Complete Registration">
	</form>


<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>