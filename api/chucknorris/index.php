<?php
/*
* PHP version 7
* @category   Hämta data i JSON-format
* @author     Gene Helli (genehelli@gmail.com)
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer"><h1>Chuck Norris Skämt</h1>
        <!-- Tjänsten -->
        <?php
        $url = "https://api.chucknorris.io/jokes/random";

        // Anropa apiet
        $json = file_get_contents($url);

        // Avkoda JSON
        $jsonData = json_decode($json);

        // Plocka ut skämtet
        $skämtet = $jsonData->value;

        // Plocka ut bilden
        $bilden = $jsonData->icon_url;

        // Skrive ut skämtet
        echo "<blockquote><img src=\"$bilden\" alt\"Chuck Norris"$skämtet</blockquote>";
        ?>
    </div>
</body>
</html>