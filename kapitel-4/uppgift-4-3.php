<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4-3</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="./uppgift-4-3.php" method="POST">
        <h1>Omvandla tal till bokstäver</h1><br>
            <label>Tal</label><br>
                <input type="number" name="tal" required>
                
                <button class="primary">Skicka</button>
    </form>
    <?php
    /* Skriv en webbapp som tar ett tal mellan 1 och 9 och sedan returnerar det svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så returnerar du i stället talet som vanligt (tex. 11). */

    /* Ta emot data som skickas */
    $tal = filter_input(INPUT_POST, 'tal', FILTER_SANITIZE_NUMBER_INT);
    if ($tal) {
        $talLista = ['Noll', 'Ett', 'Två', 'Tre', 'Fyra', 'Fem', 'Sex', 'Sju', 'Åtta', 'Nio'];

        /* Skriv ut */
        if ($tal > 10) {
            echo "<p>Talet $tal skrivs $tal.</p>";
        } else {
            echo "<p>Tale $tal skrivs $tal</p>";
        }
    }
    ?>
</body>
</html>