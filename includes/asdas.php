<?php
require_once 'connection.php';
global $db;

function name($lat, $lng)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://google-maps-geocoding.p.rapidapi.com/geocode/json?language=en&latlng=" . $lat . "%2C" . $lng,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-rapidapi-host: google-maps-geocoding.p.rapidapi.com",
            "x-rapidapi-key: b0ba6a4224mshdff676b1d1c1e7ap1d9853jsn4a6a1a8f9865"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {

        $resJ = json_decode($response, true);
        return $resJ['results'][0]['formatted_address'];
    }
}

//name(12.341659,77.467964);
function getJson()
{
    global $db;

    $response = "disaster_callback({
    'type': 'FeatureCollection',
    'geometry': [";
    $res = mysqli_query($db, "SELECT lat,lng,people FROM res_loc");
    while ($row = mysqli_fetch_assoc($res)) {
        $text = name($row['lat'], $row['lng']);
        $response .= "{'name':'" . $text . "','coordinates':[" . $row['lat'] . "," . $row['lng'] . "],
        'people':" . $row['people'] . "}";
    }
    /* while($row=mysqli_fetch_assoc($res)){
         print(name($row['lat'],$row['lng']));
       $response.="{'name':".name($row['lat'],$row['lng']).",'coordinates':[".$row['lat'].",".$row['lng']."],
         'people':".$row['people']."}";
     }*/
    print_r($response);
    $response = rtrim($response, ',') . "]});";
    $fp = fopen('includes/geotag.json', 'w');
    fwrite($fp, $response);
    fclose($fp);

}

getJson();