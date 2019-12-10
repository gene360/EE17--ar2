<?php
/*
 * PHP version 7
 * @category   Hjälpfunktioner
 * @author     Gene Helli <genehelli@gmail.com>
 * @license    PHP CC
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bygg din egna PC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din egna PC</h1>
        <h2>Ladda en vara</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori">
                <option value="chassi">Chassi</option>
                <option value="cpu">CPU</option>
                <option value="disk">Disk</option>
                <option value="grafikkort">GPU</option>
                <option value="kylare">Kylare</option>
                <option value="mobo">Moderkort</option>
                <option value="psu">PSU</option>
                <option value="ram">RAM-minne</option>
            </select>
            <label for="namn">Namn</label>
            <input type="text" name="namn" id="namn">

            <label for="pris">Pris</label>
            <input type="text" name="pris" id="pris">

            <label for="fil">Fil</label>
            <input type="file" name="fil" id="fil">
            <button type="submit">Ladda upp</button>
        </form>
<?php
/* Ta emot data */
$kategori = filter_input(INPUT_GET, 'kategori', FILTER_SANITIZE_STRING);
$pris = filter_input(INPUT_POST, 'pris', FILTER_SANITIZE_STRING);
$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);

/* Har man tryckt på knappen "submit" */
if (isset($_POST['submit'])) {
    /* Läs av filen */
    $file = $_FILES['file'];

    /* Vad är fil namnet? */
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    /* Plocka filändelsen */
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    /* Vilka bildtyper tillåter vi */
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    /* Testa att filtypen är tillåten */
    if (in_array($fileActualExt, $allowed)) {
        /* Testar om det blev något fel */
        if ($fileError === 0) {
            if ($fileSize < 100000) {

                /* Skapa ett filnamn: tex namn-pris.png */
               
                $fileDestination = "uploads/$fileNameNew";
                var_dump($fileNameNew, $fileDestination);

                /* Nu flyttas filen in in i rätt katalog */
                //move_uploaded_file($fileTmpName, $fileDestination);

                /* Vi hoppar direkt tillbaka till formuläret med ett litet meddelande om att vi lyckades skicak bilden */
                header("Location: index.php?uploadsuccess=1");
            } else {
                echo "<p>Bilden måste vara mindre än 100000Kb</p>";
            }
        } else {
            echo "<p>Något blev fel. Filen kunde inte laddas upp</p>";
        }
    } else {
        echo "<p>Filtypen är ej tillåten</p>";
    }
}
?>
    </div>
</body>
</html>