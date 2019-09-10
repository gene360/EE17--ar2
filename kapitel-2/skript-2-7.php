<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 2-7</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bekräftelse</h1>
        <?php
        /* Ta emot data som skickas */
        $texten = $_REQUEST["texten"];
        $storlek = $_REQUEST["storlek"];

        if ($storlek == "V") {
            $versaler = mb_strtoupper($texten);
            echo "<p>$versaler</p>";
        } else {
            $gemener = mb_strtolower($texten);
            echo "<p>$gemener</p>";
        }
        ?>
    </div>
</body>
</html>