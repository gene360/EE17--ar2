<?php
/*
* PHP version 7
* @category   Blogg med fillagring
* @author     Gene Helli 
* @license    PHP CC
*/
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

include_once "./konfig-db.php";

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Redigera eller radera</h1>
        <nav>
        <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./main.php">Hem</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrea.php">Registrea recension</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Mina recensioner</a></li>
                <li class="nav-item"><a class="nav-link active" href="./admin.php">Admin</a></li>
            </ul>
        </nav>
        <main>
            <div class="jumbotron">
                <?php
                /* 1. Logga in på mysql-servern och välj databas */
                $conn = new mysqli($host, $användare, $lösenord, $databas);
                
                /* Gick det att ansluta? */
                if ($conn->connect_error) {
                    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
                } else {
                    //echo "<p>Det gick att ansluta till databasen.</p>";
                }
                
                /* 2. Ställ en SQL-fråga */
                $sql = "SELECT * FROM filmer";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    //echo "<p>Ditt inlägg har registrerats</p>";
                }
                
                /* 3. Ta emot svaret och bearbeta det */
                echo "<table>";
                echo "<tr><th>Rubrik</th><th>Betyg</th><th>Recension</th><th></th></tr>";
                while ($rad = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>$rad[namn]</td><td>$rad[betyg]</td><td>$rad[recension]</td><td><a href=\"./redigera.php?id=$rad[id]\"><i class=\"fa fa-edit\"></i></a><a href=\"./radera.php?id=$rad[id]\"><i class=\"fa fa-trash\"></i></a></td>
                        </tr>";
                }
                echo "</table>";

                /* 4. Stäng ned anslutningen */
                $conn->close();
                ?>
            </div>
        </main>
    </div>
</body>
</html>