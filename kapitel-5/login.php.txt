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
<?php
    /* Ta emot data som skickas */
    $anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
    $lösen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);

    /* Kolla om användarnamn och lösenord stämmer */
    if ($anamn == "karim" && $lösen == "ryde") {
        $_SESSION['login'] = true;
    }
?>
    <div class="kontainer">
        <h1  class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <?php if (!isset($_SESSION['login'])) { ?>
                    <li class="nav-item"><a class="nav-link active" href="./login.php">Logga in</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link active" href="./logout.php">Logga ut</a></li>
                <?php } ?>
            </ul>
        </nav>
        <?php
            /* Ta emot data som skickas */
            $fran = filter_input(INPUT_GET, 'fran', FILTER_SANITIZE_STRING);
            if ($fran == "skriva") {
                echo "<p class=\"alert alert-info\">För att skriva ett inlägg måste du logga in först!</p>";
            }
        ?>
        <form class="kol2" action="#" method="POST">
            <label>Användarnamn</label>
            <input type="text" name="anamn" placeholder="Tex erik12" required>
            <label>Lösenord</label>
            <input type="password" name="lösen" required>
            <button class="primary">Skicka</button>
        </form>
        <?php
        /* Skriv ut meddelandem */
        if (isset($_SESSION['login'])) {
            echo "<p class=\"alert alert-success\">Du är inloggad!</p>";
        } else {
            echo "<p class=\"alert alert-warning\">Fel användarnamn eller lösenord. Vg försök igen!</p>";
        }
        ?>
    </div>
</body>
</html>