<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kapitel 8</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $katalog = "../kapitel-7";

    /* Skanna av katalogen */
    $resultat = scandir($katalog);

    /* Skriv ut allt vi hittat */
    foreach ($resultat as $objekt) {
        /* Ta inte med . och .. */
        if ($objekt != '.' && $objekt != '..') {

            /* Är det en katalog? */
            if (is_dir("$katalog/$objekt")) {
                echo "<p>Katalog: $objekt</p>";
            } else {
                echo "<p>Fil: $objekt</p>";
                $filinfo = pathinfo($objekt);
                $filtyp = $filinfo['extension'];
                echo "<p>Filtyoen är $filtyp</p>";
            }
        }
    }
    ?>
</body>
</html>