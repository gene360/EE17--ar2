<?php
/*
* PHP version 7
* @category   Blogg med fillagring
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
session_start();

include_once "./konfig-db.php"; 

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redigera</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="kontainer">
        <h1>Är du säker på att du vill redigera?</h1>
        <nav>
        <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./main.php">Hem</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrea.php">Skriv recension</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Mina recensioner</a></li>
                <li class="nav-item"><a class="nav-link active" href="./admin.php">Admin</a></li>
            </ul>
        </nav>
        <main>
            <?php
            /* Läs in id och hämta inläggets rubrik och text */
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

            /* 1. Logga in på mysql-servern och välj databas */
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            /* Gick det att ansluta? */
            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            }
            /* 2. Ställ en SQL-fråga */
            if ($id) {
                $sql = "SELECT * FROM filmer WHERE id = '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                /* 3. Ta emot svaret och bearbeta det */
                $rad = $result->fetch_assoc();

                echo "<form action=\"#\" method=\"POST\">";
                echo "<label>Namn</label>";
                echo "<input type=\"text\" name=\"namn\" value=\"$rad[namn]\" required>";
                echo "<input type=\"hidden\" name=\"id\" value=\"$id\" required>";  

                echo "<label>Betyg</label>";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"1\" checked required>";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"2\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"3\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"4\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"5\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"6\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"7\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"8\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"9\">";
                echo "<input type=\"radio\" id=\"betyg\" name=\"betyg\" value=\"10\">";

                echo "<label>Inlägg</label>";
                echo "<textarea class=\"form-control\" name=\"recension\" id=\"recension\" cols=\"30\" rows=\"10\" required>$rad[recension]</textarea>";

                echo "<button class=\"btn btn-primary\" name=\"radera\"value=\"1\">Uppdatera</button>";
                echo "</form>"; 
                }
            }
            /* 4. Stäng ned anslutningen */
            $conn->close();
            ?>

            <?php
            /* Ta emot text från formuläret och spara ned i en textfil. */
            $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
            $betyg = filter_input(INPUT_POST, 'betyg', FILTER_SANITIZE_STRING);
            $recension = filter_input(INPUT_POST, 'recension', FILTER_SANITIZE_STRING);

            if ($namn && $betyg && $recension) {
                /* 1. Logga in på mysql-servern och välj databas */
                $conn = new mysqli($host, $användare, $lösenord, $databas);
                
                /* Gick det att ansluta? */
                if ($conn->connect_error) {
                    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
                } else {
                    echo "<p>Det gick att ansluta till databasen.</p>";
                }

                /* 2. Registera inlägget i tabellen */
                $sql = "UPDATE filmer SET namn='$namn', betyg='$betyg', recension='$recension' WHERE id= '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    echo "<p>Ditt inlägg har uppdaterats</p>";
                }
            }
            ?>
        </main>
    </div>
</body>
</html>