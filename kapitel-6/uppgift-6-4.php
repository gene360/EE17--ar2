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
    /* Konstruera ett reguljärt uttryck som ska kontrollera adresser som ska föras in i en databas. Adresserna får endast bestå av små och stora bokstäver, punkt, siffror och mellanslag. */

    $text = "(craafordväg 12)";
    if (preg_match("/[a-zåäö0-9 .]+/i", $text)) {
        echo "<p>Texten matchar.</p>";
    } else {
        echo "<p>Texten matchar INTE.</p>";
    }
    
    ?>
</body>
</html>