<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kaptiel 3</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
</head>
<body>
    <?php
    /* Rad1 */
    /* Skriv ut til tal 1.. 10 */
    for ($i = 0; $i < 10; $i++) { 
        echo "Steg: $i, ";
    }

    /* Rad2 */
    echo "<p>Steg: ";
    /* Skriv ut til tal 1.. 10 */
    for ($i = 0; $i < 10; $i++) { 
        echo "$i, ";
    }
    echo "</p>";

    /* Multiplikation för 10 */
    echo "<p>";
    /* Skriv ut til tal 1.. 10 */
    for ($i = 0; $i < 10; $i++) { 
        $i10 = $i * 10;
        echo " $i $i10<br>";
    }

    /* Table */
    echo "<table>";
    echo "<tr><th>Talet</th><th>talet ggr 10</th></tr>";
    /* Skriv ut til tal 1.. 10 */
    for ($i = 0; $i < 10; $i++) { 
        $i10 = $i * 10;
        echo "  <tr>
                <td>$i</td><td>$i10</td>
                </tr>";
    }
    echo "</table>";

    /* Räkna ned 10, 9, 8, 7, 6, 5, 4, 3, 2, 1*/
    echo "<table>";
    echo "<tr><th>Räknar ner</th></tr>";
    /* Skriv ut til tal 1.. 10 */
    for ($i = 10; $i > 0; $i--) { 
        $i10 = $i;
        echo "<tr><td>$i</td></tr>";
    }
    echo "</table>";

    /* Räkna ned 100, 81, 64, 49, 36, 25, 16, 9, 4, 1 */
    echo "<table>";
    echo "<tr> <th>Kvardaten</th> </tr>";
            $i = 10;
    while ($i > 1) {
        $i2 = $i * $i;
        echo    "<tr>
                    <td>$i2</td>
                </tr>";
                $i--;
    }
    echo "</table>";
    ?>
</body>
</html>