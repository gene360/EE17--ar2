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
    <title>bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="kontainer">
        <h1  class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Admin</a></li>
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
                $sql = "SELECT * FROM blogg WHERE id = '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                /* 3. Ta emot svaret och bearbeta det */
                $rad = $result->fetch_assoc();

                echo "<form action=\"#\" method=\"POST\">";
                echo "<h2>Är du säker på att du vill redigera?</h2>";
                echo "<label>Rubrik</label>";
                echo "<input type=\"text\" name=\"rubrik\" value=\"$rad[rubrik]\" required>";
                echo "<input type=\"hidden\" name=\"id\" value=\"$id\" required>";

                echo "<label>Inlägg</label>";
                echo "<textarea class=\"form-control\" name=\"inlagg\" id=\"inlagg\" cols=\"30\" rows=\"10\" required>$rad[inlagg]</textarea>";

                echo "<button class=\"button\" name=\"radera\"value=\"1\">Uppdatera</button>";
                echo "</form>"; 
                }
            }
            
            /* 4. Stäng ned anslutningen */
            $conn->close();
            ?>

            <?php
            /* Ta emot text från formuläret och spara ned i en textfil. */
            $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
            $inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);
            if ($rubrik && $inlagg) {
                /* 1. Logga in på mysql-servern och välj databas */
                $conn = new mysqli($host, $användare, $lösenord, $databas);

                /* Gick det att ansluta? */
                if ($conn->connect_error) {
                    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
                } else {
                    echo "<p>Det gick att ansluta till databasen.</p>";
                }

                /* 2. Registera inlägget i tabellen */
                $sql = "UPDATE blogg SET rubrik='$rubrik', inlagg='$inlagg' WHERE id= '$id'";
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