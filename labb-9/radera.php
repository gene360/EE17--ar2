<?php
/*
* PHP version 7
* @category   Blogg med fillagring
* @author     Gene Helli 
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
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link active " href="./lista.php">Admin</a></li>
            </ul>
        </nav>
        <main>
            <?php
            /* Ta emot text från formuläret och spara ned i en textfil */
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            $radera = filter_input(INPUT_POST, 'radera', FILTER_SANITIZE_STRING);

            /* 1. Logga in på mysql-servern och välj databas */
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            /* Gick det att ansluta? */
            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            }

            if ($id && !$radera) {
                /* 2. Ställ en SQL-fråga */
                $sql = "SELECT * FROM blogg WHERE id = '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    /* 3. Ta emot svaret och bearbeta det */
                $rad = $result->fetch_assoc();
               
                echo "<form action=\"#\" method=\"POST\">";
                echo "<h2>Är du säker på att du vill radera?</h2>";
                echo "<div class=\"inlagg\">";
                echo "<h5>Inlägg $id</h5>";
                echo "<p>$rad[rubrik]</p>";
                echo "<p>$rad[datum]</p>";
                echo "<p>$rad[inlagg]</p>";
                echo "</div>";
                echo "<button class=\"button\" name=\"radera\" value=\"1\">Radera inlägget</button>";
                echo "</form>"; 
                }
            }

            /* När man har klickat på knappen radera */
            if ($id && $radera) {
                /* Kör en SQL-fråga */
                $sql = "DELETE FROM blogg WHERE id = '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen");
                } else {
                    echo "<p>Inlägg $id har raderats</p>";
                }
            }

            /* 4. Stäng ned anslutningen */
            $conn->close();
            ?>
        </main>
    </div>
</body>
</html>