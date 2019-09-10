<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 2-5</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Bekräftelse</h1>
    <div class="kontainer">
        <?php
        /* Ta emot data som skickas */
        $temp = $_REQUEST["temp"];
        $riktning = $_REQUEST["riktning"];

        if ($riktning == "CF") {
            /* Fahrenheit: F - (9/5)*C + 32 */
            $fahrenheit = (9 / 5 * $temp + 32);
            echo "<p>$temp&deg; Celsius är $fahrenheit&deg; Fahrenheit.</p>";
        } elseif ($riktning == "CK") {
            /* Kelvin: K = C - 273 */
            $kelvin = $temp - 273;
            echo "<p>$temp&deg; Celsius är $kelvin&deg; Kelvin.</p>";
        } else {
            /* Celcius: C - (F - 32)* (5/9)*/
            $celsius = ($temp - 32) * (5 / 9);
            echo "<p>$temp&deg; Farhrenheit är $celsius&deg; Celius.</p>";
        }
        ?>
    </div>
</body>
</html>