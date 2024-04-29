<?php
include "main_pages/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's panel</title>
</head>
<body>
    <h2>Registrerte brukere</h2>
    <?php
        $sql = "SELECT * FROM brukere"; //Er det kolumn for brukere i databasen??
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<ul class='list-group'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li class='list-group-item'>Navn: " . htmlspecialchars($row['navn']) . " | Spillernavn: " . htmlspecialchars($row['GamerTag']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Ingen brukere registrert ennå.</p>";
        }
    ?>
</body>
</html>
