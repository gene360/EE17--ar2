<?php
/*
* PHP version 7
* @category   Hjälpfunktioner 
* @author     Gene Helli <genehelli@gmail.com>
* @license    PHP CC
*/

include_once "./funktioner.inc.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webbshop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din egen PC - steg 6</h1>
        <h2>Varukorg</h2>
        <?php
/* visa innehåll på varukorgen = varukorg.txt */
$varukorg = "varukorg.txt";

/* Ta emot data */
$vara = filter_input(INPUT_POST, 'vara', FILTER_SANITIZE_STRING);
if ($vara) {
    /* Spara ned i varukorg.txt */
    $handtag = fopen($varukorg, 'a');
    fwrite($handtag, "$vara\n");
    fclose($handtag);
}

if (is_readable($varukorg)) {
    /* Läs in varaukorg i en array */
    $rader = file($varukorg);

        /* Skriv ut tabell */
        echo "<table>";
        echo "<tr><th>Vara</th><th>Pris</th></tr>";
    
        /* Skriv ut rad för rad */
        foreach ($rader as $rad) {
            $vara = vara($rad);
            $pris = pris($rad);
            echo "<tr><td>$vara</td><td>$pris</td></tr>";
        }
        echo "</table>";
} else {
    echo "<p>Varukorgen finns inte</p>";
}
?>
<h2>Välj PSU</h2>
<form action="./steg-7.php" method="post">
<?php
$katalog = "./shop-bilder/psu";

/* Hämta katalogens innehåll */
$filer = scandir($katalog);

/* Skriv ut katalogens innehåll */

foreach ($filer as $fil) {
    /* Hämta filens data */
    $info = pathinfo($fil);

    /* Om filtyp är jpg, skriv ut bilden */
    if (($info['extension'] == 'jpg' || $info['extension'] == 'png' || $info['extension'] == 'webp')) {
        echo "<label>";
        echo "<input type=\"radio\" name=\"vara\" value=\"$fil\">";
        echo "<img src=\"$katalog/$fil\">";
        $vara = vara($fil);
        $pris = pris($fil);
        echo "$vara $pris:-";
        echo "</label>";
    }
}
echo "<button>Nästa</button>";
echo "</form>";
?>
    </div>
</body>
</html>