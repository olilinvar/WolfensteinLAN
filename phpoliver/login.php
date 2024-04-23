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
        header("Location: index.php?error=navn is required!");
        exit();
    } else if (empty($spillernavn)) {
        header("Location: index.php?error=spillernavn is required!");
        exit();
    }

//||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||| Sjekker login detaljer med databasen ||||||||
//||||||||||||||||||||||||||||||||||||||||||||||||||||

    $sql = "INSERT INTO table1 (navn, GamerTag) VALUES ('$navn', '$spillernavn')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?success=Your account has been created successfully");
        exit();
    } else {
        header("Location: index.php?error=Unknown error occurred&$user_data");
        exit();
    }
}
