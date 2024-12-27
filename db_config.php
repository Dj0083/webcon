<?php
$host = 'localhost';
$db = 'conference_db';
$user = 'root'; // Default MySQL username
$pass = '';     // Default MySQL password

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
