<?php
// Set the active link based on the current page
$activeLink = 'track'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Train Locations</title>
    <!-- Include Leaflet CSS and JavaScript -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        #map {
            width:1000px;
            height: 500px;
            margin-left: 350px;
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/sidebar.css">
</head>
<body>

<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>

<h3 style="margin-left:400px; font-weight:bold; font-family:'Courier New', Courier, monospace;">Live Train Locations</h3>
<div id="map"></div>
<?php include('public/includes/footer.php'); ?>

<script>
    var map = L.map('map').setView([7.8731, 80.7718], 8); // Example center point

    // Add a tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Sample data of train locations with city names
    var trainLocations = [
        <?php foreach ($trainLocation as $location): ?>
        {
            trainNumber: "<?php echo $location['train_number']; ?>",
            departureCity: "<?php echo $location['departure_station'];?>",
            destinationCity: "<?php echo $location['destination_station'];?>",
            latitude: "<?php echo $location['latitude'];?>",
            longitude: "<?php echo $location['longitude'];?>",
            lastupdated: "<?php echo $location['last_updated_time'];?>",
            departureTime: "<?php echo $location['departure_time'];?>",
            arrivalTime: "<?php echo $location['arrival_time'];?>"


        },
        <?php endforeach; ?>
    ];

    var markers = [];

    // A function to fetch city name from latitude and longitude
    function getCityFromCoordinates(latitude, longitude, callback) {
        // Nominatim API endpoint to fetch city name from coordinates
        var apiEndpoint = 'https://nominatim.openstreetmap.org/reverse?format=json&lat=' + latitude + '&lon=' + longitude;

        // Fetch data from the Nominatim API
        fetch(apiEndpoint)
            .then(response => response.json())
            .then(data => {
                // Extract city name from the response
                var cityName = data.address.city;
                // Call the callback function with the city name
                callback(cityName);
            })
            .catch(error => console.error('Error:', error));
    }

    

    // Loop through train locations and add markers for departure and destination cities
    for (var i = 0; i < trainLocations.length; i++) {
        (function(train) {
            // Fetch city names for departure and destination coordinates
            getCityFromCoordinates(train.latitude, train.longitude, function(cityName) {
                var currentCity = cityName;

                getCoordinatesForCity(train.departureCity, function(departureCoords) {
                    getCoordinatesForCity(train.destinationCity, function(destinationCoords) {
                        // Add markers for departure and destination cities
                        var departureMarker = L.circleMarker(departureCoords,{radius: 5, color: 'black'}).addTo(map);
                        departureMarker.bindPopup("Departure City: " + train.departureCity + "<br> Train Number: " + train.trainNumber+"<br> Expected Departure:"+train.departureTime);
                        var destinationMarker = L.circleMarker(destinationCoords,{radius: 5, color: 'black'}).addTo(map);
                        destinationMarker.bindPopup("Destination City: " + train.destinationCity + "<br> Train Number: " + train.trainNumber+" <br> Expected Arrival:"+train.arrivalTime);
                        var currentMarker = L.marker([train.latitude, train.longitude]).addTo(map);
                        currentMarker.bindPopup("Current City: " + currentCity + "<br> Train Number: " + train.trainNumber+"<br>Last Updated:"+train.lastupdated);

                        markers.push(departureMarker);
                        markers.push(destinationMarker);
                        markers.push(currentMarker);

                        // Draw line between departure and destination cities
                        var departureLatLng = L.latLng(departureCoords[0], departureCoords[1]);
                        var currentLatLng = L.latLng(train.latitude, train.longitude);
                        var destinationLatLng = L.latLng(destinationCoords[0], destinationCoords[1]);
                        
                        // Draw line between departure and current city with bold red color
                        var departureToCurrentPolyline = L.polyline([departureLatLng, currentLatLng], {color: 'blue', weight: 5}).addTo(map);

                        // Draw line between current city and destination with normal red color
                        var currentToDestinationPolyline = L.polyline([currentLatLng, destinationLatLng], {color: 'red'}).addTo(map);
                        // Adjust map bounds to fit all markers and lines
                        var bounds = new L.LatLngBounds();
                        markers.forEach(function(marker) {
                            bounds.extend(marker.getLatLng());
                        });
                        map.fitBounds(bounds);
                    });
                });
            });
        })(trainLocations[i]);
    }

    // A function to fetch coordinates for a given city
    function getCoordinatesForCity(city, callback) {
        // Nominatim API endpoint to fetch coordinates for a city
        var apiEndpoint = 'https://nominatim.openstreetmap.org/search?format=json&q=' + city;

        // Fetch data from the Nominatim API
        fetch(apiEndpoint)
            .then(response => response.json())
            .then(data => {
                // Extract latitude and longitude from the response
                var latitude = data[0].lat;
                var longitude = data[0].lon;

                // Return coordinates as an array
                var coordinates = [latitude, longitude];
                // Call the callback function with the coordinates
                callback(coordinates);
            })
            .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
