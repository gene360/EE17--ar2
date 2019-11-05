<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lägg till resurang</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Namn</label>
            <input type="text" name="namn">
            <label>Gata</label>
            <input type="text" name="gata">
            <label>Postnummer</label>
            <input type="text" name="postnummer">
            <label>Postort</label>
            <input type="text" name="postort">

            <button class="primary">Skicka</button>
        </form>
        <?php
/* Läs in filen */
$filnamn = './restauranger.csv';

$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
$gata = filter_input(INPUT_POST, 'gata', FILTER_SANITIZE_STRING);
$postnummer = filter_input(INPUT_POST, 'postnummer', FILTER_SANITIZE_STRING);
$postort = filter_input(INPUT_POST, 'postort', FILTER_SANITIZE_STRING);

if ($namn && $gata && $postnummer && $postort) {
    /* Öppna en anslutning till textfilen för att skriva */
    $handtag = fopen($filnamn, 'a');

    /* Skriv i textfilen */
    fwrite($handtag, "\n$namn, $gata, $postnummer, $postort");

    /* Stäng med anslutning till textfilen */
    fclose($handtag);
}
?>
    </div>
</body>
</html>