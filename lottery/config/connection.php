<?php
// Database credentials
$servername = "localhost";
$username = "root";       
$password = "";            
$dbname = "lottery";

//  Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
