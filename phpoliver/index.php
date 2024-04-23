<?php
include "login.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
    </head>

    <body>   
        <div>
            <h1>Bruker registrering</h1>
            <form action="login.php" method="post">
                <h2>Register:</h2>
                <label>navn: </label>
                <input type="text" name="navn" placeholder="Username"><br />
                <label>spillernavn: </label>
                <input type="text" name="spillernavn" placeholder="spillernavn"><br />
                <button type="submit">register</button><br />
            </form>
        </div>
        <h1>Registrerte brukere</h1>
        <?php
        // vis alle registrerte brukere i table 1
        $sql = "SELECT * FROM table1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "navn: " . $row['navn'] . " | spillernavn: " . $row['GamerTag'] . "<br>";
            }
        }
        ?>
    </body>

    </html>
    <!-- -------->
<?php
?>