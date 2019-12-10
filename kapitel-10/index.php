<?php
/*
* PHP version 7
* @category   Lära oss hur man laddar upp filer
* @author     Gene Helli <genehelli@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ladda upp filer</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Ladda upp filer</h1>
        <?php
        $uploadsuccess = filter_input(INPUT_GET, 'uploadsuccess', FILTER_SANITIZE_STRING);
        if ($uploadsuccess) {
            echo "<p>Filen har laddats upp</p>";
        }
        ?>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label>Filnamn</label>
            <input type="file" name="file" required>
            <button class="primary" type="submit" name="submit">Ladda upp</button>
        </form>
    </div>
</body>
</html>