<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Provar bädda in PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
echo "Mixing HTML and PHP";
?>
<?php
    echo "<h1>EN rubrik</h1>";
    echo "<h2>EN rubrik</h2>";

    echo "<div style=\"border:1px solid red;\">";
        echo "HejHej!";
    echo "</div>";
?>
</body>
</html>