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
<h1>Bygg din egen PC - steg 1</h1>
<h2>Välj CPU</h2>
<form action="./steg-2.php" method="post">
<?php
$katalog = "./shop-bilder/cpu";

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