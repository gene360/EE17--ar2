<?php
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
                
                /* Skapa ett nytt unikt filnamn så att vi inte ersätter filer */
                $fileNameNew = uniqid('', true) . ".$fileActualExt";
                $fileDestination = "uploads/$fileNameNew";

                /* Nu flyttas filen in in i rätt katalog */
                move_uploaded_file($fileTmpName, $fileDestination);

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