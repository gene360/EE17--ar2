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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>läsa textfil</label>
        <input type="text" name="filnamn" required>
        <button class="primary">Skicka</button>
    </form>
    <?php

    /* Ta emot data */
    $filnamn = filter_input(INPUT_POST, 'filnamn', FILTER_SANITIZE_STRING);
    if ($filnamn) {
    /* Kontrollera filnamnet så att det endast innehåller bokstäver, siffror och punkt */
    if (preg_match("/[a-zåäö0-9.]+/", $filnamn)) {
        echo "<p>Filnamnet är korrekt.</p>";

    /* Öppna filen för att läsa */
    $text = file_get_contents($filnamn); 
    
    /* skriv ut innehållet */
    echo "<p>$text</p>";
    } else {
        echo "<p>Text innehåller INTE korrekt.</p>";
    }
}
?>
</body>
</html>