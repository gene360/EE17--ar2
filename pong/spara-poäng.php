<?php
include_once "./konfig-db.php";

/* Ta emot data som skickas */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
$poäng = filter_input(INPUT_POST, "poäng", FILTER_SANITIZE_STRING);
echo "Mottaget: $namn $poäng";
/* Kontrollera att data finns */
if ($namn && $poäng) {
    echo "Mottaget: $namn $poäng";
    /* Spara namnet i tabellen på databas */
    $sql = "UPDATE pong SET poäng='$poäng' WHERE namn='$namn'";
    $result = $conn->query($sql);

    if (!$result) {
       die("något blev fel med SQL: $conn->error");
    } else {
        echo "Poäng har sparats";
    }
} else {
    echo "Något blev fel";
}