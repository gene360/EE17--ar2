<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4-0</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="./uppgift-4-0.php" method="POST">
        <h1>Namnlista</h1><br>
            <label>Namnen</label><br>
                <input type="text" name="namn[]" required><br>
                <input type="text" name="namn[]" required><br>
                <input type="text" name="namn[]" required><br>
                <input type="text" name="namn[]" required><br>
                <input type="text" name="namn[]" required>

                <button>Skicka</button>
    </form>
    <?php
    if (isset($_POST["namn"])) {
        /* Ta emot data som skickas */
        $namn = filter_input(INPUT_POST, $namn, FILTER_DEFAULT);
        print_r($namn);
    }
    ?>  
</body>
</html>