<?php
$host = "localhost";   // or 127.0.0.1
$username = "root";    // default for local server like XAMPP
$password = "ali123";        // empty by default in XAMPP
$database = "fireFreeDB";  // your database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>