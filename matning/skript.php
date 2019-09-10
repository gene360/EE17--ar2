<?php

/* ta emot data som skickas */
$förnamn = $_REQUEST["förnamn"];
$efternamn = $_REQUEST["efternamn"];
$kön = $_REQUEST["kön"];
$fotbollslag = $_REQUEST["fotbollslag"];
$kommentar = $_REQUEST["kommentar"];

/* skriv ut en snygg bekräftelse */
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tack!</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="styleSkript.css">
</head>
<body>
    <div class="kontainer">
        <div class="ruta">
            <h1>Tack! för ditt bidrag</h1>
            <hr>
            <h4>Vi har nu tagit emot din data, <?php
                echo "$förnamn $efternamn!";
            ?></h4>
            <p>Din data är:</p>
            <p>Förnamn: <?php
                echo $förnamn;
            ?></p>
            <p>Efternamn: <?php
                echo $efternamn;
            ?></p>
            <p>Kön: <?php
                echo $kön;
            ?></p>
            <p>Fotbollslag: <?php
                echo $fotbollslag
            ?></p>
            <p>och har skickats med kommentaren:</p>
            <blockquote><?php
                echo $kommentar;
            ?></blockquote>
    
            <form action="./formular.php">
                <button class="secondary" >OK</button>
            </form>
        </div>
    </div>
</body>
</html>