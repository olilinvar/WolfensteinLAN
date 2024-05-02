<?php
// Define database credentials
$host = "localhost";
$username = "root";  // Default username for XAMPP's MySQL
$password = "";      // Default password for XAMPP's MySQL is empty
$database = "wolf";  // Make sure this database exists in your MySQL server

// Create a new database connection
$link = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($link->connect_error) {
    die('Connect Error (' . $link->connect_errno . ') ' . $link->connect_error);
}

// Optionally, you can set the charset
$link->set_charset("utf8mb4");
?>
