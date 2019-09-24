<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $stad1 = "Stockholm";
    $stad2 = "Malmö";
    $stad3 = "Göteborg";
    $stad4 = "Filipstad";

    $städer = ["Stockholm", "Malmö", "Göteborg", "Filipstad"];
    $tomarray = [];
    $annanarray = array("Hej", "På", "Dig");

    print_r($städer);
    echo $städer[2], "<br>";

    $städer[] = "Helsingborg";
    print_r($städer);

    foreach ($städer as $stad) {
        echo "<p>Staden heter $stad.</p>";
    }

    //$språk = ["Sverige", "Norge", "England"];
    $språk['se'] = "Sverige";
    $språk['no'] = "Norge";
    $språk['en'] = "England";
    print_r($språk);

    foreach ($språk as $index => $land) {
        echo "<p>$index är landskod för $land</p>";
    }
    ?>
</body>
</html>