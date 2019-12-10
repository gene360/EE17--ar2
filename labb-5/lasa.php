<?php
/*
* PHP version 7
* @category   Blogg med fillagring
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
session_start();
/* Är användaren inte inloggad? */
if (!isset($_SESSION['login'])) {
    /* Nej, gå till loginsidan */
}
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
                <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <?php if (!isset($_SESSION['login'])) { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <?php } ?>
            </ul>
        </nav>
        <main>
            <div class="jumbotron">
                <?php
                /* Öppna textfilen och läsa innehållet och skriv ut det. */
                $allaRader = file("inlaggen.txt");
                foreach ($allaRader as $rad) {
                    echo $rad . "<br>";
                }
                ?>
            </div>
        </main>
    </div>
</body>
</html>