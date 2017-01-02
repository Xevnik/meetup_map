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

$getEventsData = file_get_contents("https://api.meetup.com/2/open_events?key=".$meetupKey1."&zip=".$_GET['zip']."&topic=".$_GET['keyword']."&page=20", false, stream_context_create($arrContextOptions));
print_r($getEventsData);