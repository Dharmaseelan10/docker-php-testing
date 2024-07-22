<?php
$servername = getenv('MYSQL_HOST') ?: 'localhost';
$username = 'root';
$password = '';  // Your MySQL root password from XAMPP
$dbname = "docker_test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
