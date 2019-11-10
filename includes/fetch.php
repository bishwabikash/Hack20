<?php
/**
 * Created by PhpStorm.
 * User: bishwa
 * Date: 9/11/19
 * Time: 9:51 PM
 */
require_once('connection.php');
global $db;

if (isset($_GET)) {

    $res = mysqli_query($db, "SELECT DISTINCT lat,lng,severity,people FROM res_loc");
    $response = "{'values': [";

    while ($row = mysqli_fetch_assoc($res)) {
        //$arr=array($row['lat'],$row['lng'],$row['severity'],$row['people']);
        $response .= "{'lat':" . floatval($row['lat']) . ",'lng':" . floatval($row['lng'] . ",'severity':" . $row['severity'] . ",'people':" . $row['people'] . "},");

    }
    $response = rtrim($response, ",");
    $response .= "]}";
    print_r($response);
    $fp = fopen("includes//geotag.js", "w");
    fclose($fp);
    exit;
}


