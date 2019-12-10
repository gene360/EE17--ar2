<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Labb-6-logga in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <form action="#" method="POST">
            <h1>Logga in</h1>

            <label>Användarnamn</label>
            <input type="text" name="namn">

            <label>Lösenord</label>
            <input type="password" name="lösen"><br>

            <button>Logga in</button>

            <?php
            /* Läs in användarnamn och lösenord */
            $anamn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
            $losen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);
            $registera = "registerad.txt";
            
            /* Läs in textfil file() or die() */
            $rader = file($registera) or die("Filen går inte att läsa");

            /* Nästa rad? ---> nej, slut*/
            /* Plocka ut användarnamn och hash */
            foreach ($rader as $rad) {
                /* Dela upp raderna */
                $delar = explode(" ", $rad);
                $deladNamn = $delar[0];
                $hash = $delar[1];

                /* Stämmer användarnamn och hash-lösenordet ---> Användarnamn efter lösenord stämmer inte*/
                if ($deladNamn == $anamn && password_verify($losen, $hash)) {
                    
                }
                /* Du är inloggad */
            }
            


            ?>
        </form>
    </div>
    
</body>
</html>