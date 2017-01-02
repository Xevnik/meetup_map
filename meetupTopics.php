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

$getTopicsData = file_get_contents("https://api.meetup.com/topics?search=".$_GET['keyword']."&page=5&key=".$meetupKey1."&sign=true", false, stream_context_create($arrContextOptions));
print_r($getTopicsData);