<?php
include "../main_pages/db_connect.php";

if (!isset($link)) {
    die('Database connection failed');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['tournament_name'];
    $startDate = $_POST['tournament_start_date'];
    $endDate = $_POST['tournament_end_date'];

    $sql = "INSERT INTO tournaments (name, start_date, end_date) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $startDate, $endDate);
        if (mysqli_stmt_execute($stmt)) {
            echo "Tournament created successfully!";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the statement: " . mysqli_error($link);
    }
}
?>
