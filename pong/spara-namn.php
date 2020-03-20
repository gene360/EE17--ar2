<?php
include_once "./konfig-db.php";

/* Ta emot POST-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);

/* Kontrollera att data finns */
if ($namn) {
    echo "Mottaget: $namn";

    /* Spara namnet i tabellen på databas */
    $sql = "INSERT INTO pong SET namn='$namn'";
    $result = $conn->query($sql);

    if (!$result) {
       die("något blev fel med SQL: $conn->error");
    } else {
        echo "Namnet har sparats";
    }
} else {
    echo "Något blev fel";
}