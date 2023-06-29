<?php
// Database connection parameters
$hostname = '127.0.0.1:3307'; // Database server hostname
$username = 'root'; // Database username
$password = ' '; // Database password
$dbname = 'egov'; // Database name
// Create a connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

