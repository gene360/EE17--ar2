<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="styleFormular.css">
</head>
<body>
    <form action="./skript.php" method="GET">
        <legend>Kontanktuppgifter</legend><br>
        <label>Förnamn</label>
        <input type="text" name="förnamn" required>

        <label>Efternamn</label>
        <input type="text" name="efternamn" required>

        <label>Kön:</label><br>
        <p><input type="radio" name="kön" value="Man" required>Man</p><br>
        <p><input type="radio" name="kön" value="Kvinna" required>Kvinna</p><br>

        <label for="">Fotbollslag</label>
        <select name="fotbollslag" id="">
            <option value="Inget valt" selected> --- </option>
            <option value="AIK">AIK</option>
            <option value="Hammarby">Hammarby</option>
            <option value="Djurgården">Djurgården</option>
            <option value="Malmö FF">Malmö FF</option>
        </select>

        <div class="kommentar-wrapper">
            <label>Övrigt:</label><br>
            <textarea name="kommentar" cols="20" rows="5" placeholder="skriv din personliga kommentar här ..."></textarea>
        </div>

        <button type="submit">Skicka</button>
    </form>
</body>
</html>
