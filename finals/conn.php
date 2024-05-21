<?php
// Database connection parameters
$host = 'localhost'; // Change this to your database host if it's different
$user = 'root'; // Change this to your database username
$password = ''; // Change this to your database password
$database = 'finals'; // Change this to your database name

// Create connection
$connection = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>