/* Mapbox inställningar */
mapboxgl.accessToken =
    'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';

/* Start position: NTI */
var lat = 59.336885;
var lon = 18.048323;

/* Skapa kartan */
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [lon, lat],
    zoom: 10
});

/* Hämta användarens position */
getLocation();

/* Om vi får avläsa positionen, kör igång */
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

/* Visa användares latitude och longitude */
function showPosition(position) {
    var latHem = position.coords.latitude;
    var lonHem = position.coords.longitude;
    console.log("Latitude: " + latHem + ", Longitude: " + lonHem);

    // Infoga en marker på kartan
    var marker = new mapboxgl.Marker()
        .setLngLat([lonHem, latHem])
        .addTo(map);

        // Packa in lat och lon till ett POST paket
        var postData = new FormData();
        postData.append("lat", latHem)
        postData.append("lon", lonHem);

        // Skicka lat och lon till php-skriptet mha ajax
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "trafiklab.php", true);
        ajax.send(postData);

        //Väntar på svaret från ajax
        ajax.addEventListener("loadend", function() {
            console.log(this.responseText);
        })
}