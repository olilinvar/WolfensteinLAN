<?php
include "db_connect.php"; // This file creates a $link object used for database connection

$errors = []; // Array to store any form validation errors
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $navn = !empty($_POST['navn']) ? trim($_POST['navn']) : null;
    $spillernavn = !empty($_POST['spillernavn']) ? trim($_POST['spillernavn']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? password_hash(trim($_POST['password']), PASSWORD_DEFAULT) : null; // Hash password immediately to secure it

    // Check for required fields
    if (empty($navn)) {
        $errors['navn'] = 'Full name is required.';
    }
    if (empty($spillernavn)) {
        $errors['spillernavn'] = 'Gamer tag is required.';
    }
    if (empty($username)) {
        $errors['username'] = 'Username is required.';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required.';
    }

    // If there are no errors, proceed to insert the data into the database
    if (empty($errors)) {
        $sql = "INSERT INTO brukere (navn, GamerTag, username, password) VALUES (?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {  // Make sure to use $link from db_connect.php
            mysqli_stmt_bind_param($stmt, "ssss", $navn, $spillernavn, $username, $password);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: login.php?success=1"); // Redirect to login page on success
                exit();
            } else {
                $errors['db'] = mysqli_error($link); // Capture any SQL errors
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Register</h1>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="name">Navn:</label>
                <input type="text" class="form-control" id="name" name="navn" placeholder="Full name" required value="<?php echo htmlspecialchars($navn ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="gamertag">Spillernavn:</label>
                <input type="text" class="form-control" id="gamertag" name="spillernavn" placeholder="Gamer tag" required value="<?php echo htmlspecialchars($spillernavn ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="<?php echo htmlspecialchars($username ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
