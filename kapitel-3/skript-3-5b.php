<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 3-5</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="resultat">
        <h1>lånekalkylator</h1><br>
    <?php
    /* Ta emot data som skickas */
    $belopp = $_REQUEST["belopp"];
    $ranta = $_REQUEST["ranta"];
    $tid = $_REQUEST["tid"];

    /* Gör ett skript som är en lånekalkylator. Mha radioknappar ska användaren kunna välja mellan 1, 3 och 5 års lånetid. I en ruta ska användaren skriva i lånebeloppet och i nästa räntan i hela procent. */
    $kostnad = $belopp;
    for ($i = 0; $i < $tid; $i++) { 
        $kostnad = $kostnad * (1 + $ranta / 100); 
    }
    $kostnad = $kostnad - $belopp;
    echo "<p>Totala lånekostnaden är $kostnad</p>";
    ?>
    </div>
</body>
</html>