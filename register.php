<?php
include "db_connect.php"; // Ensure this is the correct path to your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['navn']);
    $gamertag = mysqli_real_escape_string($conn, $_POST['spillernavn']);

    // Insert query (replace table_name with your actual table name)
    $sql = "INSERT INTO table_name (navn, GamerTag) VALUES ('$name', '$gamertag')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
// Redirect back to the index page
header('Location: index.php');
exit;
?>
