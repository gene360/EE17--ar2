<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $fel = $_REQUEST["fel"];
   if ($fel = "ja") {
       echo "<p>Fel användarnamn eller lösenord, förök igen</p>";
   }
    ?>
    <form action="./skirpt-3-2.php" method="POST">
        <h2>Kontaktuppgifter</h2><br>
        <label>Användarnamn</label>
        <input type="text" name="anamn" placeholder="Ditt användarnamn" required>

        <label>Lösenord</label>
        <input type="password" name="lösen" placeholder="Ditt lösenord" required>

        <button class="primary">Skicka</button>
    </form>
</body>
</html>