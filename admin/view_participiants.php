<?php
include "../main_pages/db_connect.php";

$query = "SELECT name, email, gamertag, tournament FROM participants";
$result = mysqli_query($link, $query);

echo "<h1>Participants List</h1>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Email</th><th>Gamer Tag</th><th>In Tournament</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['gamertag']."</td><td>".($row['tournament'] ? 'Yes' : 'No')."</td></tr>";
}
echo "</table>";

mysqli_close($link);
?>
