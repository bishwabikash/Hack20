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
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyD40mfE5TbeRK79BpSqSTtxx8V7T4yKahk"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.js"></script>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
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
<div class="map-example">
    <div class="row">
        <div class="col-lg-8">
            <div id="map"></div>
        </div>
        <div class="col-lg-4">
            <div class="heading">
                <h3>Super Saviour-</h3><h5>no one is left behind</h5>
                <div class="rating">

                </div>
            </div>
            <div class="info">
                <p>The Primary idea behind the application is to locate and track down emergency locations where an
                    assistance is urgently needed. This area is populated with markings after the UAV has detected
                    people after sweeping through the flight path.</p>
                <p></p>
            </div>
            <div class="gallery">
                <h4>Photos</h4>
                <div class="row">
                    <div class="col-md-4">
                        <a href="assets/img/image2.jpg"><img class="img-fluid image" src="assets/img/image2.jpg"></a>
                    </div>
                    <div class="col-md-4">
                        <a href="assets/img/image3.jpg"><img class="img-fluid image" src="assets/img/image3.jpg"></a>
                    </div>
                    <div class="col-md-4">
                        <a href="assets/img/image4.jpg"><img class="img-fluid image" src="assets/img/image4.jpg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var obj = <?php include "includes/test.json"?>
    var map = new GMaps({
        el: '#map',
        lat: 12.0,
        lng: 77.0
    });
    map.setZoom(8);
    for (var i = 0; i < obj.length; i++) {
        map.addMarker({
            lat: obj[i].lat,
            lng: obj[i].lng,
            color: 'green'

        });
    }

</script>
</body>
</html>
ddd