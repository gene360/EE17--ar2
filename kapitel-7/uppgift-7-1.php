<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 7-1</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Filnamn</label>
        <input type="text" name="filnamn" required>
        <label>Texten</label>
        <textarea name="texten" cols="10" rows="3" placeholder="Skriv din personliga text" required></textarea>

        <button class="primary">Skicka</button>
    </form>
    <?php

/* Ta emot data */
$filnamn = filter_input(INPUT_POST, 'filnamn', FILTER_SANITIZE_STRING);
$texten = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);
if ($filnamn && $texten) {
    /* Öppna en anslutning till textfilen för att skriva */
    $handtag = fopen($filnamn, 'w');

    /* Skriv i textfilen */
    fwrite($handtag, $texten);

    /* Stäng med anslutning till textfilen */
    fclose($handtag);

    /* Alternativ */
    file_put_contents($filnamn, $texten);
}
?>
</div>
</body>
</html>