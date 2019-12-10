<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slumpa Bilder LOL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Några slumpade bilder</h1><br>

        <?php
        /* Läs in alla bilder, scandir() */
        $bilder = scandir("./bilder");
        $bildFil = "./bilder";

        /* Slumpa fram två tal, rand() */
        $slumpaTal1 = rand(2, 11);
        $slumpaTal2 = rand(2, 11);

        /* Visa bilderna */
        $slumpaBild1 = $bilder[$slumpaTal1];
        $slumpaBild2 = $bilder[$slumpaTal2];

        echo "<div id=\"carouselExampleSlidesOnly\" class=\"carousel slide\" data-ride=\"carousel\" data-interval=\"2000\">
        <div class=\"carousel-inner\">
          <div class=\"carousel-item active\">
              <img src=\"$bildFil/$slumpaBild1\" class=\"d-block w-100\" alt=\"bild\">
          </div>
          <div class=\"carousel-item\">  
              <img src=\"$bildFil/$slumpaBild2\" class=\"d-block w-100\" alt=\"bild\">
          </div>
        </div>
      </div>";
        ?>
    </div>
</body>
</html>