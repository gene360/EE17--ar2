<?php
/* Skriv en webbapp som tar en text och omvandlar den till morsekod. Se https://onlinetexttools.com/convert-text-to-morse och https://morsealfabetet.se. Lägg till ljudspelare se https://codepen.io/cople/pen/zZLJOz */    
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4-5</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="kontainer">
    <form action="./uppgift-4-5.php" method="POST">
            <h1>Omvandla tal till morsekod</h1><br>
                <label>Skriv här</label><br>
                <textarea name="texten" cols="30" rows="10" required></textarea>    
                    <button class="primary">Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $texten = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);
        if ($texten) {
            /* Morsealfabetet */
            $morse['A'] = '.-';
            $morse['B'] = '-...';
            $morse['C'] = '-.-.';
            $morse['D'] = '-..';
            $morse['E'] = '.';
            $morse['F'] = '..-';
            $morse['G'] = '--.';
            $morse['H'] = '....';
            $morse['I'] = '.---';
            $morse['J'] = '-.-';
            $morse['K'] = '-.-';
            $morse['L'] = '.-..';
            $morse['M'] = '--';
            $morse['N'] = '-.';
            $morse['O'] = '---';
            $morse['P'] = '.--.';
            $morse['Q'] = '--.-';
            $morse['R'] = '.-.';
            $morse['S'] = '...';
            $morse['T'] = '-';
            $morse['U'] = '..-';
            $morse['V'] = '...-';
            $morse['W'] = '.--';
            $morse['X'] = '-..-';
            $morse['Y'] = '-.--';
            $morse['Z'] = '--..';
            $morse['Å'] = '.--.-';
            $morse['Ä'] = '.-.-';
            $morse['Ö'] = '---.';
    
            /* Dela upp texten i dess bokstäver */
            $texten = mb_strtoupper($texten);
            $delar = str_split($texten);
    
            /* Skriv ut texten i moreskod */
            echo "<p>$texten</p>";
            echo "<form id=\"demo\"><input type=\"text\" pattern=\"[.\- ]+\" name=\"code\" value=\"";
            foreach ($delar as $bokstav) {
    
                /* Om tecknet finns i alfabetet skriv ut moreskod*/
                if (array_key_exists($bokstav, $morse)) {
                    echo "$morse[$bokstav] ";
                }
            }
            echo "\"><button>Spela upp</button></form>";
        }
        ?>
</div>
<script src="./morse.js"></script>
</body>
</html>