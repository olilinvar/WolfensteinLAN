<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0"); 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

// Assuming $link is your database connection from a required 'db_connect.php'
require '../main_pages/db_connect.php';

$username = $_SESSION["username"];
$email = $_SESSION["email"];
$gamertag = $_SESSION["gamertag"];
$gamerStatus = $_SESSION["status"] ?? 'No status'; // Placeholder for gamer status

// Check if already signed up for the tournament
$query = "SELECT * FROM tournament_registrations WHERE username = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$isRegistered = mysqli_stmt_num_rows($stmt) > 0;
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
        <a href="logout.php" class="btn btn-danger">Logout</a>
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
                <h5 class="card-title">Tournament Sign-up</h5>
                <?php if (!$isRegistered): ?>
                    <p class="card-text">You are not signed up for any tournaments.</p>
                    <button class="btn btn-primary" onclick="document.getElementById('tournamentForm').style.display='block';">Sign Up for Tournament</button>
                    <div id="tournamentForm" style="display:none;">
                        <form action="signup_tournament.php" method="post">
                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                            <input type="hidden" name="gamertag" value="<?php echo $gamertag; ?>">
                            <input type="submit" class="btn btn-success" value="Confirm Sign Up">
                        </form>
                    </div>
                <?php else: ?>
                    <p class="card-text">You are already signed up for the tournament.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
