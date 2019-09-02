<?php
/* Hämta dagens datum */
$title = "Dagens Lunch: " . date('l \vW');

/* Skapa en array (array börjar alltid på 0) */
$matStälleLista = ["Taco Bar", "Subway Oden", "Mamma Mia", "FaFas", "Subway St Eriksplan"];

//var_dump($matStälleLista);

/* Hur många resturanger finns det i listan */
$antal = count($matStälleLista);
//var_dump($antal);

/* Slumpa fram ett tal mellan 0 - 4 */
$slumptal = rand(0, $antal - 1);

/* Fram slumpa resturang */
$matStälle = $matStälleLista[$slumptal];

$betyg = "Grymt gott varje dag!";
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bästa matstället</h1>
        <div class="mat">
            <h2><?php
            echo $matStälle;
            ?></h2>

            <p><?php
            echo $betyg;
            ?></p>
        </div>
    </div>
</body>
</html>