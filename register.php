<?php
// register.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Antar at du vil bruke PDO for databasetilkobling i fremtiden
    // For øyeblikket bare en placeholder for databasetilkobling
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ign = $_POST['ign'];

    // Her ville du ha kode for å koble til databasen og lagre dataene
    // For eksempel:
    // $pdo = new PDO('mysql:host=din_host;dbname=din_databasenavn', 'brukernavn', 'passord');
    // $stmt = $pdo->prepare('INSERT INTO registrations (name, email, ign) VALUES (?, ?, ?)');
    // $stmt->execute([$name, $email, $ign]);
    
    // Midlertidig omdirigering til bekreftelsessiden
    header('Location: confirmation.php');
    exit();
}
?>
