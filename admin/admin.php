<?php
include "../main_pages/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's panel</title>
</head>
<body>
    <?php
    include "../main_pages/db_connect.php";  // Ensure this path is correct
    ?>

    <h2>Create Tournament</h2>
        <form action="admin_process_tournament.php" method="post">
        <label for="tournament_name">Tournament Name:</label>
        <input type="text" id="tournament_name" name="tournament_name" required>

        <label for="tournament_start_date">Start Date:</label>
        <input type="date" id="tournament_start_date" name="tournament_start_date" required>

        <label for="tournament_end_date">End Date:</label>
        <input type="date" id="tournament_end_date" name="tournament_end_date" required>

        <input type="submit" value="Create Tournament">
    </form>

    <h2>Registered Users</h2>
    <?php
        $sql = "SELECT * FROM brukere";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<ul class='list-group'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li class='list-group-item'>Name: " . htmlspecialchars($row['navn']) . " | Gamer Tag: " . htmlspecialchars($row['GamerTag']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No users registered yet.</p>";
        }
    ?>
</body>
</html>
