<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../main_pages/login.php");
    exit;
}

// You can add more session variables like username, email etc. after the user has logged in successfully
$username = $_SESSION["username"] ?? 'Guest'; // Replace 'Guest' with appropriate default value

if (isset($_GET['logout']) && $_GET['logout'] == '1') {

    $_SESSION = array(); 
    session_destroy(); 
    header("Location: ../main_pages/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        footer {
            margin-top: 20px;
            padding: 20px 0;
            background-color: #f5f5f5;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5 text-center">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Ready to see your dashboard?</p>
        <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
        <!-- Logout Button -->
        <a href="?logout=1" class="btn btn-danger mt-3">Logout</a>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Your Website. All Rights Reserved.</p>
        <p>Contact us at <a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></p>
    </footer>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
