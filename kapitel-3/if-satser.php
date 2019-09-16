<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $lösenord = "12345";

    if ($lösenord != "12345") {
        echo "<p>Dom är inte lika!</p>";
    } else {
        echo "<p>Dom är lika!</p>";
    }
    /* 
    Laugh on Monday, laugh for danger.
    Laugh on Tuesday, kiss a stranger. 
    Laugh on Wednesday, laugh for a letter. 
    Laugh on Thursday, something better.
    Laugh on Friday, laugh for sorrow.
    Laugh on Saturday, joy tomorrow.
    */
    $idag = date("l");
    var_dump($idag);

    if ($idag == "Monday") {
        echo "Laugh on monday, laugh for danger.";
    } elseif ($idag == "Tuesday") {
        echo "Laugh on Tuesday, kiss a stranger. ";
    } elseif ($idag == "Wednesday") {
        echo "Laugh on Wednesday, laugh for a letter.";
    } elseif ($idag == "Thursday") {
        echo "Laugh on Thursday, something better.";
    } elseif ($idag == "Friday") {
        echo "Laugh on Friday, laugh for sorrow.";
    } elseif ($idag == "Saturday") {
        echo "Laugh on Saturday, joy tomorrow.";
    }

    $månad = date("F");
    var_dump($månad);
    $dagensDatum = date("d");
    var_dump($dagensDatum);

    if ($idag == "Monday" && $dagensDatum == "13") {
        echo "<p>Bäst att hålla sig hemma</p>";
    } else {
        echo "<p>Kusten är fri!</p>";
    }

    /* Halloween är 31/10 */
    if ($månad == "October" && $dagensDatum == "30") {
        echo "<p>Hurra! Idag är dagen förre Halloween</p>";
    } else {
        echo "<p>Du får vänta lite till</p>";
    }

    if ($idag == "Saturday" || $idag == "Sunday") {
        echo "<p>Skönt! Idag är helg</p>";
    } else {
        $antalDagarTillHelg = 5 -date("N"); 
        echo "<p>Suck, du får vänta $antalDagarTillHelg dager till nästa helg</p>";
    }


    ?>
</body>
</html>