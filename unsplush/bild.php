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
        <?php
        /* Ta emot data från galleri.php mha GET */
        $bildLank = filter_input(INPUT_GET, 'bildLank', FILTER_SANITIZE_STRING);
        $bildText = filter_input(INPUT_GET, 'bildText', FILTER_SANITIZE_STRING);

        /* Kollar om bilden och texten finns (skydd) */
        if ($bildLank && $bildText) {
            echo
            "<figure>
            <img src=\"$bildLank\" alt=\"$bildText\">
            <figcaption>$bildText</figcaption>
            </figure>";
        } else {
            echo "<p>Bild saknas</p>";
        }
        ?>
        <a href="./galleri.php">Tillbaka</a>
    </div>
</body>
</html>