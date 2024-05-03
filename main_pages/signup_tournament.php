<?php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $username = $_POST['username'];
    $gamertag = $_POST['gamertag'];

    $sql = "INSERT INTO tournament_registrations (username, gamertag) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $gamertag);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: dashboard.php"); // Redirect back to the dashboard
        exit;
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt);
}
?>
