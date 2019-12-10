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
        <h1>Dina delar till datorn</h1>
        <h2>Varokorg</h2>
        <?php
        $varukorg = "varukorg.txt";

        /* Ta emot data */
        $vara = filter_input(INPUT_POST, 'vara', FILTER_SANITIZE_STRING);
        if ($vara) {
            /* Spara ned i varukorg.txt */
            $handtag = fopen($varukorg, 'a');
            fwrite($handtag, "$vara\n");
            fclose($handtag);
        }

        if (is_readable($varukorg)) {
            $rader = file($varukorg);
            $total = 0;

            /* Skriv ut tabell */
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>Vara</th><th>Pris</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            /* Skriv ut rad för rad */
            foreach ($rader as $rad) {
                $vara = vara($rad);
                $pris = pris($rad);
                $total = $total + $pris;
                echo "<tr><td>$vara</td><td>$pris:-</td></tr>";
            }
            echo "</tbody>";
            echo "<tfoot>";
            echo "<tr><td>Summa</td><td>$total:-</td></tr>";
            echo "</tfoot>";
            echo "</table>";
        } else {
            echo "<p>Varukorgen finns inte</p>";
        }
        ?>
        <a class="knapp" href="./steg-1.php">Börja om</a>
    </div>
</body>
</html>