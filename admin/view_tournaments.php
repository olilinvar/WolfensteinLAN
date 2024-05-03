<?php
include "../main_pages/db_connect.php";

if (!isset($link)) {
    die("Database connection failed");
}

$sql = "SELECT * FROM tournaments";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . htmlspecialchars($row['name']) . " - " . $row['start_date'] . " to " . $row['end_date'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No tournaments available.</p>";
}
?>
