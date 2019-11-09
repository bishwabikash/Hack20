<?php
/**
 * Created by PhpStorm.
 * User: bishwa
 * Date: 9/11/19
 * Time: 3:43 PM
 */




function test($lat,$lng){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://google-maps-geocoding.p.rapidapi.com/geocode/json?language=en&latlng=" . strval(lat) . "%2C" . strval(lng),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-rapidapi-host: google-maps-geocoding.p.rapidapi.com",
            "x-rapidapi-key: 7b1e253026msh1ee6191f0295ae3p17e779jsn80bc7e723681"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $response;
    }
}