<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Labb-6- registera</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <form action="#" method="POST">
            <h1>Register</h1>

            <label>Användarnamn</label>
            <input type="text" name="namn">

            <label>Lösenord</label>
            <input type="password" name="lösen"><br>

            <button>Registrera</button>
        </form>
    </div>

    <?php
    $anamn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);
    $registera = "registerad.txt";

    if ($anamn && $losen) {
        /* Rensa bort tomma tecken i början och slutet */
        $trimmedAnamn = trim($anamn);
        $trimmedLosen = trim($losen);
        
        /* Omvandla användarnamnet till småtecken */
        $trimmedAnamn = strtolower($trimmedAnamn);

        /* Räkna fram hash på lösenordet */
        $hash = password_hash($trimmedLosen, PASSWORD_DEFAULT);

        /* Öppna textfilen ---> Kunde inte öppna textfilen */
        $handtag = fopen($registera, 'a') or die('Kan inte öppna filen');

        /* Lägg till användarnamn !UTAN MELLANSLAG! och hash */
        fwrite($handtag, "$trimmedAnamn $hash \r\n");

        /* Stäng filen */
        fclose($handtag);
    }
    ?>
</body>
</html>