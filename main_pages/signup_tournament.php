<?php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $username = $_SESSION['username'];
    $tournamentId = $_POST['tournament_id'];

    // Check if already registered
    $check_sql = "SELECT * FROM tournament_registrations WHERE username = ? AND tournament_id = ?";
    $check_stmt = mysqli_prepare($link, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "si", $username, $tournamentId);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) == 0) {
        $sql = "INSERT INTO tournament_registrations (username, tournament_id) VALUES (?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "si", $username, $tournamentId);
        if (mysqli_stmt_execute($stmt)) {
            echo "Signed up successfully!";
        } else {
            echo "Error signing up: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "You have already signed up for this tournament.";
    }
    mysqli_stmt_close($check_stmt);
}
?>
