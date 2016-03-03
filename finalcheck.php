<?php
// define variables and set to empty values  #Masiur Rahman Siddiki
  $token = $_POST["token"];

  $servername = "localhost";
  $susername = "root";
  $spassword = "sust";
  $dbname = "evaluation";
  $conn = new mysqli($servername, $susername, $spassword, $dbname);
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

    $sql = "SELECT id, link FROM tokens WHERE token='$token'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       {
        $i=$row["id"];
        $link = $row['link'];
   /*    	$sql = "UPDATE tokens SET is_used='1' WHERE id='$i'";
       	$result = $conn->query($sql);
   
       	return 1;     */
       }
      
      }
    } else {
    echo "0 results";
    }



//   $token = $_POST["token"];

//   $flag=check_input($token);
  
   header("location:http://".$link);
   

?>

