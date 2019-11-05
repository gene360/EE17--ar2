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
    /* Konstruera ett reguljärt uttryck som matchar en sträng som innehåller ett "t" följt av ett eller två "o". Endast små bokstäver ska matchas. */

    /* Matchar "to" */
    $mat = "tomat och gurka";
    if (preg_match("/to/", $mat)) {
        echo "<p>Text innehåller ordet 'to'.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'to'.</p>";
    }

    /* MAtchar "to" och "too" */
    $mat = "tomat, toomat och gurka";
    if (preg_match("/to{1,2}/", $mat)) {
        echo "<p>Text innehåller ordet 'too'.</p>";
    } else {
        echo "<p>Text innehåller INTE ordet 'too'.</p>";
    }
    
    ?>
</body>
</html>