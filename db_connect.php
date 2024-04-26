<?php
$server = "localhost";
$user = "root";
$pw = "";
$db = "wolf";

$conn = mysqli_connect($server, $user, $pw, $db);

if (!$conn) {
    echo "Connection failed!";
}
