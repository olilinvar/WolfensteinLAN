<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

// Assuming you have these details in session or you fetch them from the database
// Replace these with actual data retrieval logic
$username = $_SESSION["username"] ?? 'Unknown'; // Placeholder
$email = $_SESSION["email"] ?? 'No email provided'; // Placeholder
$gamertag = $_SESSION["gamertag"] ?? 'No Gamertag'; // Placeholder
$gamerStatus = $_SESSION["status"] ?? 'No status'; // Placeholder
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Profile Information</h5>
                <p class="card-text">Username: <?php echo htmlspecialchars($username); ?></p>
                <p class="card-text">Email: <?php echo htmlspecialchars($email); ?></p>
                <p class="card-text">Gamer Tag: <?php echo htmlspecialchars($gamertag); ?></p>
                <p class="card-text">Gamer Status: <?php echo htmlspecialchars($gamerStatus); ?></p>
                <!-- Add more profile details here -->
            </div>
        </div>
        <!-- Placeholder for tournament sign-up status -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Tournament Sign-up Status</h5>
                <p class="card-text">Not signed up for any tournaments.</p>
                <!-- Dynamically update this based on actual tournament sign-up status -->
            </div>
        </div>
    </div>
    
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
