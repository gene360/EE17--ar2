<?php
$host = "localhost";
$databas = "gene";
$användare = "gene";
$lösenord = "3F2ae1zHwBABU79N";

/* 1. Logga in på mysql-servern och välja databas */
$conn = new mysqli($host, $användare, $lösenord, $databas);

/* Gick det bra? */
if ($conn->connect_error) {
    die("Kunde inte ansluta till databasen " . $conn->connect_error);
} else {
    echo "Yipee! Gick bra att ansluta";
}