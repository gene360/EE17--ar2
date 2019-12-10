<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skolans salar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Skolans Salar</h1>
        <?php
        /* Läs in textfilen */
        $texfil = "salar.tsv";

        if (is_readable($texfil)) {
            
            $rader = file($texfil);
            /* Visa salar i en tabell: nr, namn, bokbar */
            echo "<table>";
            echo 
            "<tr>
                <th>Nr</th><th>Namn</th><th>Typ</th><th>Bokbar</th>
            </tr>";
            /* Den här är till för att dela upp */
            foreach ($rader as $rad) {
                //echo "<p>$rad</p>";
                /* Dela upp raderna i delar */
                $delar = explode("\t", $rad);
                //var_dump($delar);

                /* Plocka det som vi behöver */
                $salNrNamn = $delar[1]; // DVS "410/Dali"
                $bokbar = $delar[3]; //DVS 1

                
                /* Plocka ut salsnr och salsnamn */
                if (strstr($salNrNamn, "/")) {
                    $delar = explode("/", $salNrNamn);
                    $salNr = $delar[0]; // DVS "410"
                    $salNamn = $delar[1]; //DVS "Dali"
                    /* Om salNr har ett bindestreck (-), dela upp igen */
                if (strstr($salNr, "-")) { // DVS 506-grupprum
                    $delar = explode("-", $salNr);
                    $salNr = $delar[0];
                    $salTyp = $delar[1];

                    
                    } else {
                        $salTyp = "sal";
                    }

                    echo 
                "<tr>
                    <td>$salNr</td><td>$salNamn</td><td>$salTyp</td><td>$bokbar</td>
                </tr>";
                } else {
                    
                }
            }
        } else {
            echo "<p>$texfil går inte att läsa</p>";
            
        } 
        echo "</table>";
        /* Visa om salen är bokad med röd fär, om inte visa med grön */
        ?>
    </div>
</body>
</html>