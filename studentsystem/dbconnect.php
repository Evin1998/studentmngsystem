<?php
$servername = "localhost";
$username = "root";
$dbname = "student";
$conn = mysqli_connect($servername, $username, "", $dbname);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
