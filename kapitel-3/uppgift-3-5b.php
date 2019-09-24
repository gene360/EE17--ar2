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
    <form action="./uppgift-3-5b.php" method="POST">
        <h2>Lånekalkylator</h2><br>
        <label>Belopp</label>
        <input type="number" name="belopp" required>

        <label>Ränta</label>
        <input type="number" name="ranta" required>

        <label>Lånetid</label>
        <input type="radio" name="tid" value="1">1 år
        <input type="radio" name="tid" value="3">3 år
        <input type="radio" name="tid" value="5">5 år

        <button>Skicka</button>
    </form>
    <?php
    if (isset($_REQUEST["belopp"], $_REQUEST["ranta"], $_REQUEST["tid"])) {
        /* Ta emot data som skickas */
        $belopp = $_REQUEST["belopp"];
        $ranta = $_REQUEST["ranta"];
        $tid = $_REQUEST["tid"];

        /*  Programmet ska sedan räkna ut den totala lånekostnaden. Räknas ut genom ränta på ränta-principen, årsvis). Så för ett tvåårigt lån på 5000 med räntan 4% skulle alltså lånekostnaden bli 5000*1,04*1,04 - 5000. Observera att lånet är "amorteringsfritt */
        $kostnad = $belopp;
        for ($i = 0; $i < $tid; $i++) { 
        $kostnad = $kostnad * (1 + $ranta / 100); 
        }
        $kostnad = $kostnad - $belopp;
        echo "<p>Totala lånekostnaden är $kostnad</p>";
    }
    ?>  
</body>
</html>