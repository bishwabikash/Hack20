<!DOCTYPE html>
<html>
<head>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            width: 90%;
            margin: 0;
            padding: 0;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
    <div id="map" class="row" style="height: 100%"></div>
</div>

<script>
    var map;
    var obj = <?php include "includes/test.json"?>
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: new google.maps.LatLng(12, 77),
                mapTypeId: 'terrain'
            });
            // debugger;
            // Create a <script> tag and set the USGS URL as the source.
            var script = document.createElement('script');
            // This example uses a local copy of the GeoJSON stored at
            // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
            document.getElementsByTagName('head')[0].appendChild(script);
            //adsa
            for (var i = 0; i < obj.length; i++) {
                var coords = [obj[i].lat, obj[i].lng];
                var latlng = new google.maps.LatLng(coords[0], coords[1]);

                var marker = new google.maps.Marker({
                    position: latlng
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
            }

        }
</script>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD40mfE5TbeRK79BpSqSTtxx8V7T4yKahk&callback=initMap">
</script>
</body>
</html>