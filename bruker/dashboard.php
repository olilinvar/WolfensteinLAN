<?php
session_start();

require '../main_pages/db_connect.php'; // Make sure this path is correct

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../main_pages/login.php");
    exit;
}

$username = $_SESSION["username"] ?? 'Guest';
$email = $_SESSION["email"] ?? 'No email provided'; 
$gamertag = $_SESSION["gamertag"] ?? 'No gamertag'; 
$gamerStatus = $_SESSION["gamerStatus"] ?? 'No status defined';

// Fetch user's tournament registrations
$query = "SELECT t.name, t.start_date, t.end_date FROM tournaments t 
          JOIN tournament_registrations tr ON t.tournament_id = tr.tournament_id 
          WHERE tr.username = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$registeredTournaments = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard</h1>
        <a href="../main_pages/logout.php" class="btn btn-danger">Logout</a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Profile Information</h5>
                <p class="card-text">Username: <?php echo htmlspecialchars($username); ?></p>
                <p class="card-text">Email: <?php echo htmlspecialchars($email); ?></p>
                <p class="card-text">Gamer Tag: <?php echo htmlspecialchars($gamertag); ?></p>
                <p class="card-text">Gamer Status: <?php echo htmlspecialchars($gamerStatus); ?></p>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Your Tournaments</h5>
                <?php if (count($registeredTournaments) > 0): ?>
                    <ul>
                        <?php foreach ($registeredTournaments as $tournament): ?>
                            <li><?php echo htmlspecialchars($tournament['name']) . " - " . $tournament['start_date'] . " to " . $tournament['end_date']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>You are not signed up for any tournaments.</p>
                <?php endif; ?>
                <a href="../admin/view_tournaments.php" class="btn btn-primary">View Available Tournaments</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
