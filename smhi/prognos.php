<?php
/*
* Hämta väder från SMHI
* 
* PHP version 7
* @category   Hämta JSON-data från SMHI-api
* @author     Gene Helli
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temperaturprognos från SMHI api</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Temperaturprognos - Stockholm</h1>
        <canvas id="myChart" width="50" height="50"></canvas>
        <?php
        /* Url till api:et */
        $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

        /* Hämta JSON */
        $json = file_get_contents($url);

        /* Avkoda JSON */
        $jsonData = json_decode($json);

        /* Plocka ut publiceringsdatum */
        $approvedTime = $jsonData->approvedTime;
        echo "<p>Prognos publicerad den $approvedTime</p>";

        /* Plocka ut tidserien */
        $timeSeries = $jsonData->timeSeries;

        /* samla in data:tid och tempera */
        $tider = "";

        /* Loopa arrayen för att plocka ut temperaturvärdena */
        foreach ($timeSeries as $timeData) {
            /* Plocka tidpunkt */
            $validTime = $timeData->validTime;

            /* Plocka ut alla parametrar */
            $parameters = $timeData->parameters;

            /* Plocka ut temperaturen = objekt nr 12 */
            $parameter = $parameters[11];
            $temperaturen = $parameter->values[0];


            $tiderData .= "'$validTime', ";
            $tempData .= "'$temperaturen', ";
            
            
            echo $temperaturen;

            echo $tempData;
            echo $tiderData;

            
            // chart js.koden
            echo "<script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [$tiderData],
                    datasets: [{
                        label: '# of Votes',
                        data: [$tempData],
                        backgroundColor: [
                            'rgba(173,216,230, 0.3'
                        ],
                        borderColor: [
                            'blue'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>";
        }
        ?>
    </div>
</body>
</html>