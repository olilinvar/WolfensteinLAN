<?php
session_start();
include "db_connect.php";
//||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||| Henter og validerer data fra index.php ||||||||
//||||||||||||||||||||||||||||||||||||||||||||||||||||||
if (isset($_POST['navn']) && isset($_POST['spillernavn'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $navn = validate($_POST['navn']);
    $spillernavn = validate($_POST['spillernavn']);

    if (empty($navn)) {
        header("Location: register
        .php?error=navn is required!");
        exit();
    } else if (empty($spillernavn)) {
        header("Location: register.php?error=spillernavn is required!");
        exit();
    }

//||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||| Sjekker login detaljer med databasen ||||||||
//||||||||||||||||||||||||||||||||||||||||||||||||||||

    $sql = "INSERT INTO brukere (navn, GamerTag) VALUES ('$navn', '$spillernavn')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: login.php?success=Your account has been created successfully");
        exit();
    } else {
        header("Location: register.php?error=Unknown error occurred&$user_data");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
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
</body>
</html>