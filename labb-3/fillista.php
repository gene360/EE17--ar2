<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Fillista</h1>
        
        <?php
        $fillista = ".";

        /* Skanna av katalogen */
        $resultat = scandir($fillista);

        /* Skriv allt vi hittat */
        echo "<table>";
        echo "<tr><th>Fil Typ</th><th>Fil Namn</th></tr>";
        foreach ($resultat as $fil) {
            /* Ta inte med . och .. */
            if ($fil != '.' && $fil != '..') {
                
                /* Är det en katalog */
                if (is_dir("$fillista/$fil")) {
                    /* Hitta en katalog */
                    echo "<tr>
                    <td><i class=\"fa fa-folder\"></i></td>
                    <td>$fil</td>
                    </tr>";
                } else {
                    /* Hitta en fil */
                    $filinfo = pathinfo($fil);
                    $filtyp = $filinfo['extension'];
                    if ($filtyp == "jpg") {
                        /* Hitta en JPG bild */
                        echo "<tr>
                        <td><img src=\"$fil\"></td>
                        <td>$fil</td>
                        </tr>";
                    } else {
                        /* Hitta en övriga filer */
                        echo "<tr>
                        <td><i class=\"fa fa-file\"></i></td>
                        <td>$fil</td>
                        </tr>";
                    }
                    
                }
            }
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>