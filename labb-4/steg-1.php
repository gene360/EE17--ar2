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
        <h1>Bygg din egen PC - steg 1</h1>
        <h2>Varukorg</h2>
        <?php
/* visa innehåll på varukorgen = varukorg.txt */
$filnamn = "varukorg.txt";

if (is_readable($filnamn)) {
    /* Läs in varaukorg i en array */
    $rader = file($filnamn);
    
    /* Skriv ut rad för rad */
    foreach ($rader as $rad) {
        echo "<p>$rad</p>";
    }
} else {
    echo 'Varukorgen finns inte';
}
?>
        <h2>Välj CPU</h2>
        <?php
$katalog = "./shop-bilder/cpu";

/* Hämta katalogens innehåll */
$filer = scandir($katalog);

/* Skriv ut katalogens innehåll */
echo "<form>";
foreach ($filer as $fil) {
    /* Hämta filens data */
    $info = pathinfo($fil);

    /* Om filtyp är jpg, skriv ut bilden */
    if ($info['extension'] == "jpg") {
        echo "<label>";
        echo "<input type=\"radio\" name=\"vara\" value=\"$fil\">";
        echo "<img src=\"$katalog/$fil\">$fil";
        echo "</label>";
    }
}
echo "<button>Nästa</button>";
echo "</form>";
?>

    </div>
</body>
</html>