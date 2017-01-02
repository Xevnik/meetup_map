<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");

require_once ('apikeys.php');

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$reverseGeoCodeData = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=".$_GET['lat'].",".$_GET['lng']."&key=".$googleKey, false, stream_context_create($arrContextOptions));
print_r($reverseGeoCodeData);