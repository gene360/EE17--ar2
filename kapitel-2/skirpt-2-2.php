<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 2-2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="kontainer">
       <h1>Bekräftelse</h1>
       <?php
       /* Ta emot data som skickas */
        $namn = $_REQUEST["namn"];
        $epost = $_REQUEST["epost"];
        $kontaktad = $_REQUEST["kontaktad"];
    
       /* Skriv ut svaret */
        echo "<p>Namn: $namn</p>";
        echo "<p>Epost: $epost</p>";
        echo "<p>Vi kommer att kontakta dig inom snarast per: $kontaktad</p>";
       ?>
   </div>
</body>
</html>
