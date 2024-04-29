<?php
include "db_connect.php"; // Ensure the path to db_connect.php is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation and sanitation of input
    $navn = !empty($_POST['navn']) ? trim($_POST['navn']) : null;
    $spillernavn = !empty($_POST['spillernavn']) ? trim($_POST['spillernavn']) : null;

    // Error handling
    $errors = [];
    if (empty($navn)) {
        $errors['navn'] = 'Navn is required.';
    }
    if (empty($spillernavn)) {
        $errors['spillernavn'] = 'Spillernavn is required.';
    }

    // Insert into database if no errors
    if (empty($errors)) {
        $sql = "INSERT INTO brukere (navn, GamerTag) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $navn, $spillernavn);
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page on success
            header("Location: login.php?success=1");
            exit();
        } else {
            // Database error handling
            $errors['db'] = mysqli_error($conn);
        }
    }
    // If there were errors, fall through to the form below
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
        <?php if (!empty($error_messages)): ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($error_messages as $message): ?>
                    <p><?php echo htmlspecialchars($message); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="register_process.php" method="post">
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
    
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
