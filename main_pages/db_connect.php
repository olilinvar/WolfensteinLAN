<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "root"; 
$password = "";      
$database = "wolf";

$link = new mysqli($host, $username, $password, $database);

if ($link->connect_error) {
    die('Connect Error (' . $link->connect_errno . ') ' . $link->connect_error);
}

$link->set_charset("utf8mb4");
?>