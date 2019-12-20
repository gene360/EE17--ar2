<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bilder från Unsplush</h1>
        <div class="kol2">
        <?php
        /* Läsa av filen */
        $rader = file("./unsplush.txt");
        //var_dump($rader);

        /* Läs in bilderna i katalogen */
        $bilder = scandir("./bilder");
        //var_dump($bilder);

        /* Gå arrayen rad för rad */
        foreach ($rader as $rad) {
            //var_dump($rad);

            /* Hittar positonen på första mellanslaget */
            $pos = strpos($rad, ' ');
            //var_dump($pos);

            /* Plockar från 0 till första mellanslaget */
            $bildLank = substr($rad, 0, $pos);
            //var_dump($bildLank);

            /* Plocka ut bildtexten, från första mellanslaget till slutet */
            $bildText = substr($rad, $pos + 1); 
            $bildText = trim($bildText);
            //var_dump($bildText);

            /* Plocka ut namnen på fotograferna */
            $namn = substr($bildText, 9, -12);

            /* Omvandla till små bokstäver */
            $namn = strtolower($namn);

            /* Byt ut mellanslag med - */
            $namn = str_replace(' ', '-', $namn);
            //var_dump($namn);

            /* Kolla om namnet finns i bilden */
            foreach ($bilder as $bild) {
                $pos = strpos($bild, $namn);
                //var_dump($bild, $namn, $pos);
                if ($pos !== false) {
                    /* Få ut bilden och texten */
                    echo "<figure>
                    <a href=\"./bild.php?bildLank=$bildLank&bildText=$bildText\">
                    <img src=\"$bildLank\" alt=\"$bildText\">
                    </a>
                    <figcaption>$bildText</figcaption>
                    </figure>";
                }
            }
        }
        ?>
        </div>
    </div>
</body>
</html>