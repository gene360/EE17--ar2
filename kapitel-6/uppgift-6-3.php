<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Konstruera ett reguljärt uttryck som matchar en sträng som börjar med "Det var en gång". Det spelar ingen roll om det första d:et är stort eller litet. */

    $text = "Det var en gång en ... det var en gång";
    if (preg_match("/[Dd]et var en gång/", $text)) {
        echo "<p>Text innehåller ordet 'Det var en gång en'.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'Det var en gång en'.</p>";
    }

    /* Annan sätt att skriva */
    if (preg_match("/Det var en gång/i", $text)) {
        echo "<p>Text innehåller ordet 'Det var en gång en'.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'Det var en gång en'.</p>";
    }
    
    ?>
</body>
</html>