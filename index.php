<?php
include "main_pages/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wolfenstein LAN Party Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-register-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .btn-custom {
            min-width: 150px;
            margin: 0 10px;
        }
    </style>
</head>
<body>

    <div class="container mt-5 text-center">
        <h1>Wolfenstein LAN Party Registration</h1>
        <p>Join us for an exciting night of gaming!</p>

        <div class="login-register-buttons">
            <a href="main_pages/login.php" class="btn btn-success btn-custom">Login</a>
            <a href="main_pages/register.php" class="btn btn-primary btn-custom">Register</a>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
