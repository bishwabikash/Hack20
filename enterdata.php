<?php
/**
 * Created by PhpStorm.
 * User: D3@D70CK
 * Date: 17-06-2017
 * Time: 01:52 AM
 */

include_once("includes/connection.php");
global $db;

if($_SERVER["REQUEST_METHOD"]=='GET' and $_GET["client"]=="uav"){

   $lat=floatval($_GET["lat"]);
   $lng=floatval($_GET["lng"]);
   $rsc=floatval($_GET["res"]);
   if(mysqli_num_rows(mysqli_query($db,"SELECT lat,lng FROM res_loc WHERE lat=".floatval($_GET["lat"])." AND lng=".floatval($_GET["lng"])))>0){
       mysqli_query($db, "UPDATE res_loc SET  severity=severity+1 WHERE lat=".floatval($_GET["lat"])) or die(mysqli_error($db));
   }else{
       $stmt=mysqli_prepare($db,"INSERT into res_loc(lat, lng,rescued,severity) VALUES (?,?,?,?)");
       mysqli_stmt_bind_param($stmt,"ddii",$lat,$lng,0,0);
       mysqli_stmt_execute($stmt) or die(mysqli_error($db));
   }
}elseif ($_SERVER["REQUEST_METHOD"]=='GET' and $_GET["client"]=="vol" and isset($_GET["vol_id"])){
    if(mysqli_num_rows(mysqli_query($db,"SELECT volun_id FROM volun_ WHERE volun_id =".mysqli_real_escape_string($db,$_GET["vol_id"])))>0){
        mysqli_query($db, "UPDATE volun_ SET  lat=".floatval($_GET["lat"])." ,lng=".floatval($_GET["lng"])." WHERE volun_id=".mysqli_real_escape_string($db,$_GET["vol_id"])) or die(mysqli_error($db));
    }else{
        $stmt=mysqli_prepare($db,"INSERT into volun_(lat, lng,volun_id) VALUES (?,?,?)");
        mysqli_stmt_bind_param($stmt,"dds",$lat,$lng,mysqli_real_escape_string($db,$_GET[$_GET["vol_id"]]));
        mysqli_stmt_execute($stmt) or die(mysqli_error($db));
    }
}