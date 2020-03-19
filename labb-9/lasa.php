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
            <li class="nav-item"><a class="nav-link active " href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Admin</a></li>
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
                $sql = "SELECT * FROM blogg";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    //echo "<p>Ditt inlägg har registrerats</p>";
                }
                
                /* 3. Ta emot svaret och bearbeta det */
                while ($rad = $result->fetch_assoc()) {
                    echo "<div class=\"inlagg\">";
                    echo "<h5>$rad[rubrik]</h5>";
                    echo "<p>$rad[datum]</p>";
                    echo "<p>$rad[inlagg]</p>";
                    echo "</div>";
                }
                

                /* 4. Stäng ned anslutningen */
                $conn->close();
                ?>
            </div>
        </main>
    </div>
</body>
</html>