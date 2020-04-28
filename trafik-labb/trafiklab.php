<?php
// Hämta närmsta hållpaltser från trafiklabs api

$lat = filter_input(INPUT_POST, "lat", FILTER_SANITIZE_STRING);
$lon = filter_input(INPUT_POST, "lon", FILTER_SANITIZE_STRING);

if ($lat && $lon) {
    // api-nyckel
    $api = "5a04359da47042b7837f88a5c61908c9";

    // Sökradien i meter
    $radie = 1000;

    // Max antal svar
    $max = 25;

    // url till api:et
    $url = "http://api.sl.se/api2/nearbystops.json?key=$api&originCoordLat=$lat&originCoordLong=$lon&maxresults=$max&radius=$radius";

    // Hämta JSON
    $json = file_get_contents($url);

    // Avkoda JSON
    $jsonData = json_decode($json);

    var_dump($jsonData);
} else {
    echo "Något blev fel med indata.";
}
?>