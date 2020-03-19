<?php
/*
* PHP version 7
* @category   Blogg med fillagring
* @author     Karim Ryde <karye.webb@gmail.com>
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
    <title>Registrea</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Registrera din recension</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./main.php">Hem</a></li>
                <li class="nav-item"><a class="nav-link active" href="./registrea.php">Skriv recension</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Mina recensioner</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
            </ul>
        </nav>
        <main>
            <form action="#" method="post">
                <label>Skriv en namn för din recension</label>
                <input type="text" name="namn" required>
                
                <label>Betyg</label>
                <input type="radio" id="betyg" name="betyg" value="1" checked required>
                <input type="radio" id="betyg" name="betyg" value="2">
                <input type="radio" id="betyg" name="betyg" value="3">
                <input type="radio" id="betyg" name="betyg" value="4">
                <input type="radio" id="betyg" name="betyg" value="5">
                <input type="radio" id="betyg" name="betyg" value="6">
                <input type="radio" id="betyg" name="betyg" value="7">
                <input type="radio" id="betyg" name="betyg" value="8">
                <input type="radio" id="betyg" name="betyg" value="9">
                <input type="radio" id="betyg" name="betyg" value="10">

                <label>Skriv din recension</label>
                <textarea class="form-control" name="recension" id="recension" cols="30" rows="10" required></textarea>
                <button class="btn btn-primary">Registrera</button>
            </form>

            <?php
            /* Ta emot text från formuläret och spara ned i en textfil. */
            $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
            $filmid = filter_input(INPUT_POST, 'filmid', FILTER_SANITIZE_STRING);
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

                /* 2. Registera recension i tabellen */
                $sql = "INSERT INTO filmer (namn, betyg, recension) VALUES ('$namn', '$betyg', '$recension')";
                //var_dump($sql);
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen. " . $conn->error);
                } else {
                    echo "<p>Din recension har registrerats</p>";
                }
            }
            ?>
        </main>
    </div>
</body>
</html>