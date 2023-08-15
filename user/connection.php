<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name="cms";


// $servername = "localhost";
// $username = "pudkwzem_mmyweb";
// $password = "Cedro@2312";
// $db_name="pudkwzem_mmyweb";

// Create connection
$conn = new mysqli($servername, $username,$password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>