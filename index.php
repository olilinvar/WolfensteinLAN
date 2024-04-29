<?php
include "db_connect.php"; // Assuming this is the correct path to your database connection script
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wolfenstein LAN Party Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Wolfenstein LAN Party Registration</h1>
        <p>Join us for an exciting night of gaming!</p>
        
        <div class="mb-4">
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="name">Navn:</label>
                    <input type="text" class="form-control" id="name" name="navn" placeholder="Full name" required>
                </div>
                <div class="form-group">
                    <label for="gamertag">Spillernavn:</label>
                    <input type="text" class="form-control" id="gamertag" name="spillernavn" placeholder="Gamer tag" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        
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
    </div>
    
    <!--  JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
