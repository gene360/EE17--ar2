<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 3-3</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css%22%3E
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="./uppgift-3-5b.php" method="POST">
        <h2>Lånekalkylator</h2><br>
        <label>Belopp</label>
        <input type="number" name="tal" required>
        <label>Ränta</label>
        <input type="number" name="ranta" required>%

        <label>Lånetid</label>
        <input type="radio" name="tid" value="1">1 år
        <input type="radio" name="tid" value="3">3 år
        <input type="radio" name="tid" value="5">5 år



        <button>Skicka</button>
    </form>
    <?php
    if ($tal, $ranta, $tid); {
    
    $tal = filter_input("INPUT_POST", $tal, FILTER_DEFAULT);
    $tid = filter_input("INPUT_POST", $tid, FILTER_DEFAULT);
    $ranta = filter_input("INPUT_POST", $ranta, FILTER_DEFAULT);

    var_dump($belopp, $ranta, $tid);


/* Skriv ut svaret */
if ($belopp && $ranta && $tid) {
    $kostnad = $tal;
for ($i = 0; $i < $tid; $i++) { 
    $kostnad =$kostnad * (1 + $ranta / 100);
}
$kostnad = $kostnad - $tal;
echo "<p>totala lånekostnaden är $kostnad.</p>";
}

}

?>
</body>
</html>